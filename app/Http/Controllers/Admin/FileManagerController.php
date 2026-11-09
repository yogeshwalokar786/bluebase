<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FileManagerController extends Controller
{
    /**
     * Display standalone File Manager page or return JSON.
     */
    public function index(Request $request)
    {
        $folder = $request->input('folder', 'all');
        $search = $request->input('search');
        $type = $request->input('type', 'all');

        $files = $this->getMediaFiles($search, $folder, $type);

        if ($request->ajax() || $request->wantsJson() || $request->has('api')) {
            return response()->json([
                'success' => true,
                'count' => count($files),
                'files' => $files,
            ]);
        }

        $stats = [
            'total_files' => count($files),
            'total_size' => $this->formatBytes(array_sum(array_column($files, 'size_bytes'))),
            'uploads_count' => count($this->getMediaFiles(null, 'uploads')),
            'images_count' => count($this->getMediaFiles(null, 'images')),
        ];

        return view('admin.filemanager.index', compact('files', 'stats', 'folder', 'search', 'type'));
    }

    /**
     * API endpoint for dynamic File Manager Popup.
     */
    public function apiFiles(Request $request)
    {
        $folder = $request->input('folder', 'all');
        $search = $request->input('search');
        $type = $request->input('type', 'all');

        $files = $this->getMediaFiles($search, $folder, $type);

        return response()->json([
            'success' => true,
            'count' => count($files),
            'files' => $files,
        ]);
    }

    /**
     * Upload one or multiple files.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'nullable|file|max:25600', // 25MB max
            'files' => 'nullable|array',
            'files.*' => 'file|max:25600',
        ]);

        $uploaded = [];
        $filesToProcess = [];

        if ($request->hasFile('file')) {
            $filesToProcess[] = $request->file('file');
        } elseif ($request->hasFile('files')) {
            $filesToProcess = $request->file('files');
        }

        if (empty($filesToProcess)) {
            return response()->json(['success' => false, 'message' => 'No files provided for upload.'], 400);
        }

        $destDir = public_path('uploads');
        if (!File::exists($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        foreach ($filesToProcess as $file) {
            $origName = $file->getClientOriginalName();
            $ext = strtolower($file->getClientOriginalExtension());
            $nameWithoutExt = pathinfo($origName, PATHINFO_FILENAME);
            $cleanName = Str::slug($nameWithoutExt) . '-' . time() . '-' . Str::random(4) . '.' . $ext;

            $file->move($destDir, $cleanName);

            $fullPath = $destDir . DIRECTORY_SEPARATOR . $cleanName;
            $relativeUrl = 'uploads/' . $cleanName;
            $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp']);

            $dimensions = null;
            if ($isImage && $ext !== 'svg') {
                $imgInfo = @getimagesize($fullPath);
                if ($imgInfo) {
                    $dimensions = "{$imgInfo[0]} × {$imgInfo[1]}";
                }
            }

            $sizeBytes = File::size($fullPath);

            $fileData = [
                'name' => $cleanName,
                'original_name' => $origName,
                'url' => $relativeUrl,
                'full_url' => asset($relativeUrl),
                'size' => $this->formatBytes($sizeBytes),
                'size_bytes' => $sizeBytes,
                'extension' => $ext,
                'is_image' => $isImage,
                'dimensions' => $dimensions,
                'folder' => 'uploads',
                'updated_at' => date('M d, Y H:i', File::lastModified($fullPath)),
            ];

            $uploaded[] = $fileData;
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($uploaded) . ' file(s) uploaded successfully.',
                'files' => $uploaded,
                'file' => $uploaded[0] ?? null,
            ]);
        }

        return back()->with('success', count($uploaded) . ' file(s) uploaded successfully.');
    }

    /**
     * Delete a file.
     */
    public function delete(Request $request)
    {
        $path = $request->input('path');

        if (!$path) {
            return response()->json(['success' => false, 'message' => 'Path parameter required.'], 400);
        }

        // Security check: disallow directory traversal
        if (str_contains($path, '..') || str_starts_with($path, '/') || str_starts_with($path, '\\')) {
            return response()->json(['success' => false, 'message' => 'Invalid path security violation.'], 403);
        }

        $fullPath = public_path($path);

        // Disallow deleting outside public uploads
        if (!str_starts_with(realpath($fullPath) ?: '', realpath(public_path('uploads')))) {
            return response()->json(['success' => false, 'message' => 'Only uploaded media in /uploads can be removed.'], 403);
        }

        if (File::exists($fullPath)) {
            File::delete($fullPath);
            return response()->json(['success' => true, 'message' => 'File deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'File not found on disk.'], 404);
    }

    /**
     * Scan and collect media files from public directories.
     */
    private function getMediaFiles(?string $search = null, string $folder = 'all', string $type = 'all'): array
    {
        $directories = [];
        $publicPath = public_path();

        if ($folder === 'all') {
            $directories[] = ['path' => $publicPath . '/uploads', 'name' => 'uploads'];
            $directories[] = ['path' => $publicPath . '/images', 'name' => 'images'];
        } elseif ($folder === 'uploads') {
            $directories[] = ['path' => $publicPath . '/uploads', 'name' => 'uploads'];
        } elseif ($folder === 'stories') {
            $directories[] = ['path' => $publicPath . '/images/stories', 'name' => 'stories'];
        } elseif ($folder === 'images') {
            $directories[] = ['path' => $publicPath . '/images', 'name' => 'images'];
        }

        $files = [];

        foreach ($directories as $dirInfo) {
            $dir = $dirInfo['path'];
            $folderName = $dirInfo['name'];

            if (!File::isDirectory($dir)) {
                continue;
            }

            $allFiles = File::allFiles($dir);

            foreach ($allFiles as $file) {
                $filename = $file->getFilename();
                $ext = strtolower($file->getExtension());

                // Skip hidden files, system files, or scripts
                if (str_starts_with($filename, '.') || in_array($ext, ['php', 'blade', 'js', 'css', 'json', 'map'])) {
                    continue;
                }

                $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'ico']);

                // Filter by type
                if ($type === 'image' && !$isImage) {
                    continue;
                } elseif ($type === 'document' && $isImage) {
                    continue;
                }

                // Filter by search query
                if ($search && !str_contains(strtolower($filename), strtolower($search))) {
                    continue;
                }

                // Determine relative URL
                $realPublic = realpath($publicPath);
                $realFile = realpath($file->getRealPath());
                $relativePath = ltrim(str_replace([$realPublic, '\\'], ['', '/'], $realFile), '/');

                $dimensions = null;
                if ($isImage && $ext !== 'svg') {
                    $imgInfo = @getimagesize($file->getRealPath());
                    if ($imgInfo) {
                        $dimensions = "{$imgInfo[0]} × {$imgInfo[1]}";
                    }
                }

                $sizeBytes = $file->getSize();

                $files[] = [
                    'name' => $filename,
                    'url' => $relativePath,
                    'full_url' => asset($relativePath),
                    'size' => $this->formatBytes($sizeBytes),
                    'size_bytes' => $sizeBytes,
                    'extension' => $ext,
                    'is_image' => $isImage,
                    'dimensions' => $dimensions,
                    'folder' => $folderName,
                    'updated_at' => date('M d, Y H:i', $file->getMTime()),
                    'timestamp' => $file->getMTime(),
                    'is_deletable' => str_starts_with($relativePath, 'uploads/'),
                ];
            }
        }

        // Sort by newest modified first
        usort($files, fn($a, $b) => $b['timestamp'] <=> $a['timestamp']);

        return $files;
    }

    /**
     * Format byte sizes into readable string.
     */
    private function formatBytes(int $bytes, int $precision = 1): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

