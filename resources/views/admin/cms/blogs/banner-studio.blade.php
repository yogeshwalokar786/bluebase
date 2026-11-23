@extends('admin.layout')

@section('title', 'Banner Generator Studio')
@section('page_title', 'Automatic Blog & Social Banner Generator')

@section('content')
<style>
  .studio-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 24px;
    align-items: start;
  }
  @media (max-width: 1024px) {
    .studio-grid {
      grid-template-columns: 1fr;
    }
  }

  .canvas-wrapper {
    background: #050814;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .canvas-container {
    width: 100%;
    aspect-ratio: 16 / 9;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    background: #070B19;
    border: 1px solid rgba(255, 255, 255, 0.05);
  }

  #studioCanvas {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: contain;
  }

  .studio-panel {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .texture-pill-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
  }

  .texture-btn {
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 10px 12px;
    color: var(--text-muted);
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    text-align: left;
    transition: all 0.2s ease;
  }
  .texture-btn:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #ffffff;
    border-color: var(--accent);
  }
  .texture-btn.active {
    background: rgba(0, 80, 231, 0.2);
    border-color: var(--accent);
    color: #93c5fd;
    font-weight: 700;
  }

  .accent-picker {
    display: flex;
    gap: 10px;
  }
  .accent-circle {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid transparent;
    transition: transform 0.15s, border-color 0.15s;
  }
  .accent-circle:hover {
    transform: scale(1.15);
  }
  .accent-circle.active {
    border-color: #ffffff;
    transform: scale(1.15);
  }
</style>

<div class="card" style="margin-bottom: 20px;">
  <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
    <div>
      <h2 style="font-size: 1.2rem; font-weight: 800; color: #ffffff; margin: 0 0 4px 0;">
        Automated Blog Banner Studio
      </h2>
      <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0;">
        Generate textured, branded 1280&times;720 HD banners with crisp typography for any blog post or social share card.
      </p>
    </div>
    <div style="display: flex; align-items: center; gap: 10px;">
      <label style="font-size: 0.82rem; color: var(--text-muted);">Load Existing Article:</label>
      <select id="articleSelector" class="form-control" style="width: 280px; font-size: 0.82rem;" onchange="loadArticleData(this)">
        <option value="">-- Or enter custom title below --</option>
        @foreach($blogs as $b)
          <option value="{{ $b->id }}" data-title="{{ $b->title }}" data-category="{{ $b->category }}" data-slug="{{ $b->slug }}" data-image="{{ $b->image }}">
            {{ Str::limit($b->title, 40) }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
</div>

<div class="studio-grid">
  <!-- Left Column: Canvas Preview & Direct Actions -->
  <div class="canvas-wrapper">
    <div class="canvas-container">
      <canvas id="studioCanvas" width="1280" height="720"></canvas>
    </div>

    <div style="display: flex; align-items: center; justify-content: space-between; padding: 4px 4px 0 4px;">
      <span style="font-size: 0.78rem; color: var(--text-dim);">
        Standard 1280 &times; 720 HD (16:9) &bull; Clean typography &bull; High resolution export
      </span>
      <div style="display: flex; gap: 10px;">
        <button type="button" class="btn btn-secondary" onclick="downloadBannerImage()">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
          Download JPG
        </button>
        <button type="button" class="btn btn-primary" id="btnSaveToArticle" onclick="saveAndApplyBanner()" style="font-weight: 700;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="20 6 9 17 4 12"/></svg>
          Save &amp; Apply to Blog
        </button>
      </div>
    </div>
    <div id="studioStatusMsg" style="display: none; padding: 8px 12px; border-radius: 6px; font-size: 0.82rem; margin-top: 8px;"></div>
  </div>

  <!-- Right Column: Interactive Generator Controls -->
  <div class="studio-panel">
    <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--accent); margin: 0; border-bottom: 1px solid var(--border-color); padding-bottom: 8px;">
      Banner Specifications
    </h3>

    <!-- Title Input -->
    <div class="form-group" style="margin-bottom: 0;">
      <label class="form-label">Article Headline *</label>
      <textarea id="bannerTitle" rows="3" class="form-control" placeholder="Enter article headline..." oninput="renderCanvas()">Why Cloud Modernization Drives 40% Operational Cost Reductions</textarea>
    </div>

    <!-- Category Kicker -->
    <div class="form-group" style="margin-bottom: 0;">
      <label class="form-label">Category / Subtitle Pill</label>
      <input type="text" id="bannerCategory" class="form-control" value="SaaS &amp; Cloud Engineering" placeholder="e.g. Cloud Architecture" oninput="renderCanvas()">
    </div>

    <!-- Texture Style Selector -->
    <div class="form-group" style="margin-bottom: 0;">
      <label class="form-label">Background Texture Preset</label>
      <div class="texture-pill-grid">
        <button type="button" class="texture-btn active" data-texture="cyber_grid" onclick="selectTexture('cyber_grid', this)">
          Cyber Tech Grid
        </button>
        <button type="button" class="texture-btn" data-texture="abstract_circuit" onclick="selectTexture('abstract_circuit', this)">
          Abstract Circuit
        </button>
        <button type="button" class="texture-btn" data-texture="tech_mesh" onclick="selectTexture('tech_mesh', this)">
          Geometric Mesh
        </button>
        <button type="button" class="texture-btn" data-texture="executive_carbon" onclick="selectTexture('executive_carbon', this)">
          Executive Matrix
        </button>
        <button type="button" class="texture-btn" data-texture="glass_aura" onclick="selectTexture('glass_aura', this)">
          Obsidian Aura
        </button>
        <button type="button" class="texture-btn" data-texture="minimal_frame" onclick="selectTexture('minimal_frame', this)">
          Minimalist Luxury
        </button>
      </div>
    </div>

    <!-- Accent Color Glow -->
    <div class="form-group" style="margin-bottom: 0;">
      <label class="form-label">Ambient Accent Lighting</label>
      <div class="accent-picker">
        <div class="accent-circle active" style="background: #0050e7;" data-color="#0050e7" data-light="#3b82f6" onclick="selectAccent(this)" title="Electric Blue"></div>
        <div class="accent-circle" style="background: #00e5ff;" data-color="#00e5ff" data-light="#67e8f9" onclick="selectAccent(this)" title="Neon Cyan"></div>
        <div class="accent-circle" style="background: #10b981;" data-color="#10b981" data-light="#34d399" onclick="selectAccent(this)" title="Emerald"></div>
        <div class="accent-circle" style="background: #8b5cf6;" data-color="#8b5cf6" data-light="#a78bfa" onclick="selectAccent(this)" title="Royal Violet"></div>
        <div class="accent-circle" style="background: #f59e0b;" data-color="#f59e0b" data-light="#fbbf24" onclick="selectAccent(this)" title="Warm Amber"></div>
      </div>
    </div>

    <!-- Alignment & Font Size -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
      <div class="form-group" style="margin-bottom: 0;">
        <label class="form-label">Text Alignment</label>
        <select id="bannerAlign" class="form-control" onchange="renderCanvas()">
          <option value="left" selected>Left Aligned</option>
          <option value="center">Centered</option>
        </select>
      </div>

      <div class="form-group" style="margin-bottom: 0;">
        <label class="form-label">Font Scale</label>
        <select id="bannerFontSize" class="form-control" onchange="renderCanvas()">
          <option value="auto" selected>Auto Scale</option>
          <option value="52">Large (52px)</option>
          <option value="44">Medium (44px)</option>
          <option value="36">Compact (36px)</option>
        </select>
      </div>
    </div>

    <!-- Watermark Toggle -->
    <div style="display: flex; flex-direction: column; gap: 8px;">
      <label style="display: flex; align-items: center; gap: 6px; font-size: 0.82rem; color: var(--text-muted); cursor: pointer;">
        <input type="checkbox" id="showWatermark" checked onchange="renderCanvas()" style="accent-color: #3b82f6;">
        Include Bluebase Corporate Watermark &amp; URL
      </label>
      <label style="display: flex; align-items: center; gap: 6px; font-size: 0.82rem; color: var(--text-muted); cursor: pointer;">
        <input type="checkbox" id="showCornerFrames" checked onchange="renderCanvas()" style="accent-color: #3b82f6;">
        Render Corner Architectural Framing Accents
      </label>
    </div>
  </div>
</div>

<script>
  let currentTexture = 'cyber_grid';
  let currentAccent = { primary: '#0050e7', light: '#3b82f6' };
  let selectedBlogId = null;
  let selectedBlogSlug = null;

  function selectTexture(textureName, btn) {
    currentTexture = textureName;
    document.querySelectorAll('.texture-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    renderCanvas();
  }

  function selectAccent(circle) {
    document.querySelectorAll('.accent-circle').forEach(c => c.classList.remove('active'));
    circle.classList.add('active');
    currentAccent = {
      primary: circle.getAttribute('data-color'),
      light: circle.getAttribute('data-light')
    };
    renderCanvas();
  }

  function loadArticleData(select) {
    const opt = select.options[select.selectedIndex];
    if (!opt || !opt.value) {
      selectedBlogId = null;
      selectedBlogSlug = null;
      return;
    }
    selectedBlogId = opt.value;
    selectedBlogSlug = opt.getAttribute('data-slug');
    document.getElementById('bannerTitle').value = opt.getAttribute('data-title') || '';
    document.getElementById('bannerCategory').value = opt.getAttribute('data-category') || 'Enterprise Engineering';
    renderCanvas();
  }

  function renderCanvas() {
    const canvas = document.getElementById('studioCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const width = 1280;
    const height = 720;

    // 1. Clear & Render Background Gradient
    ctx.clearRect(0, 0, width, height);
    const bgGrad = ctx.createLinearGradient(0, 0, width, height);
    bgGrad.addColorStop(0, '#070B19');
    bgGrad.addColorStop(0.5, '#0B1229');
    bgGrad.addColorStop(1, '#050814');
    ctx.fillStyle = bgGrad;
    ctx.fillRect(0, 0, width, height);

    // 2. Render Selected Texture Pattern
    if (currentTexture === 'cyber_grid') {
      drawCyberGrid(ctx, width, height);
    } else if (currentTexture === 'abstract_circuit') {
      drawAbstractCircuit(ctx, width, height);
    } else if (currentTexture === 'tech_mesh') {
      drawTechMesh(ctx, width, height);
    } else if (currentTexture === 'executive_carbon') {
      drawExecutiveCarbon(ctx, width, height);
    } else if (currentTexture === 'glass_aura') {
      drawGlassAura(ctx, width, height);
    } else {
      drawMinimalFrame(ctx, width, height);
    }

    // 3. Ambient Corner Glow
    drawAmbientGlow(ctx, width, height);

    // 4. Top Accent Line
    const topBarGrad = ctx.createLinearGradient(0, 0, width, 0);
    topBarGrad.addColorStop(0, currentAccent.primary);
    topBarGrad.addColorStop(0.7, currentAccent.light);
    topBarGrad.addColorStop(1, 'transparent');
    ctx.fillStyle = topBarGrad;
    ctx.fillRect(0, 0, width, 5);

    // 5. Corner Architectural Frames (if enabled)
    if (document.getElementById('showCornerFrames').checked) {
      drawCornerAccents(ctx, width, height);
    }

    // 6. Text Elements
    const title = document.getElementById('bannerTitle').value.trim() || 'Your Technical Article Headline';
    const category = (document.getElementById('bannerCategory').value.trim() || 'ENTERPRISE ARCHITECTURE').toUpperCase();
    const align = document.getElementById('bannerAlign').value;

    const startX = (align === 'center') ? width / 2 : 110;

    // Render Category Pill
    ctx.textAlign = (align === 'center') ? 'center' : 'left';
    ctx.textBaseline = 'middle';

    const kickerText = 'BLUEBASE TECHNOLOGIES • ' + category;
    ctx.font = '700 13px Inter, -apple-system, sans-serif';
    const kickerWidth = ctx.measureText(kickerText).width + 36;
    const pillY = 160;

    // Pill background & border
    ctx.save();
    if (align === 'center') {
      ctx.fillStyle = 'rgba(0, 80, 231, 0.22)';
      ctx.strokeStyle = currentAccent.light;
      ctx.lineWidth = 1.2;
      roundRect(ctx, (width / 2) - (kickerWidth / 2), pillY - 16, kickerWidth, 32, 6, true, true);
    } else {
      ctx.fillStyle = 'rgba(0, 80, 231, 0.22)';
      ctx.strokeStyle = currentAccent.light;
      ctx.lineWidth = 1.2;
      roundRect(ctx, 110, pillY - 16, kickerWidth, 32, 6, true, true);
    }
    ctx.fillStyle = '#FFFFFF';
    ctx.fillText(kickerText, (align === 'center') ? width / 2 : 128, pillY);
    ctx.restore();

    // 7. Render Headline (Dynamic wrap & auto font size)
    let fontSize = 44;
    const fontSetting = document.getElementById('bannerFontSize').value;
    if (fontSetting === 'auto') {
      if (title.length > 70) fontSize = 36;
      else if (title.length > 45) fontSize = 40;
      else fontSize = 48;
    } else {
      fontSize = parseInt(fontSetting);
    }

    ctx.font = `800 ${fontSize}px Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`;
    ctx.fillStyle = '#FFFFFF';
    ctx.textAlign = (align === 'center') ? 'center' : 'left';

    const maxLineWidth = 1060;
    const lines = getWrappedLines(ctx, title, maxLineWidth);
    const lineHeight = fontSize * 1.35;
    const titleStartY = pillY + 80;

    lines.forEach((line, index) => {
      const y = titleStartY + (index * lineHeight);
      // Subtle glow/shadow
      ctx.shadowColor = 'rgba(0, 0, 0, 0.8)';
      ctx.shadowBlur = 12;
      ctx.shadowOffsetX = 0;
      ctx.shadowOffsetY = 4;
      ctx.fillText(line, startX, y);
      ctx.shadowColor = 'transparent';
    });

    // 8. Footer Watermark (if enabled)
    if (document.getElementById('showWatermark').checked) {
      ctx.save();
      const footerY = height - 65;
      ctx.font = '500 13px Inter, -apple-system, sans-serif';
      ctx.fillStyle = '#94A3B8';
      ctx.textAlign = (align === 'center') ? 'center' : 'left';
      ctx.fillText('bluebasetechnologies.com  •  Cloud Architecture, Software Modernization & Autonomous AI', startX, footerY);
      ctx.restore();
    }
  }

  /* Texture Generators */
  function drawCyberGrid(ctx, width, height) {
    ctx.strokeStyle = 'rgba(255, 255, 255, 0.04)';
    ctx.lineWidth = 1;
    const spacing = 50;
    for (let x = 0; x <= width; x += spacing) {
      ctx.beginPath();
      ctx.moveTo(x, 0);
      ctx.lineTo(x, height);
      ctx.stroke();
    }
    for (let y = 0; y <= height; y += spacing) {
      ctx.beginPath();
      ctx.moveTo(0, y);
      ctx.lineTo(width, y);
      ctx.stroke();
    }
    // Subtle node dots
    ctx.fillStyle = 'rgba(96, 165, 250, 0.25)';
    for (let x = 100; x < width - 100; x += spacing * 2) {
      for (let y = 100; y < height - 100; y += spacing * 2) {
        ctx.beginPath();
        ctx.arc(x, y, 2.5, 0, Math.PI * 2);
        ctx.fill();
      }
    }
  }

  function drawAbstractCircuit(ctx, width, height) {
    drawCyberGrid(ctx, width, height);
    ctx.strokeStyle = 'rgba(0, 229, 255, 0.15)';
    ctx.lineWidth = 1.5;
    const paths = [
      [[800, 80], [1000, 80], [1080, 160], [1200, 160]],
      [[950, 240], [1050, 240], [1120, 310], [1280, 310]],
      [[750, 600], [880, 600], [940, 540], [1150, 540]]
    ];
    paths.forEach(p => {
      ctx.beginPath();
      ctx.moveTo(p[0][0], p[0][1]);
      for (let i = 1; i < p.length; i++) ctx.lineTo(p[i][0], p[i][1]);
      ctx.stroke();
    });
  }

  function drawTechMesh(ctx, width, height) {
    ctx.strokeStyle = 'rgba(139, 92, 246, 0.08)';
    ctx.lineWidth = 1;
    const step = 80;
    for (let x = 0; x < width; x += step) {
      for (let y = 0; y < height; y += step) {
        ctx.strokeRect(x, y, step, step);
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.lineTo(x + step, y + step);
        ctx.stroke();
      }
    }
  }

  function drawExecutiveCarbon(ctx, width, height) {
    ctx.fillStyle = 'rgba(255, 255, 255, 0.015)';
    for (let y = 0; y < height; y += 6) {
      ctx.fillRect(0, y, width, 2);
    }
  }

  function drawGlassAura(ctx, width, height) {
    const aura = ctx.createRadialGradient(width * 0.7, height * 0.35, 20, width * 0.7, height * 0.35, 450);
    aura.addColorStop(0, 'rgba(0, 80, 231, 0.25)');
    aura.addColorStop(0.6, 'rgba(0, 229, 255, 0.08)');
    aura.addColorStop(1, 'transparent');
    ctx.fillStyle = aura;
    ctx.fillRect(0, 0, width, height);
  }

  function drawMinimalFrame(ctx, width, height) {
    ctx.strokeStyle = 'rgba(255, 255, 255, 0.08)';
    ctx.lineWidth = 1;
    ctx.strokeRect(40, 40, width - 80, height - 80);
  }

  function drawAmbientGlow(ctx, width, height) {
    const radial = ctx.createRadialGradient(width - 100, 100, 30, width - 100, 100, 480);
    radial.addColorStop(0, currentAccent.primary + '33');
    radial.addColorStop(0.7, currentAccent.primary + '0A');
    radial.addColorStop(1, 'transparent');
    ctx.fillStyle = radial;
    ctx.fillRect(0, 0, width, height);

    const corner2 = ctx.createRadialGradient(100, height - 80, 30, 100, height - 80, 350);
    corner2.addColorStop(0, currentAccent.light + '22');
    corner2.addColorStop(1, 'transparent');
    ctx.fillStyle = corner2;
    ctx.fillRect(0, 0, width, height);
  }

  function drawCornerAccents(ctx, width, height) {
    ctx.strokeStyle = currentAccent.light + '66';
    ctx.lineWidth = 2;
    const len = 28;
    const pad = 24;

    // Top-left
    ctx.beginPath();
    ctx.moveTo(pad, pad + len);
    ctx.lineTo(pad, pad);
    ctx.lineTo(pad + len, pad);
    ctx.stroke();

    // Top-right
    ctx.beginPath();
    ctx.moveTo(width - pad - len, pad);
    ctx.lineTo(width - pad, pad);
    ctx.lineTo(width - pad, pad + len);
    ctx.stroke();

    // Bottom-left
    ctx.beginPath();
    ctx.moveTo(pad, height - pad - len);
    ctx.lineTo(pad, height - pad);
    ctx.lineTo(pad + len, height - pad);
    ctx.stroke();

    // Bottom-right
    ctx.beginPath();
    ctx.moveTo(width - pad - len, height - pad);
    ctx.lineTo(width - pad, height - pad);
    ctx.lineTo(width - pad, height - pad - len);
    ctx.stroke();
  }

  function roundRect(ctx, x, y, width, height, radius, fill, stroke) {
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + width - radius, y);
    ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
    ctx.lineTo(x + width, y + height - radius);
    ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
    ctx.lineTo(x + radius, y + height);
    ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.closePath();
    if (fill) ctx.fill();
    if (stroke) ctx.stroke();
  }

  function getWrappedLines(ctx, text, maxWidth) {
    const words = text.split(' ');
    const lines = [];
    let currentLine = words[0];

    for (let i = 1; i < words.length; i++) {
      const word = words[i];
      const width = ctx.measureText(currentLine + ' ' + word).width;
      if (width < maxWidth) {
        currentLine += ' ' + word;
      } else {
        lines.push(currentLine);
        currentLine = word;
      }
    }
    lines.push(currentLine);
    return lines.slice(0, 4);
  }

  function downloadBannerImage() {
    const canvas = document.getElementById('studioCanvas');
    const slug = selectedBlogSlug || 'blog-banner-' + Date.now();
    const link = document.createElement('a');
    link.download = slug + '.jpg';
    link.href = canvas.toDataURL('image/jpeg', 0.92);
    link.click();
  }

  function saveAndApplyBanner() {
    const canvas = document.getElementById('studioCanvas');
    const title = document.getElementById('bannerTitle').value.trim();
    const category = document.getElementById('bannerCategory').value.trim();
    const statusBox = document.getElementById('studioStatusMsg');
    const btn = document.getElementById('btnSaveToArticle');

    const dataUrl = canvas.toDataURL('image/jpeg', 0.92);

    btn.disabled = true;
    btn.innerHTML = 'Saving Banner...';

    fetch("{{ route('admin.cms.blogs.generate_banner') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        title: title,
        category: category,
        slug: selectedBlogSlug || '',
        image_data: dataUrl
      })
    })
    .then(res => res.json())
    .then(data => {
      btn.disabled = false;
      btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="20 6 9 17 4 12"/></svg> Save &amp; Apply to Blog';

      if (data.success) {
        statusBox.style.display = 'block';
        statusBox.style.background = 'rgba(16, 185, 129, 0.15)';
        statusBox.style.border = '1px solid rgba(16, 185, 129, 0.3)';
        statusBox.style.color = '#34d399';
        statusBox.innerHTML = `<strong>Banner Saved!</strong> File created at: <code>${data.image_url}</code>`;

        // If an existing article was selected, redirect to its edit page
        if (selectedBlogId) {
          setTimeout(() => {
            window.location.href = `{{ url('admin/cms/blogs') }}/${selectedBlogId}/edit`;
          }, 1500);
        }
      } else {
        statusBox.style.display = 'block';
        statusBox.style.background = 'rgba(239, 68, 68, 0.15)';
        statusBox.style.border = '1px solid rgba(239, 68, 68, 0.3)';
        statusBox.style.color = '#f87171';
        statusBox.innerText = data.message || 'Failed to save banner.';
      }
    })
    .catch(err => {
      btn.disabled = false;
      btn.innerHTML = 'Save &amp; Apply to Blog';
      alert('Error saving banner: ' + err.message);
    });
  }

  // Initial render on load
  document.addEventListener('DOMContentLoaded', function() {
    renderCanvas();
  });
</script>
@endsection
