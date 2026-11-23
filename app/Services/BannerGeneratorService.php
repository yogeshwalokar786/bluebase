<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BannerGeneratorService
{
    /**
     * Save a client-side generated Base64 canvas dataURL as a high-quality JPG banner.
     */
    public static function saveBase64Banner(string $dataUrl, ?string $title = null, ?string $slug = null): string
    {
        $dir = public_path('images/blogs');
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        // Clean slug or generate from title
        $baseName = !empty($slug) ? Str::slug($slug) : (!empty($title) ? Str::slug($title) : 'blog-banner');
        $filename = $baseName . '-' . time() . '.jpg';
        $fullPath = $dir . DIRECTORY_SEPARATOR . $filename;

        // Strip Base64 header
        if (preg_match('/^data:image\/(\w+);base64,/', $dataUrl, $type)) {
            $dataUrl = substr($dataUrl, strpos($dataUrl, ',') + 1);
            $type = strtolower($type[1]);
        }

        $decoded = base64_decode($dataUrl);
        if ($decoded === false) {
            throw new \InvalidArgumentException('Invalid base64 image dataURL');
        }

        // If GD is available, optimize as 92% quality JPEG
        if (function_exists('imagecreatefromstring')) {
            $img = @imagecreatefromstring($decoded);
            if ($img !== false) {
                // Ensure truecolor
                $w = imagesx($img);
                $h = imagesy($img);
                $target = imagecreatetruecolor($w, $h);
                imagecopy($target, $img, 0, 0, 0, 0, $w, $h);
                imagejpeg($target, $fullPath, 92);
                imagedestroy($img);
                imagedestroy($target);
                return 'images/blogs/' . $filename;
            }
        }

        // Direct file put fallback
        File::put($fullPath, $decoded);
        return 'images/blogs/' . $filename;
    }

    /**
     * Pure PHP GD Server-side Banner Generator.
     * Generates a 1280x720 textured enterprise banner matching Bluebase's brand styling.
     */
    public static function generateServerSideBanner(string $title, string $category = 'Enterprise Architecture', array $options = []): string
    {
        $dir = public_path('images/blogs');
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        $slug = $options['slug'] ?? Str::slug($title);
        $filename = ($slug ?: 'blog-banner') . '-' . time() . '.jpg';
        $fullPath = $dir . DIRECTORY_SEPARATOR . $filename;

        $width = 1280;
        $height = 720;
        $img = imagecreatetruecolor($width, $height);

        // Palette
        $bgDark = imagecolorallocate($img, 7, 11, 25);        // #070B19
        $bgSlate = imagecolorallocate($img, 13, 22, 48);      // #0D1630
        $textWhite = imagecolorallocate($img, 255, 255, 255); // #FFFFFF
        $textMuted = imagecolorallocate($img, 148, 163, 184); // #94A3B8
        $accentBlue = imagecolorallocate($img, 0, 80, 231);    // #0050E7
        $accentCyan = imagecolorallocate($img, 0, 210, 255);   // #00D2FF
        $gridLine = imagecolorallocatealpha($img, 255, 255, 255, 118); // very subtle grid

        // 1. Fill base dark background
        imagefilledrectangle($img, 0, 0, $width, $height, $bgDark);

        // 2. Draw subtle geometric background texture & ambient radial glow
        $accentColor = $options['accent'] ?? 'blue';
        $ambientColor = match($accentColor) {
            'cyan' => imagecolorallocatealpha($img, 0, 210, 255, 120),
            'emerald' => imagecolorallocatealpha($img, 16, 185, 129, 120),
            'purple' => imagecolorallocatealpha($img, 139, 92, 246, 120),
            'amber' => imagecolorallocatealpha($img, 245, 158, 11, 120),
            default => imagecolorallocatealpha($img, 0, 80, 231, 118),
        };

        // Top-right and bottom-left ambient radial gradient circles
        for ($r = 450; $r > 0; $r -= 15) {
            $alpha = 127 - (int)((450 - $r) * 0.035);
            $alpha = max(112, min(127, $alpha));
            $glow = imagecolorallocatealpha($img, 0, 80, 231, $alpha);
            imagefilledellipse($img, $width - 80, 80, $r * 2, $r * 2, $glow);
            imagefilledellipse($img, 100, $height - 50, $r * 1.5, $r * 1.5, $glow);
        }

        // Draw tech grid texture
        $gridSpacing = 50;
        for ($x = 0; $x < $width; $x += $gridSpacing) {
            imageline($img, $x, 0, $x, $height, $gridLine);
        }
        for ($y = 0; $y < $height; $y += $gridSpacing) {
            imageline($img, 0, $y, $width, $y, $gridLine);
        }

        // Decorative circuit dots at grid intersections
        $dotColor = imagecolorallocatealpha($img, 96, 165, 250, 95);
        for ($x = 100; $x < $width - 100; $x += $gridSpacing * 2) {
            for ($y = 100; $y < $height - 100; $y += $gridSpacing * 2) {
                imagefilledellipse($img, $x, $y, 4, 4, $dotColor);
            }
        }

        // 3. Draw Brand Accent Top Bar
        imagefilledrectangle($img, 0, 0, $width, 5, $accentBlue);

        // 4. Resolve Font File
        $fontFile = self::resolveFontPath();

        // 5. Render Category Badge / Kicker
        $categoryText = 'BLUEBASE TECHNOLOGIES • ' . strtoupper($category ?: 'ENTERPRISE ARCHITECTURE');
        $badgeY = 160;

        if ($fontFile && function_exists('imagettftext')) {
            // Draw category tag pill
            $pillWidth = (strlen($categoryText) * 11) + 40;
            $pillBg = imagecolorallocatealpha($img, 0, 80, 231, 105);
            $pillBorder = imagecolorallocatealpha($img, 96, 165, 250, 80);

            imagefilledrectangle($img, 100, $badgeY - 26, 100 + $pillWidth, $badgeY + 12, $pillBg);
            imagerectangle($img, 100, $badgeY - 26, 100 + $pillWidth, $badgeY + 12, $pillBorder);

            imagettftext($img, 12, 0, 120, $badgeY - 3, $textWhite, $fontFile, $categoryText);

            // 6. Word Wrap and Render Title
            $fontSize = strlen($title) > 65 ? 36 : (strlen($title) > 40 ? 42 : 48);
            $lines = self::wrapText($title, $fontFile, $fontSize, 1050);

            $titleStartY = $badgeY + 80;
            $lineHeight = (int)($fontSize * 1.35);

            foreach ($lines as $i => $line) {
                $y = $titleStartY + ($i * $lineHeight);
                // Subtle shadow
                $shadowColor = imagecolorallocatealpha($img, 0, 0, 0, 60);
                imagettftext($img, $fontSize, 0, 102, $y + 3, $shadowColor, $fontFile, $line);
                // Main white title text
                imagettftext($img, $fontSize, 0, 100, $y, $textWhite, $fontFile, $line);
            }

            // 7. Render Footer Watermark
            $footerText = 'bluebasetechnologies.com  •  Cloud Architecture, Software Modernization & Autonomous AI';
            imagettftext($img, 12, 0, 100, $height - 70, $textMuted, $fontFile, $footerText);
        } else {
            // Built-in GD font fallback
            imagestring($img, 4, 100, $badgeY - 20, $categoryText, $accentCyan);
            imagestring($img, 5, 100, $badgeY + 40, substr($title, 0, 80), $textWhite);
            imagestring($img, 3, 100, $height - 70, 'bluebasetechnologies.com', $textMuted);
        }

        // Save high quality JPG
        imagejpeg($img, $fullPath, 92);
        imagedestroy($img);

        return 'images/blogs/' . $filename;
    }

    /**
     * Word wrap text for TrueType fonts.
     */
    private static function wrapText(string $text, string $fontFile, int $fontSize, int $maxWidth): array
    {
        $words = explode(' ', $text);
        $lines = [];
        $currentLine = '';

        foreach ($words as $word) {
            $testLine = $currentLine ? ($currentLine . ' ' . $word) : $word;
            $box = imagettfbbox($fontSize, 0, $fontFile, $testLine);
            $lineWidth = abs($box[4] - $box[0]);

            if ($lineWidth > $maxWidth && !empty($currentLine)) {
                $lines[] = $currentLine;
                $currentLine = $word;
            } else {
                $currentLine = $testLine;
            }
        }

        if (!empty($currentLine)) {
            $lines[] = $currentLine;
        }

        return array_slice($lines, 0, 4); // Max 4 lines
    }

    /**
     * Resolve reliable TTF font path across Windows & Linux.
     */
    private static function resolveFontPath(): ?string
    {
        $bundled = public_path('fonts/Inter-Bold.ttf');
        if (File::exists($bundled)) {
            return $bundled;
        }

        $candidates = [
            'C:\\Windows\\Fonts\\segoeuib.ttf',
            'C:\\Windows\\Fonts\\arialbd.ttf',
            'C:\\Windows\\Fonts\\calibrib.ttf',
            '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
            '/usr/share/fonts/truetype/liberation/LiberationSans-Bold.ttf',
        ];

        foreach ($candidates as $cand) {
            if (File::exists($cand)) {
                return $cand;
            }
        }

        return null;
    }
}
