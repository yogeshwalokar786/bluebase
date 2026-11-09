<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
    (function() {
      const savedTheme = localStorage.getItem('bluebase_admin_theme');
      if (savedTheme === 'light') {
        document.documentElement.classList.add('light-mode');
      }
    })();
  </script>
  <title>@yield('title', 'Admin Dashboard') | Bluebase Portal</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-dark: #070B19;
      --bg-surface: #090E23;
      --bg-card: rgba(15, 23, 42, 0.75);
      --bg-card-hover: rgba(30, 41, 59, 0.6);
      --border-color: rgba(255, 255, 255, 0.08);
      --border-hover: rgba(96, 165, 250, 0.3);
      --primary: #0050E7;
      --primary-hover: #1D68FF;
      --primary-glow: rgba(0, 80, 231, 0.35);
      --accent: #60A5FA;
      --text: #F8FAFC;
      --text-muted: #94A3B8;
      --text-dim: #64748B;
      --success: #10B981;
      --warning: #F59E0B;
      --danger: #EF4444;
      --purple: #8B5CF6;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: var(--bg-dark);
      color: var(--text);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      min-height: 100vh;
      display: flex;
    }
    /* Sidebar */
    .admin-sidebar {
      width: 270px;
      background: var(--bg-surface);
      border-right: 1px solid var(--border-color);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
    }
    .sidebar-header {
      padding: 22px 20px;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .sidebar-header img {
      height: 30px;
      width: auto;
    }
    .sidebar-badge {
      font-size: 0.65rem;
      font-weight: 700;
      background: linear-gradient(135deg, #0050E7, #60A5FA);
      color: #fff;
      padding: 3px 8px;
      border-radius: 4px;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      margin-left: auto;
    }
    .sidebar-menu {
      padding: 16px 12px;
      flex: 1;
      overflow-y: auto;
    }
    .sidebar-menu::-webkit-scrollbar { width: 5px; }
    .sidebar-menu::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
    .menu-group-title {
      font-size: 0.68rem;
      font-weight: 700;
      color: var(--text-dim);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 12px 12px 6px 12px;
    }
    .nav-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 9px 12px;
      color: var(--text-muted);
      text-decoration: none;
      font-size: 0.85rem;
      font-weight: 500;
      border-radius: 8px;
      margin-bottom: 3px;
      transition: all 0.2s ease;
    }
    .nav-item-content {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .nav-item:hover {
      background: rgba(255, 255, 255, 0.05);
      color: #ffffff;
    }
    .nav-item.active {
      background: rgba(0, 80, 231, 0.15);
      color: var(--accent);
      border-left: 3px solid var(--primary);
      font-weight: 600;
    }
    .nav-item svg {
      width: 17px;
      height: 17px;
      stroke-width: 2;
      flex-shrink: 0;
    }
    .nav-count {
      font-size: 0.7rem;
      background: rgba(255, 255, 255, 0.1);
      padding: 1px 7px;
      border-radius: 12px;
      color: var(--text-muted);
    }
    .nav-item.active .nav-count {
      background: rgba(0, 80, 231, 0.4);
      color: #fff;
    }
    .sidebar-footer {
      padding: 16px;
      border-top: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: rgba(0, 0, 0, 0.25);
    }
    .user-info { font-size: 0.82rem; }
    .user-name { font-weight: 600; color: #fff; }
    .user-role { font-size: 0.72rem; color: var(--text-muted); }
    .btn-logout {
      background: none;
      border: none;
      color: var(--text-muted);
      cursor: pointer;
      display: flex;
      align-items: center;
      padding: 6px;
      border-radius: 6px;
      transition: color 0.2s;
    }
    .btn-logout:hover { color: var(--danger); }
    /* Main Content */
    .admin-main {
      margin-left: 270px;
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: var(--bg-dark);
    }
    .admin-topbar {
      height: 64px;
      border-bottom: 1px solid var(--border-color);
      background: rgba(9, 14, 35, 0.85);
      backdrop-filter: blur(14px);
      padding: 0 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 90;
    }
    .topbar-title {
      font-size: 1.15rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .topbar-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .link-live, .link-phpmyadmin {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 0.82rem;
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
      transition: all 0.2s;
      font-weight: 500;
    }
    .link-live {
      color: var(--accent);
      border: 1px solid rgba(96, 165, 250, 0.3);
      background: rgba(96, 165, 250, 0.05);
    }
    .link-live:hover { background: rgba(96, 165, 250, 0.15); }
    .link-phpmyadmin {
      color: #F59E0B;
      border: 1px solid rgba(245, 158, 11, 0.3);
      background: rgba(245, 158, 11, 0.05);
    }
    .link-phpmyadmin:hover { background: rgba(245, 158, 11, 0.15); }
    .admin-body {
      padding: 32px;
      flex: 1;
    }
    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 0.85rem;
      font-weight: 600;
      padding: 8px 16px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .btn svg { width: 16px; height: 16px; }
    .btn-primary {
      background: var(--primary);
      color: #fff;
    }
    .btn-primary:hover { background: var(--primary-hover); box-shadow: 0 4px 14px var(--primary-glow); }
    .btn-secondary {
      background: rgba(255, 255, 255, 0.08);
      color: var(--text);
      border: 1px solid var(--border-color);
    }
    .btn-secondary:hover { background: rgba(255, 255, 255, 0.15); }
    .btn-success { background: var(--success); color: #fff; }
    .btn-success:hover { background: #059669; }
    .btn-danger { background: rgba(239, 68, 68, 0.15); color: #F87171; border: 1px solid rgba(239, 68, 68, 0.3); }
    .btn-danger:hover { background: var(--danger); color: #fff; }
    .btn-sm { padding: 5px 10px; font-size: 0.78rem; border-radius: 6px; }
    /* Cards */
    .card {
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 24px;
      backdrop-filter: blur(10px);
      margin-bottom: 24px;
    }
    .card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .card-title {
      font-size: 1.05rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    /* Tables */
    .table-responsive {
      width: 100%;
      overflow-x: auto;
    }
    .data-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.88rem;
      text-align: left;
    }
    .data-table th {
      padding: 12px 14px;
      font-size: 0.72rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--text-dim);
      border-bottom: 1px solid var(--border-color);
      background: rgba(0, 0, 0, 0.15);
    }
    .data-table td {
      padding: 12px 14px;
      border-bottom: 1px solid var(--border-color);
      vertical-align: middle;
      color: var(--text);
    }
    .data-table tr:hover td {
      background: rgba(255, 255, 255, 0.02);
    }
    /* Badges */
    .badge {
      display: inline-block;
      padding: 3px 8px;
      border-radius: 6px;
      font-size: 0.72rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.03em;
    }
    .badge-new { background: rgba(0, 80, 231, 0.2); color: #60A5FA; border: 1px solid rgba(0, 80, 231, 0.4); }
    .badge-confirmed, .badge-active, .badge-approved { background: rgba(16, 185, 129, 0.2); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.4); }
    .badge-pending, .badge-reviewed { background: rgba(245, 158, 11, 0.2); color: #FBBF24; border: 1px solid rgba(245, 158, 11, 0.4); }
    .badge-closed, .badge-expired, .badge-inactive, .badge-cancelled { background: rgba(148, 163, 184, 0.15); color: #94A3B8; border: 1px solid rgba(148, 163, 184, 0.3); }
    .badge-contacted { background: rgba(139, 92, 246, 0.2); color: #A78BFA; border: 1px solid rgba(139, 92, 246, 0.4); }
    .badge-danger { background: rgba(239, 68, 68, 0.2); color: #F87171; border: 1px solid rgba(239, 68, 68, 0.4); }
    /* Nav Filter Tabs */
    .filter-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    .filter-tabs {
      display: flex;
      gap: 6px;
      background: rgba(0, 0, 0, 0.25);
      padding: 4px;
      border-radius: 8px;
      border: 1px solid var(--border-color);
    }
    .filter-tab {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--text-muted);
      text-decoration: none;
      border-radius: 6px;
      transition: all 0.2s;
    }
    .filter-tab:hover { color: #fff; background: rgba(255, 255, 255, 0.05); }
    .filter-tab.active { background: var(--primary); color: #fff; font-weight: 600; }
    .filter-tab .count {
      font-size: 0.7rem;
      background: rgba(255, 255, 255, 0.15);
      padding: 1px 6px;
      border-radius: 10px;
    }
    /* Forms */
    .form-group { margin-bottom: 20px; }
    .form-label {
      display: block;
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 8px;
    }
    .form-control, .form-select {
      width: 100%;
      background: rgba(0, 0, 0, 0.35);
      border: 1px solid var(--border-color);
      color: #fff;
      padding: 10px 14px;
      border-radius: 8px;
      font-size: 0.88rem;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      font-family: inherit;
    }
    .form-control:focus, .form-select:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.15);
    }
    .form-select option { background: #090E23; color: #fff; }
    textarea.form-control { resize: vertical; min-height: 100px; }
    .form-hint { font-size: 0.75rem; color: var(--text-dim); margin-top: 5px; }
    .form-check {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
    }
    .form-check input[type="checkbox"] {
      width: 18px;
      height: 18px;
      cursor: pointer;
      accent-color: var(--primary);
    }
    /* Flash alert */
    .flash-alert {
      padding: 12px 18px;
      background: rgba(16, 185, 129, 0.15);
      border: 1px solid rgba(16, 185, 129, 0.4);
      color: #6EE7B7;
      border-radius: 8px;
      font-size: 0.88rem;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .flash-alert-danger {
      background: rgba(239, 68, 68, 0.15);
      border-color: rgba(239, 68, 68, 0.4);
      color: #FCA5A5;
    }
    /* Detail View Components */
    .detail-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 24px;
    }
    @media (max-width: 900px) {
      .detail-grid { grid-template-columns: 1fr; }
    }
    .info-list { display: flex; flex-direction: column; gap: 14px; }
    .info-item { display: flex; flex-direction: column; gap: 4px; }
    .info-label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em; }
    .info-value { font-size: 0.92rem; color: #fff; font-weight: 500; }
    .message-box {
      background: rgba(0, 0, 0, 0.3);
      border: 1px solid var(--border-color);
      border-radius: 8px;
      padding: 16px;
      font-size: 0.9rem;
      line-height: 1.6;
      white-space: pre-wrap;
      color: #E2E8F0;
    }
    .pagination {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 6px;
      margin-top: 20px;
    }
    .pagination a, .pagination span {
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.82rem;
      background: rgba(255, 255, 255, 0.05);
      color: var(--text);
      text-decoration: none;
      border: 1px solid var(--border-color);
    }
    .pagination .active span { background: var(--primary); border-color: var(--primary); color: #fff; }

    .metric-value {
      font-size: 2.2rem;
      font-weight: 800;
      color: var(--text);
      line-height: 1;
    }
    .card-featured {
      background: linear-gradient(135deg, rgba(0, 80, 231, 0.2), rgba(15, 23, 42, 0.8));
      border-color: rgba(96, 165, 250, 0.3);
    }
    .card-dashed {
      background: rgba(9, 14, 35, 0.5);
      border-style: dashed;
    }
  
  </style>
  @stack('styles')
  <!-- Quill Snow WYSIWYG Stylesheet -->
  <link rel="stylesheet" href="{{ asset('vendor/quill/quill.snow.css') }}">
  <style>
    /* Quill Dark Cyber Theme Customizations */
    .ql-toolbar.ql-snow {
      background: #090E23;
      border: 1px solid var(--border-color);
      border-radius: 8px 8px 0 0;
      padding: 10px 12px;
      font-family: inherit;
    }
    .ql-container.ql-snow {
      background: rgba(0, 0, 0, 0.4);
      border: 1px solid var(--border-color);
      border-top: none;
      border-radius: 0 0 8px 8px;
      color: #F8FAFC;
      font-size: 0.92rem;
      font-family: 'Inter', sans-serif;
      min-height: 200px;
    }
    .editor-light-container .ql-container.ql-snow { min-height: 140px; }
    .editor-advanced-container .ql-container.ql-snow { min-height: 320px; }
    .ql-editor { line-height: 1.7; min-height: 100%; }
    .ql-editor.ql-blank::before { color: var(--text-dim); font-style: normal; }
    .ql-snow .ql-stroke { stroke: #94A3B8; }
    .ql-snow .ql-fill { fill: #94A3B8; }
    .ql-snow .ql-picker { color: #94A3B8; font-weight: 500; font-size: 0.82rem; }
    .ql-snow .ql-picker-options {
      background: #090E23 !important;
      border: 1px solid var(--border-color) !important;
      box-shadow: 0 10px 25px rgba(0,0,0,0.5);
      border-radius: 6px;
      padding: 6px;
    }
    .ql-snow .ql-picker-item { color: #94A3B8; }
    .ql-snow .ql-picker-item:hover, .ql-snow .ql-picker-item.ql-selected { color: var(--accent) !important; }
    .ql-snow button:hover .ql-stroke, .ql-snow .ql-picker-label:hover .ql-stroke,
    .ql-snow button.ql-active .ql-stroke, .ql-snow .ql-picker-label.ql-active .ql-stroke {
      stroke: var(--accent) !important;
    }
    .ql-snow button:hover .ql-fill, .ql-snow .ql-picker-label:hover .ql-fill,
    .ql-snow button.ql-active .ql-fill, .ql-snow .ql-picker-label.ql-active .ql-fill {
      fill: var(--accent) !important;
    }
    .ql-snow pre.ql-syntax {
      background: #040714 !important;
      color: #93C5FD !important;
      border: 1px solid rgba(96, 165, 250, 0.2);
      border-radius: 6px;
      padding: 12px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.85rem;
    }
    /* HTML Source Mode Textarea */
    .editor-html-source {
      width: 100%;
      min-height: 320px;
      background: #040714;
      border: 1px solid var(--border-color);
      color: #86EFAC;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.85rem;
      padding: 14px;
      border-radius: 0 0 8px 8px;
      outline: none;
      display: none;
      resize: vertical;
      box-sizing: border-box;
    }

    /* Media Picker Input Group */
    .media-picker-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .media-picker-input-wrap {
      display: flex;
      gap: 8px;
    }
    .media-preview-container {
      width: 160px;
      height: 100px;
      border-radius: 8px;
      border: 1px solid var(--border-color);
      background: rgba(0, 0, 0, 0.35);
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .media-preview-container img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }
    .media-preview-placeholder {
      font-size: 0.72rem;
      color: var(--text-dim);
      text-align: center;
      padding: 8px;
    }

    /* File Manager Modal */
    .fm-modal-backdrop {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 4, 15, 0.85);
      backdrop-filter: blur(8px);
      z-index: 99999;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .fm-modal-backdrop.open {
      display: flex;
    }
    .fm-modal-window {
      background: #090E23;
      border: 1px solid var(--border-color);
      border-radius: 14px;
      width: 95vw;
      max-width: 1100px;
      height: 85vh;
      max-height: 800px;
      display: flex;
      flex-direction: column;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8);
      overflow: hidden;
    }
    .fm-modal-header {
      padding: 16px 24px;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: rgba(0, 0, 0, 0.2);
    }
    .fm-modal-title {
      font-size: 1.05rem;
      font-weight: 700;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .fm-modal-close {
      background: none;
      border: none;
      color: var(--text-muted);
      cursor: pointer;
      font-size: 1.4rem;
      line-height: 1;
      padding: 4px;
      transition: color 0.2s;
    }
    .fm-modal-close:hover { color: #fff; }
    .fm-modal-body {
      flex: 1;
      display: flex;
      overflow: hidden;
    }
    .fm-main-area {
      flex: 1;
      display: flex;
      flex-direction: column;
      border-right: 1px solid var(--border-color);
      overflow: hidden;
    }
    .fm-top-controls {
      padding: 14px 20px;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      background: rgba(0, 0, 0, 0.15);
      flex-wrap: wrap;
    }
    .fm-tabs {
      display: flex;
      gap: 6px;
      background: rgba(0, 0, 0, 0.3);
      padding: 3px;
      border-radius: 6px;
    }
    .fm-tab {
      padding: 6px 14px;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--text-muted);
      cursor: pointer;
      border-radius: 4px;
      transition: all 0.2s;
    }
    .fm-tab.active {
      background: var(--primary);
      color: #fff;
    }
    .fm-grid-scroll {
      flex: 1;
      overflow-y: auto;
      padding: 20px;
    }
    .fm-grid-scroll::-webkit-scrollbar { width: 6px; }
    .fm-grid-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 6px; }
    .fm-files-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
      gap: 14px;
    }
    .fm-item-card {
      background: rgba(0, 0, 0, 0.35);
      border: 1px solid var(--border-color);
      border-radius: 8px;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.2s ease;
      position: relative;
    }
    .fm-item-card:hover {
      border-color: rgba(96, 165, 250, 0.5);
      transform: translateY(-2px);
    }
    .fm-item-card.selected {
      border-color: var(--accent);
      box-shadow: 0 0 0 2px var(--primary);
      background: rgba(0, 80, 231, 0.15);
    }
    .fm-item-thumb {
      height: 95px;
      background: #040714;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      border-bottom: 1px solid var(--border-color);
    }
    .fm-item-thumb img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }
    .fm-item-info {
      padding: 6px 8px;
    }
    .fm-item-name {
      font-size: 0.72rem;
      font-weight: 600;
      color: #fff;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .fm-item-size {
      font-size: 0.65rem;
      color: var(--text-dim);
      margin-top: 2px;
    }
    /* Details Sidebar */
    .fm-details-sidebar {
      width: 280px;
      background: rgba(0, 0, 0, 0.2);
      padding: 20px;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
    }
    .fm-preview-img-box {
      width: 100%;
      height: 160px;
      background: #040714;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 16px;
    }
    .fm-preview-img-box img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }
    .fm-modal-footer {
      padding: 14px 24px;
      border-top: 1px solid var(--border-color);
      background: rgba(0, 0, 0, 0.25);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .fm-selected-path {
      font-size: 0.78rem;
      color: var(--accent);
      font-family: monospace;
      max-width: 450px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
  
    /* ==========================================================
       LIGHT THEME SYSTEM OVERRIDES (.light-mode)
       ========================================================== */
    html.light-mode {
      --bg-dark: #F8FAFC;
      --bg-surface: #FFFFFF;
      --bg-card: #FFFFFF;
      --bg-card-hover: #F1F5F9;
      --border-color: #E2E8F0;
      --border-hover: #CBD5E1;
      --primary: #0050E7;
      --primary-hover: #1D68FF;
      --primary-glow: rgba(0, 80, 231, 0.2);
      --accent: #0050E7;
      --text: #0F172A;
      --text-muted: #475569;
      --text-dim: #64748B;
      --success: #059669;
      --warning: #D97706;
      --danger: #DC2626;
      --purple: #7C3AED;
    }
    html.light-mode body {
      background: var(--bg-dark);
      color: var(--text);
    }
    html.light-mode .admin-sidebar {
      background: #FFFFFF;
      border-right: 1px solid #E2E8F0;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.02);
    }
    html.light-mode .sidebar-header {
      border-bottom: 1px solid #E2E8F0;
    }
    html.light-mode .sidebar-footer {
      background: #F8FAFC;
      border-top: 1px solid #E2E8F0;
    }
    html.light-mode .user-name { color: #0F172A; }
    html.light-mode .nav-item {
      color: #475569;
    }
    html.light-mode .nav-item:hover {
      background: #F1F5F9;
      color: #0F172A;
    }
    html.light-mode .nav-item.active {
      background: rgba(0, 80, 231, 0.08);
      color: #0050E7;
      border-left: 3px solid #0050E7;
    }
    html.light-mode .nav-count {
      background: #E2E8F0;
      color: #475569;
    }
    html.light-mode .nav-item.active .nav-count {
      background: rgba(0, 80, 231, 0.15);
      color: #0050E7;
    }
    html.light-mode .admin-topbar {
      background: rgba(255, 255, 255, 0.95);
      border-bottom: 1px solid #E2E8F0;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.03);
    }
    html.light-mode .topbar-title { color: #0F172A; }
    html.light-mode .card {
      background: #FFFFFF;
      border: 1px solid #E2E8F0;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
    }
    html.light-mode .card-title { color: #0F172A; }
    html.light-mode .card.card-featured {
      background: linear-gradient(135deg, #EFF6FF, #FFFFFF) !important;
      border-color: #BFDBFE !important;
    }
    html.light-mode .card.card-dashed {
      background: #F8FAFC !important;
      border-color: #CBD5E1 !important;
    }
    html.light-mode .metric-value {
      color: #0F172A;
    }
    html.light-mode .form-label { color: #1E293B; }
    html.light-mode .form-control, html.light-mode .form-select {
      background: #FFFFFF;
      border: 1px solid #CBD5E1;
      color: #0F172A;
    }
    html.light-mode .form-control:focus, html.light-mode .form-select:focus {
      background: #FFFFFF;
      border-color: #0050E7;
      box-shadow: 0 0 0 3px rgba(0, 80, 231, 0.12);
    }
    html.light-mode .form-select option {
      background: #FFFFFF;
      color: #0F172A;
    }
    html.light-mode .btn-secondary {
      background: #F1F5F9;
      color: #1E293B;
      border: 1px solid #CBD5E1;
    }
    html.light-mode .btn-secondary:hover {
      background: #E2E8F0;
      color: #0F172A;
    }
    html.light-mode .data-table th {
      background: #F8FAFC;
      color: #475569;
      border-bottom: 1px solid #E2E8F0;
    }
    html.light-mode .data-table td {
      border-bottom: 1px solid #E2E8F0;
      color: #0F172A;
    }
    html.light-mode .data-table tr:hover td {
      background: #F8FAFC;
    }
    html.light-mode .filter-tabs {
      background: #F1F5F9;
      border: 1px solid #E2E8F0;
    }
    html.light-mode .filter-tab {
      color: #475569;
    }
    html.light-mode .filter-tab:hover {
      color: #0F172A;
      background: #E2E8F0;
    }
    html.light-mode .filter-tab.active {
      background: #0050E7;
      color: #FFFFFF;
    }
    html.light-mode .message-box {
      background: #F8FAFC;
      border: 1px solid #E2E8F0;
      color: #1E293B;
    }
    html.light-mode .info-value { color: #0F172A; }
    html.light-mode .info-label { color: #64748B; }
    html.light-mode .media-preview-container {
      background: #F8FAFC;
      border: 1px solid #CBD5E1;
    }
    /* Quill Light Theme */
    html.light-mode .ql-toolbar.ql-snow {
      background: #F8FAFC;
      border: 1px solid #CBD5E1;
    }
    html.light-mode .ql-container.ql-snow {
      background: #FFFFFF;
      border: 1px solid #CBD5E1;
      color: #0F172A;
    }
    html.light-mode .ql-snow .ql-stroke { stroke: #475569; }
    html.light-mode .ql-snow .ql-fill { fill: #475569; }
    html.light-mode .ql-snow .ql-picker { color: #475569; }
    html.light-mode .ql-snow .ql-picker-options {
      background: #FFFFFF !important;
      border: 1px solid #E2E8F0 !important;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    html.light-mode .ql-snow .ql-picker-item { color: #475569; }
    html.light-mode .editor-html-source {
      background: #0F172A;
      color: #86EFAC;
    }
    /* File Manager Modal Light Mode */
    html.light-mode .fm-modal-window {
      background: #FFFFFF;
      border: 1px solid #E2E8F0;
      color: #0F172A;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
    }
    html.light-mode .fm-modal-header {
      background: #F8FAFC;
      border-bottom: 1px solid #E2E8F0;
    }
    html.light-mode .fm-modal-title { color: #0F172A; }
    html.light-mode .fm-top-controls {
      background: #F8FAFC;
      border-bottom: 1px solid #E2E8F0;
    }
    html.light-mode .fm-item-card {
      background: #FFFFFF;
      border: 1px solid #E2E8F0;
    }
    html.light-mode .fm-item-thumb {
      background: #F1F5F9;
      border-bottom: 1px solid #E2E8F0;
    }
    html.light-mode .fm-item-name { color: #0F172A; }
    html.light-mode .fm-details-sidebar {
      background: #F8FAFC;
      border-left: 1px solid #E2E8F0;
    }
    html.light-mode .fm-modal-footer {
      background: #F8FAFC;
      border-top: 1px solid #E2E8F0;
    }
    html.light-mode #fmMetaName, html.light-mode #fmMetaDim, html.light-mode #fmMetaSize {
      color: #0F172A !important;
    }
    html.light-mode #fmModalDropzone {
      background: #F8FAFC;
      border-color: #CBD5E1;
    }
    /* Theme toggle button */
    .btn-theme-toggle {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 6px 12px;
      border-radius: 8px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      border: 1px solid var(--border-color);
      background: rgba(255, 255, 255, 0.05);
      color: var(--text-muted);
      transition: all 0.2s ease;
    }
    .btn-theme-toggle:hover {
      background: rgba(255, 255, 255, 0.12);
      color: var(--text);
    }
    html.light-mode .btn-theme-toggle {
      background: #F1F5F9;
      border-color: #CBD5E1;
      color: #1E293B;
    }
    html.light-mode .btn-theme-toggle:hover {
      background: #E2E8F0;
      color: #0F172A;
    }

  </style>

</head>
<body>

  <!-- Admin Sidebar -->
  <aside class="admin-sidebar">
    <div class="sidebar-header">
      <img src="{{ asset('images/logo-icon.png') }}" alt="Bluebase Icon">
      <div>
        <div style="font-weight: 700; font-size: 0.95rem;">Bluebase</div>
        <div style="font-size: 0.7rem; color: var(--text-muted);">Enterprise Portal</div>
      </div>
      <span class="sidebar-badge">CMS &amp; LEADS</span>
    </div>

    <div class="sidebar-menu">
      <div class="menu-group-title">Main</div>
      <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
          <span>Dashboard</span>
        </span>
      </a>

      <div class="menu-group-title">Lead Management</div>
      <a href="{{ route('admin.leads.inquiries') }}" class="nav-item {{ request()->routeIs('admin.leads.inquiries*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <span>Contact Inquiries</span>
        </span>
        <span class="nav-count">{{ \App\Models\ContactInquiry::count() }}</span>
      </a>
      <a href="{{ route('admin.leads.demos') }}" class="nav-item {{ request()->routeIs('admin.leads.demos*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <span>Demo Bookings</span>
        </span>
        <span class="nav-count">{{ \App\Models\DemoBooking::count() }}</span>
      </a>
      <a href="{{ route('admin.leads.trials') }}" class="nav-item {{ request()->routeIs('admin.leads.trials*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          <span>Free Trial Requests</span>
        </span>
        <span class="nav-count">{{ \App\Models\TrialRequest::count() }}</span>
      </a>
      <a href="{{ route('admin.leads.partners') }}" class="nav-item {{ request()->routeIs('admin.leads.partners*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          <span>Partner Applications</span>
        </span>
        <span class="nav-count">{{ \App\Models\PartnerApplication::count() }}</span>
      </a>
      <a href="{{ route('admin.leads.subscribers') }}" class="nav-item {{ request()->routeIs('admin.leads.subscribers*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><line x1="22" y1="6" x2="12" y2="13"/><line x1="2" y1="6" x2="12" y2="13"/></svg>
          <span>Newsletter Subscribers</span>
        </span>
        <span class="nav-count">{{ \App\Models\NewsletterSubscriber::count() }}</span>
      </a>

      <div class="menu-group-title">Content Management (CMS)</div>
      <a href="{{ route('admin.cms.solutions.index') }}" class="nav-item {{ request()->routeIs('admin.cms.solutions*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
          <span>Solutions CMS</span>
        </span>
        <span class="nav-count">{{ \App\Models\Solution::count() }}</span>
      </a>
      <a href="{{ route('admin.cms.blogs.index') }}" class="nav-item {{ request()->routeIs('admin.cms.blogs*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
          <span>Case Studies &amp; Blog</span>
        </span>
        <span class="nav-count">{{ \App\Models\Blog::count() }}</span>
      </a>
      <a href="{{ route('admin.cms.testimonials.index') }}" class="nav-item {{ request()->routeIs('admin.cms.testimonials*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          <span>Testimonials CMS</span>
        </span>
        <span class="nav-count">{{ \App\Models\Testimonial::count() }}</span>
      </a>
      <a href="{{ route('admin.filemanager.index') }}" class="nav-item {{ request()->routeIs('admin.filemanager*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          <span>Media &amp; Files</span>
        </span>
        <span class="nav-count">{{ count(\Illuminate\Support\Facades\File::exists(public_path('uploads')) ? \Illuminate\Support\Facades\File::allFiles(public_path('uploads')) : []) }}</span>
      </a>


      
      <div class="menu-group-title">SEO &amp; Traffic Growth</div>
      <a href="{{ route('admin.seo.global') }}" class="nav-item {{ request()->routeIs('admin.seo.global*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
          <span>Global SEO &amp; Meta</span>
        </span>
      </a>
      <a href="{{ route('admin.seo.pages.index') }}" class="nav-item {{ request()->routeIs('admin.seo.pages*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          <span>Page SEO Manager</span>
        </span>
        <span class="nav-count">{{ \App\Models\PageSeo::count() }}</span>
      </a>
      <a href="{{ route('admin.seo.sitemap.index') }}" class="nav-item {{ request()->routeIs('admin.seo.sitemap*') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><path d="M6.5 10v7h7.5"/></svg>
          <span>XML Sitemap</span>
        </span>
      </a>

      <div class="menu-group-title">Configuration</div>
      <a href="{{ route('admin.settings') }}" class="nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
        <span class="nav-item-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
          <span>Site Settings</span>
        </span>
      </a>
    </div>

    <div class="sidebar-footer">
      <div class="user-info">
        <div class="user-name">{{ Auth::user()->name }}</div>
        <div class="user-role">{{ Auth::user()->email }}</div>
      </div>
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-logout" title="Sign Out">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 18px; height: 18px;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        </button>
      </form>
    </div>
  </aside>

  <!-- Admin Main -->
  <main class="admin-main">
    <div class="admin-topbar">
      <div class="topbar-title">
        @yield('page_title', 'Dashboard')
      </div>
      <div class="topbar-actions">
        <!-- Light / Dark Theme Switcher Button -->
        <button type="button" class="btn-theme-toggle" id="themeToggleBtn" title="Toggle Light / Dark Admin Theme">
          <svg id="themeMoonIcon" style="width: 15px; height: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
          <svg id="themeSunIcon" style="width: 15px; height: 15px; display: none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
          <span id="themeToggleText">Light Mode</span>
        </button>

        <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=bluebase_laravel_db" target="_blank" class="link-phpmyadmin" title="Open MySQL in phpMyAdmin">
          <svg style="width: 15px; height: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
          phpMyAdmin DB
        </a>
        <a href="{{ route('home') }}" target="_blank" class="link-live">
          <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Live Website
        </a>
      </div>
    </div>

    <div class="admin-body">
      @if(session('success'))
        <div class="flash-alert">
          <svg style="width: 18px; height: 18px; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <div>{{ session('success') }}</div>
        </div>
      @endif

      @if(session('error'))
        <div class="flash-alert flash-alert-danger">
          <svg style="width: 18px; height: 18px; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <div>{{ session('error') }}</div>
        </div>
      @endif

      @if($errors->any())
        <div class="flash-alert flash-alert-danger">
          <ul>
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @yield('content')
    </div>
  </main>

  @stack('scripts')

  <!-- Global File Manager Selector Modal -->
  <div class="fm-modal-backdrop" id="fileManagerModal">
    <div class="fm-modal-window">
      <div class="fm-modal-header">
        <div class="fm-modal-title">
          <svg style="width: 20px; height: 20px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          Media Library &amp; File Manager
        </div>
        <button type="button" class="fm-modal-close" id="fmCloseBtn" aria-label="Close">&times;</button>
      </div>

      <div class="fm-modal-body">
        <div class="fm-main-area">
          <div class="fm-top-controls">
            <div class="fm-tabs">
              <div class="fm-tab active" id="fmTabBrowse" onclick="switchFmTab('browse')">Browse Library</div>
              <div class="fm-tab" id="fmTabUpload" onclick="switchFmTab('upload')">Upload New</div>
            </div>

            <div style="display: flex; gap: 8px; align-items: center;" id="fmFilterControls">
              <select id="fmFolderSelect" class="form-select" style="width: 120px; padding: 5px 8px; font-size: 0.78rem;">
                <option value="all">All Folders</option>
                <option value="uploads">Uploads</option>
                <option value="stories">Stories</option>
                <option value="images">Brand Assets</option>
              </select>
              <input type="text" id="fmSearchInput" placeholder="Filter files..." class="form-control" style="width: 170px; padding: 5px 10px; font-size: 0.78rem;">
            </div>
          </div>

          <!-- Browse Tab -->
          <div class="fm-grid-scroll" id="fmBrowseView">
            <div class="fm-files-grid" id="fmFilesGrid">
              <!-- Dynamically populated via AJAX -->
              <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--text-dim);">
                Loading media library...
              </div>
            </div>
          </div>

          <!-- Upload Tab -->
          <div id="fmUploadView" style="display: none; padding: 40px; text-align: center; flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <div style="width: 100%; max-width: 500px; border: 2px dashed rgba(96, 165, 250, 0.35); border-radius: 12px; padding: 36px 20px; background: rgba(0,0,0,0.25); cursor: pointer;" id="fmModalDropzone">
              <input type="file" id="fmModalFileInput" multiple accept="image/*,.pdf,.doc,.docx,.zip,.mp4" style="display: none;">
              <svg style="width: 48px; height: 48px; color: var(--accent); margin-bottom: 12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
              <div style="font-size: 1rem; font-weight: 700; color: #fff;">Click or Drag Files Here</div>
              <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 6px;">Support for PNG, JPG, WebP, SVG, GIF up to 25MB.</p>
              <button type="button" class="btn btn-primary btn-sm" style="margin-top: 14px;" onclick="document.getElementById('fmModalFileInput').click();">
                Browse Files
              </button>
            </div>
            <div id="fmUploadProgressBar" style="display: none; width: 100%; max-width: 500px; margin-top: 16px;">
              <div style="font-size: 0.78rem; color: var(--accent); margin-bottom: 4px;" id="fmUploadStatus">Uploading...</div>
              <div style="height: 6px; background: rgba(255,255,255,0.1); border-radius: 4px; overflow: hidden;">
                <div id="fmProgressBarInner" style="width: 0%; height: 100%; background: var(--primary); transition: width 0.2s;"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Details Sidebar -->
        <div class="fm-details-sidebar" id="fmSidebar">
          <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); margin-bottom: 12px; letter-spacing: 0.05em;">
            File Details
          </div>
          <div class="fm-preview-img-box" id="fmSidebarPreview">
            <span style="font-size: 0.75rem; color: var(--text-dim);">No file selected</span>
          </div>
          <div id="fmSidebarMeta" style="font-size: 0.78rem; display: flex; flex-direction: column; gap: 8px;">
            <div>
              <div style="color: var(--text-dim); font-size: 0.68rem; text-transform: uppercase;">File Name</div>
              <div style="color: #fff; font-weight: 600; word-break: break-all;" id="fmMetaName">—</div>
            </div>
            <div>
              <div style="color: var(--text-dim); font-size: 0.68rem; text-transform: uppercase;">Dimensions</div>
              <div style="color: #fff;" id="fmMetaDim">—</div>
            </div>
            <div>
              <div style="color: var(--text-dim); font-size: 0.68rem; text-transform: uppercase;">File Size</div>
              <div style="color: #fff;" id="fmMetaSize">—</div>
            </div>
            <div>
              <div style="color: var(--text-dim); font-size: 0.68rem; text-transform: uppercase;">Relative URL</div>
              <div style="color: var(--accent); font-family: monospace; word-break: break-all;" id="fmMetaUrl">—</div>
            </div>
          </div>
        </div>
      </div>

      <div class="fm-modal-footer">
        <div class="fm-selected-path" id="fmFooterSelectedPath">No file chosen</div>
        <div style="display: flex; gap: 10px;">
          <button type="button" class="btn btn-secondary btn-sm" id="fmCancelBtn">Cancel</button>
          <button type="button" class="btn btn-primary btn-sm" id="fmSelectBtn" disabled>
            Insert Selected File
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Quill WYSIWYG Editor Script -->
  <script src="{{ asset('vendor/quill/quill.js') }}"></script>

  <script>
  // ========================================================
  // FILE MANAGER POPUP MODAL ENGINE
  // ========================================================
  (function() {
    let currentCallback = null;
    let selectedFile = null;
    let cachedFiles = [];
    let currentOptions = {};

    const modal = document.getElementById('fileManagerModal');
    const closeBtn = document.getElementById('fmCloseBtn');
    const cancelBtn = document.getElementById('fmCancelBtn');
    const selectBtn = document.getElementById('fmSelectBtn');
    const filesGrid = document.getElementById('fmFilesGrid');
    const searchInput = document.getElementById('fmSearchInput');
    const folderSelect = document.getElementById('fmFolderSelect');
    const sidebarPreview = document.getElementById('fmSidebarPreview');
    const metaName = document.getElementById('fmMetaName');
    const metaDim = document.getElementById('fmMetaDim');
    const metaSize = document.getElementById('fmMetaSize');
    const metaUrl = document.getElementById('fmMetaUrl');
    const footerSelectedPath = document.getElementById('fmFooterSelectedPath');

    window.openFileManager = function(opts) {
      currentOptions = opts || {};
      currentCallback = opts.onSelect || null;
      selectedFile = null;
      selectBtn.disabled = true;
      footerSelectedPath.innerText = 'No file chosen';
      sidebarPreview.innerHTML = '<span style="font-size: 0.75rem; color: var(--text-dim);">No file selected</span>';
      metaName.innerText = '—';
      metaDim.innerText = '—';
      metaSize.innerText = '—';
      metaUrl.innerText = '—';

      switchFmTab('browse');
      modal.classList.add('open');
      loadFmFiles();
    };

    function closeFmModal() {
      modal.classList.remove('open');
    }

    if (closeBtn) closeBtn.addEventListener('click', closeFmModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeFmModal);

    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeFmModal();
    });

    window.switchFmTab = function(tab) {
      const browseView = document.getElementById('fmBrowseView');
      const uploadView = document.getElementById('fmUploadView');
      const tabBrowse = document.getElementById('fmTabBrowse');
      const tabUpload = document.getElementById('fmTabUpload');
      const filterControls = document.getElementById('fmFilterControls');

      if (tab === 'browse') {
        browseView.style.display = 'block';
        uploadView.style.display = 'none';
        tabBrowse.classList.add('active');
        tabUpload.classList.remove('active');
        if (filterControls) filterControls.style.display = 'flex';
      } else {
        browseView.style.display = 'none';
        uploadView.style.display = 'flex';
        tabBrowse.classList.remove('active');
        tabUpload.classList.add('active');
        if (filterControls) filterControls.style.display = 'none';
      }
    };

    function loadFmFiles() {
      const folder = folderSelect ? folderSelect.value : 'all';
      const search = searchInput ? searchInput.value.trim() : '';
      const type = currentOptions.type || 'all';

      filesGrid.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--text-dim);">Loading files...</div>';

      fetch('{{ route("admin.filemanager.api.files") }}?folder=' + encodeURIComponent(folder) + '&search=' + encodeURIComponent(search) + '&type=' + encodeURIComponent(type))
        .then(r => r.json())
        .then(data => {
          if (!data.success) throw new Error(data.message);
          cachedFiles = data.files || [];
          renderFmGrid(cachedFiles);
        })
        .catch(err => {
          filesGrid.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--danger);">Failed to load files: ' + err.message + '</div>';
        });
    }

    function renderFmGrid(files) {
      if (!files || files.length === 0) {
        filesGrid.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--text-dim);">No media files found.</div>';
        return;
      }

      filesGrid.innerHTML = '';
      files.forEach(f => {
        const card = document.createElement('div');
        card.className = 'fm-item-card';
        card.setAttribute('data-url', f.url);

        let thumbHtml = '';
        if (f.is_image) {
          thumbHtml = '<img src="' + f.full_url + '" alt="' + f.name + '" loading="lazy">';
        } else {
          thumbHtml = '<svg style="width: 32px; height: 32px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>';
        }

        card.innerHTML = `
          <div class="fm-item-thumb">${thumbHtml}</div>
          <div class="fm-item-info">
            <div class="fm-item-name" title="${f.name}">${f.name}</div>
            <div class="fm-item-size">${f.size}</div>
          </div>
        `;

        card.addEventListener('click', function() {
          document.querySelectorAll('.fm-item-card').forEach(c => c.classList.remove('selected'));
          card.classList.add('selected');
          selectFmItem(f);
        });

        // Double click immediately chooses file
        card.addEventListener('dblclick', function() {
          selectFmItem(f);
          confirmFmSelection();
        });

        filesGrid.appendChild(card);
      });
    }

    function selectFmItem(f) {
      selectedFile = f;
      selectBtn.disabled = false;
      footerSelectedPath.innerText = f.url;

      if (f.is_image) {
        sidebarPreview.innerHTML = '<img src="' + f.full_url + '" alt="' + f.name + '">';
      } else {
        sidebarPreview.innerHTML = '<div style="font-weight: 700; color: var(--accent); font-size: 1.1rem;">' + f.extension.toUpperCase() + '</div>';
      }

      metaName.innerText = f.name;
      metaDim.innerText = f.dimensions || 'N/A';
      metaSize.innerText = f.size;
      metaUrl.innerText = f.url;
    }

    function confirmFmSelection() {
      if (!selectedFile) return;

      if (typeof currentCallback === 'function') {
        currentCallback(selectedFile);
      }

      if (currentOptions.targetInput) {
        const inp = document.querySelector(currentOptions.targetInput);
        if (inp) {
          inp.value = selectedFile.url;
          inp.dispatchEvent(new Event('input', { bubbles: true }));
          inp.dispatchEvent(new Event('change', { bubbles: true }));
        }
      }

      if (currentOptions.targetPreview) {
        const prev = document.querySelector(currentOptions.targetPreview);
        if (prev) {
          if (prev.tagName === 'IMG') {
            prev.src = selectedFile.full_url;
            prev.style.display = 'block';
          } else {
            prev.innerHTML = '<img src="' + selectedFile.full_url + '" style="max-width: 100%; max-height: 100%; object-fit: contain;">';
          }
        }
      }

      closeFmModal();
    }

    selectBtn.addEventListener('click', confirmFmSelection);

    if (searchInput) {
      let debounce = null;
      searchInput.addEventListener('input', function() {
        clearTimeout(debounce);
        debounce = setTimeout(loadFmFiles, 250);
      });
    }

    if (folderSelect) {
      folderSelect.addEventListener('change', loadFmFiles);
    }

    // Modal Dropzone Upload handling
    const modalDropzone = document.getElementById('fmModalDropzone');
    const modalFileInput = document.getElementById('fmModalFileInput');
    const modalProgressBar = document.getElementById('fmUploadProgressBar');
    const modalProgressInner = document.getElementById('fmProgressBarInner');
    const modalUploadStatus = document.getElementById('fmUploadStatus');

    if (modalDropzone && modalFileInput) {
      ['dragenter', 'dragover'].forEach(eName => {
        modalDropzone.addEventListener(eName, (e) => {
          e.preventDefault();
          modalDropzone.style.borderColor = 'var(--accent)';
          modalDropzone.style.background = 'rgba(0, 80, 231, 0.15)';
        });
      });
      ['dragleave', 'drop'].forEach(eName => {
        modalDropzone.addEventListener(eName, (e) => {
          e.preventDefault();
          modalDropzone.style.borderColor = 'rgba(96, 165, 250, 0.35)';
          modalDropzone.style.background = 'rgba(0,0,0,0.25)';
        });
      });

      modalDropzone.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        if (files.length > 0) uploadModalFiles(files);
      });

      modalFileInput.addEventListener('change', () => {
        if (modalFileInput.files.length > 0) uploadModalFiles(modalFileInput.files);
      });
    }

    function uploadModalFiles(files) {
      const formData = new FormData();
      for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
      }

      const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      modalProgressBar.style.display = 'block';
      modalProgressInner.style.width = '30%';
      modalUploadStatus.innerText = 'Uploading ' + files.length + ' file(s)...';

      const xhr = new XMLHttpRequest();
      xhr.open('POST', '{{ route("admin.filemanager.upload") }}', true);
      xhr.setRequestHeader('X-CSRF-TOKEN', token);
      xhr.setRequestHeader('Accept', 'application/json');

      xhr.upload.onprogress = function(e) {
        if (e.lengthComputable) {
          const pct = Math.round((e.loaded / e.total) * 100);
          modalProgressInner.style.width = pct + '%';
          modalUploadStatus.innerText = 'Uploading: ' + pct + '%';
        }
      };

      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          modalProgressInner.style.width = '100%';
          modalUploadStatus.innerText = 'Upload successful!';
          setTimeout(() => {
            modalProgressBar.style.display = 'none';
            switchFmTab('browse');
            loadFmFiles();
          }, 600);
        } else {
          modalUploadStatus.innerText = 'Upload failed. Ensure file size is < 25MB.';
          modalProgressInner.style.background = 'var(--danger)';
        }
      };

      xhr.send(formData);
    }

    // Auto-bind any button with class .btn-filemanager
    document.addEventListener('click', function(e) {
      const btn = e.target.closest('.btn-filemanager, [data-toggle="filemanager"]');
      if (btn) {
        e.preventDefault();
        const targetInput = btn.getAttribute('data-target');
        const targetPreview = btn.getAttribute('data-preview');
        const fileType = btn.getAttribute('data-type') || 'image';

        window.openFileManager({
          targetInput: targetInput,
          targetPreview: targetPreview,
          type: fileType
        });
      }
    });
  })();

  // ========================================================
  // TEXT EDITOR ENGINE (LIGHT & ADVANCED VERSIONS)
  // ========================================================
  document.addEventListener('DOMContentLoaded', function() {
    if (typeof Quill === 'undefined') return;

    // 1. Initialize Light Editors (.editor-light)
    document.querySelectorAll('textarea.editor-light').forEach(function(textarea) {
      if (textarea.dataset.quillInitialized) return;
      textarea.dataset.quillInitialized = 'true';

      const container = document.createElement('div');
      container.className = 'editor-light-container';
      textarea.parentNode.insertBefore(container, textarea);
      textarea.style.display = 'none';

      const quillEl = document.createElement('div');
      container.appendChild(quillEl);

      const quill = new Quill(quillEl, {
        theme: 'snow',
        placeholder: textarea.getAttribute('placeholder') || 'Type content...',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link', 'clean']
          ]
        }
      });

      // Prefill
      if (textarea.value) {
        quill.clipboard.dangerouslyPasteHTML(textarea.value);
      }

      // Sync on change
      quill.on('text-change', function() {
        textarea.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
      });

      // Sync before form submit
      const form = textarea.closest('form');
      if (form) {
        form.addEventListener('submit', function() {
          textarea.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
        });
      }
    });

    // 2. Initialize Advanced Editors (.editor-advanced)
    document.querySelectorAll('textarea.editor-advanced').forEach(function(textarea) {
      if (textarea.dataset.quillInitialized) return;
      textarea.dataset.quillInitialized = 'true';

      const container = document.createElement('div');
      container.className = 'editor-advanced-container';
      textarea.parentNode.insertBefore(container, textarea);
      textarea.style.display = 'none';

      const quillEl = document.createElement('div');
      container.appendChild(quillEl);

      // Raw HTML mode textarea
      const htmlSource = document.createElement('textarea');
      htmlSource.className = 'editor-html-source';
      container.appendChild(htmlSource);

      const toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        [{ 'align': [] }],
        ['link', 'image', 'video'],
        ['clean']
      ];

      const quill = new Quill(quillEl, {
        theme: 'snow',
        placeholder: textarea.getAttribute('placeholder') || 'Write article or longform content...',
        modules: {
          toolbar: toolbarOptions
        }
      });

      // Hook Quill Image button to File Manager Popup!
      const toolbar = quill.getModule('toolbar');
      toolbar.addHandler('image', function() {
        window.openFileManager({
          type: 'image',
          onSelect: function(file) {
            const range = quill.getSelection(true) || { index: quill.getLength() };
            quill.insertEmbed(range.index, 'image', file.full_url || file.url);
            quill.setSelection(range.index + 1);
          }
        });
      });

      // Add HTML Source Toggle Button to Toolbar
      const tbElement = container.querySelector('.ql-toolbar');
      if (tbElement) {
        const customGroup = document.createElement('span');
        customGroup.className = 'ql-formats';
        customGroup.innerHTML = `
          <button type="button" class="btn-html-toggle" title="Toggle HTML Source" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 24px; color: var(--accent); background: none; border: none; cursor: pointer; font-size: 0.72rem; font-weight: 700; font-family: monospace;">
            &lt;/&gt;
          </button>
        `;
        tbElement.appendChild(customGroup);

        let isHtmlMode = false;
        const htmlBtn = customGroup.querySelector('.btn-html-toggle');
        htmlBtn.addEventListener('click', function(e) {
          e.preventDefault();
          isHtmlMode = !isHtmlMode;
          if (isHtmlMode) {
            htmlSource.value = quill.root.innerHTML;
            quillEl.style.display = 'none';
            htmlSource.style.display = 'block';
            htmlBtn.style.color = 'var(--success)';
            htmlBtn.style.background = 'rgba(16, 185, 129, 0.2)';
            htmlBtn.style.borderRadius = '4px';
          } else {
            quill.clipboard.dangerouslyPasteHTML(htmlSource.value);
            htmlSource.style.display = 'none';
            quillEl.style.display = 'block';
            htmlBtn.style.color = 'var(--accent)';
            htmlBtn.style.background = 'none';
          }
        });

        htmlSource.addEventListener('input', function() {
          textarea.value = htmlSource.value;
        });
      }

      // Prefill
      if (textarea.value) {
        quill.clipboard.dangerouslyPasteHTML(textarea.value);
      }

      // Sync on text change
      quill.on('text-change', function() {
        textarea.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
      });

      // Sync on form submit
      const form = textarea.closest('form');
      if (form) {
        form.addEventListener('submit', function() {
          if (htmlSource.style.display === 'block') {
            textarea.value = htmlSource.value;
          } else {
            textarea.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
          }
        });
      }
    });
  });
  </script>

  <!-- Theme Switcher Engine (Light / Dark Admin Theme) -->
  <script>
  (function() {
    function initThemeSwitcher() {
      const btn = document.getElementById('themeToggleBtn');
      const moonIcon = document.getElementById('themeMoonIcon');
      const sunIcon = document.getElementById('themeSunIcon');
      const toggleText = document.getElementById('themeToggleText');

      function syncThemeUI() {
        const isLight = document.documentElement.classList.contains('light-mode');
        if (moonIcon && sunIcon && toggleText) {
          if (isLight) {
            moonIcon.style.display = 'none';
            sunIcon.style.display = 'inline-block';
            toggleText.innerText = 'Dark Mode';
          } else {
            moonIcon.style.display = 'inline-block';
            sunIcon.style.display = 'none';
            toggleText.innerText = 'Light Mode';
          }
        }
      }

      if (btn) {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          const isLight = document.documentElement.classList.toggle('light-mode');
          try {
            localStorage.setItem('bluebase_admin_theme', isLight ? 'light' : 'dark');
          } catch (err) {}
          syncThemeUI();
        });
      }

      syncThemeUI();
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initThemeSwitcher);
    } else {
      initThemeSwitcher();
    }
  })();
  </script>

</body>
</html>
