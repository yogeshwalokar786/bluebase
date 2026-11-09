@extends('admin.layout')

@section('title', 'Media & File Manager')
@section('page_title', 'Media Library & File Manager')

@section('content')
<!-- Header Stats & Actions -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
  <div class="card" style="margin-bottom: 0; padding: 16px 20px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Total Files</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: #fff; margin-top: 4px;">{{ $stats['total_files'] }}</div>
  </div>
  <div class="card" style="margin-bottom: 0; padding: 16px 20px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Media Library Size</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: var(--accent); margin-top: 4px;">{{ $stats['total_size'] }}</div>
  </div>
  <div class="card" style="margin-bottom: 0; padding: 16px 20px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">User Uploads</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: var(--success); margin-top: 4px;">{{ $stats['uploads_count'] }}</div>
  </div>
  <div class="card" style="margin-bottom: 0; padding: 16px 20px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Brand &amp; System Assets</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: #F59E0B; margin-top: 4px;">{{ $stats['images_count'] }}</div>
  </div>
</div>

<!-- Upload Dropzone Card -->
<div class="card" style="margin-bottom: 24px; border: 2px dashed rgba(96, 165, 250, 0.35); background: rgba(9, 14, 35, 0.4); text-align: center; padding: 32px 20px; transition: all 0.2s;" id="pageDropzone">
  <input type="file" id="pageFileInput" multiple accept="image/*,.pdf,.doc,.docx,.zip,.mp4" style="display: none;">
  <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
    <div style="width: 52px; height: 52px; border-radius: 50%; background: rgba(0, 80, 231, 0.15); display: flex; align-items: center; justify-content: center; color: var(--accent);">
      <svg style="width: 26px; height: 26px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
    </div>
    <div style="font-size: 1.05rem; font-weight: 700; color: #fff;">Upload Files to Media Library</div>
    <p style="font-size: 0.82rem; color: var(--text-muted); max-width: 480px;">Drag and drop image files (JPG, PNG, WebP, SVG, GIF) or documents here, or click to browse from your device. Up to 25MB per file.</p>
    <button type="button" class="btn btn-primary" onclick="document.getElementById('pageFileInput').click();" style="margin-top: 6px;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Select Files to Upload
    </button>
  </div>
  <div id="pageUploadProgress" style="display: none; margin-top: 16px; max-width: 400px; margin-left: auto; margin-right: auto;">
    <div style="font-size: 0.82rem; color: var(--accent); margin-bottom: 6px;" id="pageUploadStatus">Uploading...</div>
    <div style="width: 100%; height: 6px; background: rgba(255,255,255,0.1); border-radius: 4px; overflow: hidden;">
      <div id="pageProgressBar" style="width: 0%; height: 100%; background: var(--primary); transition: width 0.3s;"></div>
    </div>
  </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
  <div class="filter-tabs">
    <a href="{{ route('admin.filemanager.index', ['folder' => 'all', 'type' => request('type', 'all'), 'search' => request('search')]) }}" class="filter-tab {{ $folder === 'all' ? 'active' : '' }}">
      All Files
    </a>
    <a href="{{ route('admin.filemanager.index', ['folder' => 'uploads', 'type' => request('type', 'all'), 'search' => request('search')]) }}" class="filter-tab {{ $folder === 'uploads' ? 'active' : '' }}">
      Uploads
    </a>
    <a href="{{ route('admin.filemanager.index', ['folder' => 'stories', 'type' => request('type', 'all'), 'search' => request('search')]) }}" class="filter-tab {{ $folder === 'stories' ? 'active' : '' }}">
      Customer Stories
    </a>
    <a href="{{ route('admin.filemanager.index', ['folder' => 'images', 'type' => request('type', 'all'), 'search' => request('search')]) }}" class="filter-tab {{ $folder === 'images' ? 'active' : '' }}">
      Brand &amp; System
    </a>
  </div>

  <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
    <form method="GET" action="{{ route('admin.filemanager.index') }}" style="display: flex; gap: 8px;">
      <input type="hidden" name="folder" value="{{ $folder }}">
      <select name="type" class="form-select" style="width: 130px; padding: 6px 10px; font-size: 0.82rem;" onchange="this.form.submit()">
        <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All Formats</option>
        <option value="image" {{ $type === 'image' ? 'selected' : '' }}>Images</option>
        <option value="document" {{ $type === 'document' ? 'selected' : '' }}>Documents</option>
      </select>
      <input type="text" name="search" value="{{ $search }}" placeholder="Search files..." class="form-control" style="width: 200px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Filter</button>
      @if($search || $folder !== 'all' || $type !== 'all')
        <a href="{{ route('admin.filemanager.index') }}" class="btn btn-secondary btn-sm" title="Clear filter">Reset</a>
      @endif
    </form>
  </div>
</div>

<!-- Media Grid -->
<div class="card" style="padding: 20px;">
  <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 18px;" id="mediaGrid">
    @forelse($files as $file)
      <div class="file-card" data-url="{{ $file['url'] }}" data-name="{{ $file['name'] }}" data-size="{{ $file['size'] }}" data-dim="{{ $file['dimensions'] ?? 'N/A' }}" data-full="{{ $file['full_url'] }}" style="background: rgba(0, 0, 0, 0.35); border: 1px solid var(--border-color); border-radius: 10px; overflow: hidden; display: flex; flex-direction: column; transition: all 0.2s ease; position: relative;">
        <!-- Preview Box -->
        <div style="height: 130px; width: 100%; background: #060913; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; border-bottom: 1px solid var(--border-color);">
          @if($file['is_image'])
            <img src="{{ $file['full_url'] }}" alt="{{ $file['name'] }}" style="max-height: 100%; max-width: 100%; object-fit: contain;" loading="lazy">
          @else
            <div style="display: flex; flex-direction: column; align-items: center; gap: 4px; color: var(--accent);">
              <svg style="width: 38px; height: 38px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              <span style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">{{ $file['extension'] }}</span>
            </div>
          @endif
          <span class="badge" style="position: absolute; top: 6px; right: 6px; background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(4px); font-size: 0.65rem; color: #CBD5E1; padding: 2px 6px;">
            {{ strtoupper($file['extension']) }}
          </span>
        </div>

        <!-- Meta info -->
        <div style="padding: 10px 12px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div style="font-size: 0.82rem; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $file['name'] }}">
              {{ $file['name'] }}
            </div>
            <div style="font-size: 0.72rem; color: var(--text-dim); margin-top: 3px; display: flex; justify-content: space-between;">
              <span>{{ $file['size'] }}</span>
              @if(!empty($file['dimensions']))
                <span>{{ $file['dimensions'] }}</span>
              @endif
            </div>
          </div>

          <!-- Actions -->
          <div style="margin-top: 10px; display: flex; gap: 6px; align-items: center; justify-content: space-between; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 8px;">
            <button type="button" class="btn btn-secondary btn-sm" style="flex: 1; padding: 4px 6px; font-size: 0.74rem; justify-content: center;" onclick="copyToClipboard('{{ $file['url'] }}', this)">
              <svg style="width: 12px; height: 12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
              <span>Copy URL</span>
            </button>
            @if($file['is_deletable'])
              <button type="button" class="btn btn-danger btn-sm" style="padding: 4px 6px;" title="Delete File" onclick="deleteMediaFile('{{ $file['url'] }}', this)">
                <svg style="width: 12px; height: 12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
              </button>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div style="grid-column: 1 / -1; text-align: center; padding: 48px 20px; color: var(--text-muted);">
        <svg style="width: 48px; height: 48px; color: var(--text-dim); margin-bottom: 12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        <div style="font-size: 1rem; font-weight: 600; color: #fff;">No files found</div>
        <p style="font-size: 0.82rem; margin-top: 4px;">No media files match your filter or search criteria.</p>
      </div>
    @endforelse
  </div>
</div>
@endsection

@push('scripts')
<script>
function copyToClipboard(text, btn) {
  navigator.clipboard.writeText(text).then(function() {
    const span = btn.querySelector('span');
    const originalText = span ? span.innerText : 'Copy URL';
    if (span) span.innerText = 'Copied!';
    btn.style.borderColor = 'var(--success)';
    setTimeout(() => {
      if (span) span.innerText = originalText;
      btn.style.borderColor = '';
    }, 1800);
  }).catch(function(err) {
    prompt('Copy file URL:', text);
  });
}

function deleteMediaFile(path, btn) {
  if (!confirm('Are you sure you want to permanently delete this file?')) return;

  const card = btn.closest('.file-card');
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  fetch('{{ route("admin.filemanager.delete") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
      'Accept': 'application/json'
    },
    body: JSON.stringify({ path: path })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      card.style.opacity = '0';
      setTimeout(() => card.remove(), 250);
    } else {
      alert(data.message || 'Failed to delete file.');
    }
  })
  .catch(err => {
    alert('An error occurred during deletion.');
  });
}

// Standalone dropzone uploads
const dropzone = document.getElementById('pageDropzone');
const fileInput = document.getElementById('pageFileInput');
const progressBar = document.getElementById('pageProgressBar');
const progressContainer = document.getElementById('pageUploadProgress');
const uploadStatus = document.getElementById('pageUploadStatus');

if (dropzone && fileInput) {
  ['dragenter', 'dragover'].forEach(eventName => {
    dropzone.addEventListener(eventName, (e) => {
      e.preventDefault();
      e.stopPropagation();
      dropzone.style.borderColor = 'var(--accent)';
      dropzone.style.background = 'rgba(0, 80, 231, 0.1)';
    });
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, (e) => {
      e.preventDefault();
      e.stopPropagation();
      dropzone.style.borderColor = 'rgba(96, 165, 250, 0.35)';
      dropzone.style.background = 'rgba(9, 14, 35, 0.4)';
    });
  });

  dropzone.addEventListener('drop', (e) => {
    const files = e.dataTransfer.files;
    if (files.length > 0) uploadFilesList(files);
  });

  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) uploadFilesList(fileInput.files);
  });
}

function uploadFilesList(files) {
  const formData = new FormData();
  for (let i = 0; i < files.length; i++) {
    formData.append('files[]', files[i]);
  }

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  progressContainer.style.display = 'block';
  progressBar.style.width = '30%';
  uploadStatus.innerText = 'Uploading ' + files.length + ' file(s)...';

  const xhr = new XMLHttpRequest();
  xhr.open('POST', '{{ route("admin.filemanager.upload") }}', true);
  xhr.setRequestHeader('X-CSRF-TOKEN', token);
  xhr.setRequestHeader('Accept', 'application/json');

  xhr.upload.onprogress = function(e) {
    if (e.lengthComputable) {
      const percent = Math.round((e.loaded / e.total) * 100);
      progressBar.style.width = percent + '%';
      uploadStatus.innerText = 'Uploading: ' + percent + '%';
    }
  };

  xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
      progressBar.style.width = '100%';
      uploadStatus.innerText = 'Upload complete! Reloading library...';
      setTimeout(() => window.location.reload(), 600);
    } else {
      uploadStatus.innerText = 'Upload failed. Please check file type & size.';
      progressBar.style.background = 'var(--danger)';
    }
  };

  xhr.onerror = function() {
    uploadStatus.innerText = 'Network error while uploading.';
    progressBar.style.background = 'var(--danger)';
  };

  xhr.send(formData);
}
</script>
@endpush

