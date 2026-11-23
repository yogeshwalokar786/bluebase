@extends('admin.layout')

@section('title', $isEdit ? 'Edit Article' : 'Create Article')
@section('page_title', $isEdit ? 'Edit Article: ' . $blog->title : 'Create New Technical Article or Case Study')

@section('content')
  <div style="margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between;">
    <a href="{{ route('admin.cms.blogs.index') }}" class="btn btn-secondary btn-sm">&larr; Back to Articles</a>
    @if($isEdit && $blog->slug)
      <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 6px;">
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        View Live Article
      </a>
    @endif
  </div>

  <form action="{{ $isEdit ? route('admin.cms.blogs.update', $blog->id) : route('admin.cms.blogs.store') }}" method="POST" id="blogForm">
    @csrf

    <div style="display: grid; grid-template-columns: 2.1fr 1fr; gap: 24px; align-items: start;">
      
      <!-- LEFT COLUMN: Main Content & Editors -->
      <div style="display: flex; flex-direction: column; gap: 24px;">
        
        <!-- Primary Article Details Card -->
        <div class="card">
          <div class="card-header" style="margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
            <div class="card-title" style="font-size: 1.05rem;">
              <svg style="width: 18px; height: 18px; color: var(--primary);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
              Core Article Details
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Article Title *</label>
            <input type="text" name="title" id="articleTitle" value="{{ old('title', $blog->title) }}" class="form-control" required
              placeholder="e.g. Next-Gen Multi-Tenant Database Architecture with Sub-10ms Global Latency">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label">URL Slug</label>
              <input type="text" name="slug" id="articleSlug" value="{{ old('slug', $blog->slug) }}" class="form-control"
                placeholder="auto-generated-from-title">
              <div class="form-hint">Permalinks will resolve at <code>/blog/{slug}</code></div>
            </div>

            <!-- Dynamic Category Selection & Creation -->
            <div class="form-group">
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                <label class="form-label" style="margin-bottom: 0;">Category *</label>
                <button type="button" class="btn btn-secondary btn-sm" id="btnToggleNewCategory" style="padding: 2px 8px; font-size: 0.72rem; height: 24px;">
                  + New Category
                </button>
              </div>
              
              <select name="category_id" id="categorySelect" class="form-select">
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" {{ (old('category_id', $blog->category_id) == $cat->id || old('category', $blog->category) == $cat->name) ? 'selected' : '' }}>
                    {{ $cat->name }}
                  </option>
                @endforeach
              </select>

              <!-- Inline Quick Category Creation Drawer -->
              <div id="newCategoryDrawer" style="display: none; margin-top: 10px; padding: 12px; background: rgba(0, 80, 231, 0.05); border: 1px dashed var(--primary); border-radius: 8px;">
                <div style="font-size: 0.8rem; font-weight: 700; color: var(--primary); margin-bottom: 8px;">Create &amp; Select New Category</div>
                <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                  <input type="text" id="quickCategoryName" placeholder="e.g. Edge Computing &amp; WASM" class="form-control" style="font-size: 0.85rem; padding: 6px 10px;">
                  <button type="button" id="btnSaveQuickCategory" class="btn btn-primary btn-sm" style="white-space: nowrap;">Create</button>
                </div>
                <input type="text" id="quickCategoryDesc" placeholder="Optional short description for category archive..." class="form-control" style="font-size: 0.78rem; padding: 5px 10px;">
                <div id="quickCategoryMsg" style="font-size: 0.75rem; margin-top: 6px; display: none;"></div>
              </div>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1.2fr 1fr 0.8fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label">Author Name *</label>
              <input type="text" name="author" value="{{ old('author', $blog->author ?? 'Bluebase Engineering Team') }}" class="form-control" required>
            </div>

            <div class="form-group">
              <label class="form-label">Author Role / Title</label>
              <input type="text" name="author_role" value="{{ old('author_role', $blog->author_role ?? 'Principal Systems Architect') }}" class="form-control" placeholder="e.g. Lead Cloud Architect">
            </div>

            <div class="form-group">
              <label class="form-label">Read Time</label>
              <input type="text" name="read_time" value="{{ old('read_time', $blog->read_time ?? '5 min read') }}" class="form-control">
            </div>
          </div>

          <!-- Featured Image Picker with File Manager Popup -->
          <div class="form-group">
            <label class="form-label">Featured Hero &amp; Thumbnail Image</label>
            <div class="media-picker-group">
              <div class="media-picker-input-wrap">
                <input type="text" name="image" id="blog_image"
                  value="{{ old('image', $blog->image ?? 'images/stories/screens-clicks.jpg') }}" class="form-control"
                  placeholder="images/stories/screens-clicks.jpg or uploads/...">
                <button type="button" class="btn btn-primary" onclick="openBlogBannerModal()" style="background: linear-gradient(135deg, #0050e7, #1d68ff); font-weight: 700; display: inline-flex; align-items: center; gap: 6px; white-space: nowrap;">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  Auto-Generate Banner
                </button>
                <button type="button" class="btn btn-secondary btn-filemanager" data-target="#blog_image"
                  data-preview="#blog_image_preview" data-type="image">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;">
                    <rect x="3" y="3" width="18" height="18" rx="2" />
                    <circle cx="8.5" cy="8.5" r="1.5" />
                    <polyline points="21 15 16 10 5 21" />
                  </svg>
                  Browse Media
                </button>
              </div>
              <div class="media-preview-container" id="blog_image_preview">
                @if($blog->image)
                  <img src="{{ asset($blog->image) }}" alt="Preview" onerror="this.style.display='none';">
                @else
                  <div class="media-preview-placeholder">No image selected</div>
                @endif
              </div>
            </div>
            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 8px; flex-wrap: wrap; gap: 8px;">
              <div class="form-hint" style="margin-top: 0;">Click &ldquo;Auto-Generate Banner&rdquo; to create a branded textured banner or &ldquo;Browse Media&rdquo; for existing uploads.</div>
              <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.78rem; color: var(--text-muted); cursor: pointer;">
                <input type="checkbox" name="auto_generate_banner" value="1" style="accent-color: #3b82f6;">
                Auto-generate banner on save if empty
              </label>
            </div>
          </div>

          <!-- Excerpt Editor -->
          <div class="form-group">
            <label class="form-label">Executive Excerpt (Cards &amp; Search Snippets) *</label>
            <textarea name="excerpt" id="articleExcerpt" class="form-control editor-light" rows="3" required
              placeholder="Concise technical summary displayed on category archive grids and social cards...">{{ old('excerpt', $blog->excerpt) }}</textarea>
            <div class="form-hint">Rich light text editor with bold, italic, code spans, lists, and links.</div>
          </div>

          <!-- Full Advanced Body Editor -->
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Article Body Content (Full Advanced Editor) *</label>
            <textarea name="content" class="form-control editor-advanced" rows="14" required
              placeholder="Write the full case study or technical article here...">{{ old('content', $blog->content) }}</textarea>
            <div class="form-hint">Full advanced editor with headers, code blocks, tables, embedded diagrams, HTML source mode, and media library insertions.</div>
          </div>
        </div>

        <!-- SEO STRUCTURE & SEARCH ENGINE OPTIMIZATION PANEL -->
        <div class="card" style="border-top: 3px solid #0050E7;">
          <div class="card-header" style="margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between;">
            <div class="card-title" style="font-size: 1.05rem; display: flex; align-items: center; gap: 8px;">
              <svg style="width: 20px; height: 20px; color: #0050E7;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
              SEO &amp; Search Engine Structure
            </div>
            <span class="badge" style="background: rgba(0, 80, 231, 0.15); color: #0050E7; font-weight: 700; font-size: 0.72rem; padding: 4px 10px;">
              Google SERP &amp; AEO Ready
            </span>
          </div>

          <!-- Live Google Search Engine Result Preview (SERP Snippet) -->
          <div style="margin-bottom: 24px; padding: 18px; background: rgba(0, 0, 0, 0.25); border: 1px solid var(--border-color); border-radius: 12px;">
            <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em; margin-bottom: 12px;">
              Google Search Result Live Preview
            </div>
            <div style="font-family: Arial, sans-serif; max-width: 650px;">
              <div style="display: flex; align-items: center; gap: 8px; font-size: 0.78rem; color: #94A3B8; margin-bottom: 4px;">
                <img src="{{ asset('images/favicon.ico') }}" alt="" style="width: 14px; height: 14px; border-radius: 50%;">
                <span>https://bluebasetechnologies.com &rsaquo; blog &rsaquo; <span id="serpSlugPreview">{{ $blog->slug ?: 'article-slug' }}</span></span>
              </div>
              <div id="serpTitlePreview" style="font-size: 1.15rem; color: #60A5FA; font-weight: 500; line-height: 1.35; margin-bottom: 4px; cursor: pointer;">
                {{ $blog->meta_title ?: ($blog->title ?: 'Article Title — Bluebase Tech Blog') }}
              </div>
              <div id="serpDescPreview" style="font-size: 0.85rem; color: #CBD5E1; line-height: 1.5;">
                {{ Str::limit(strip_tags($blog->meta_description ?: ($blog->excerpt ?: 'Concise summary of the article appears here in Google and search engine search results...')), 160) }}
              </div>
            </div>
          </div>

          <!-- Focus Keyword -->
          <div class="form-group">
            <label class="form-label" style="display: flex; align-items: center; justify-content: space-between;">
              <span>Focus Keyphrase / Target Query</span>
              <span style="font-size: 0.75rem; color: var(--text-dim); font-weight: normal;">Primary topic this article targets</span>
            </label>
            <input type="text" name="focus_keyword" id="seoFocusKeyword" value="{{ old('focus_keyword', $blog->focus_keyword) }}" class="form-control"
              placeholder="e.g. multi-tenant postgresql, high-performance next.js">
          </div>

          <!-- Meta Title with Length Progress Counter -->
          <div class="form-group">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
              <label class="form-label" style="margin-bottom: 0;">Meta Title (Title Tag)</label>
              <span id="titleCounter" style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">0 / 60 chars</span>
            </div>
            <input type="text" name="meta_title" id="seoMetaTitle" value="{{ old('meta_title', $blog->meta_title) }}" class="form-control"
              placeholder="Leave blank to use article title automatically">
            <div class="form-hint">Recommended length: 50 to 60 characters for optimal desktop &amp; mobile search visibility.</div>
          </div>

          <!-- Meta Description with Length Progress Counter -->
          <div class="form-group">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
              <label class="form-label" style="margin-bottom: 0;">Meta Description (Snippet Text)</label>
              <span id="descCounter" style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">0 / 160 chars</span>
            </div>
            <textarea name="meta_description" id="seoMetaDescription" class="form-control" rows="3"
              placeholder="Leave blank to use executive excerpt automatically">{{ old('meta_description', $blog->meta_description) }}</textarea>
            <div class="form-hint">Recommended length: 140 to 160 characters. Highlight key engineering findings and architectural outcomes.</div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <!-- Meta Keywords -->
            <div class="form-group">
              <label class="form-label">Meta Keywords / Search Tags</label>
              <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}" class="form-control"
                placeholder="Comma separated: SaaS, PostgreSQL, Edge, Redis">
            </div>

            <!-- Canonical URL -->
            <div class="form-group">
              <label class="form-label">Canonical URL</label>
              <input type="text" name="canonical_url" value="{{ old('canonical_url', $blog->canonical_url) }}" class="form-control"
                placeholder="Defaults to this article permalink">
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <!-- Robots Indexing Directives -->
            <div class="form-group">
              <label class="form-label">Search Engine Robots Directive</label>
              <select name="robots" class="form-select">
                <option value="index, follow" {{ old('robots', $blog->robots ?? 'index, follow') === 'index, follow' ? 'selected' : '' }}>index, follow (Default - Recommended)</option>
                <option value="noindex, follow" {{ old('robots', $blog->robots) === 'noindex, follow' ? 'selected' : '' }}>noindex, follow (Hide from search, follow links)</option>
                <option value="index, nofollow" {{ old('robots', $blog->robots) === 'index, nofollow' ? 'selected' : '' }}>index, nofollow (Index post, ignore outgoing links)</option>
                <option value="noindex, nofollow" {{ old('robots', $blog->robots) === 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow (Completely private)</option>
              </select>
            </div>

            <!-- Schema.org Structured Data Type -->
            <div class="form-group">
              <label class="form-label">Schema.org Structured Data Type</label>
              <select name="schema_type" class="form-select">
                <option value="TechArticle" {{ old('schema_type', $blog->schema_type ?? 'TechArticle') === 'TechArticle' ? 'selected' : '' }}>TechArticle (Technical Blueprints &amp; Architecture)</option>
                <option value="BlogPosting" {{ old('schema_type', $blog->schema_type) === 'BlogPosting' ? 'selected' : '' }}>BlogPosting (Standard Blog Article)</option>
                <option value="Article" {{ old('schema_type', $blog->schema_type) === 'Article' ? 'selected' : '' }}>Article (General In-Depth Article)</option>
              </select>
            </div>
          </div>

          <!-- OpenGraph & Social Media Sharing -->
          <div style="margin-top: 16px; padding-top: 16px; border-top: 1px dashed var(--border-color);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
              <div style="font-size: 0.88rem; font-weight: 700; color: var(--text);">Open Graph &amp; Social Graph (LinkedIn &amp; X / Twitter)</div>
              <button type="button" id="btnSyncSeoToOg" class="btn btn-secondary btn-sm" style="font-size: 0.72rem; padding: 2px 8px;">
                Copy SEO Title &amp; Excerpt to Social
              </button>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
              <div class="form-group">
                <label class="form-label">Social Share Title (og:title)</label>
                <input type="text" name="og_title" id="ogTitleInput" value="{{ old('og_title', $blog->og_title) }}" class="form-control"
                  placeholder="Defaults to Meta Title if empty">
              </div>

              <div class="form-group">
                <label class="form-label">Social Share Image (og:image)</label>
                <div class="media-picker-group">
                  <div class="media-picker-input-wrap">
                    <input type="text" name="og_image" id="og_image_input" value="{{ old('og_image', $blog->og_image) }}" class="form-control"
                      placeholder="images/stories/screens-clicks.jpg">
                    <button type="button" class="btn btn-secondary btn-filemanager" data-target="#og_image_input" data-type="image" style="padding: 6px 10px;">
                      Browse
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label">Social Share Description (og:description)</label>
              <textarea name="og_description" id="ogDescInput" class="form-control" rows="2"
                placeholder="Defaults to Meta Description if empty">{{ old('og_description', $blog->og_description) }}</textarea>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT COLUMN: Publishing Actions, Meta, Status -->
      <div style="display: flex; flex-direction: column; gap: 24px; position: sticky; top: 80px;">
        
        <!-- Publishing Control Card -->
        <div class="card">
          <div class="card-header" style="margin-bottom: 14px; padding-bottom: 10px; border-bottom: 1px solid var(--border-color);">
            <div class="card-title" style="font-size: 0.95rem;">Publishing Actions</div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px;">
            <label class="form-check" style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published ?? true) ? 'checked' : '' }} style="width: 17px; height: 17px; accent-color: var(--primary);">
              <div>
                <div style="font-size: 0.88rem; font-weight: 600; color: var(--text);">Publish Live Immediately</div>
                <div style="font-size: 0.72rem; color: var(--text-muted);">Uncheck to save as draft</div>
              </div>
            </label>

            <label class="form-check" style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
              <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }} style="width: 17px; height: 17px; accent-color: var(--warning);">
              <div>
                <div style="font-size: 0.88rem; font-weight: 600; color: var(--text);">Featured Article</div>
                <div style="font-size: 0.72rem; color: var(--text-muted);">Pin at top of technical articles archive</div>
              </div>
            </label>
          </div>

          @if($isEdit && $blog->published_at)
            <div style="padding: 10px 12px; background: rgba(255, 255, 255, 0.04); border-radius: 8px; font-size: 0.75rem; margin-bottom: 16px; color: var(--text-muted);">
              <div><strong>Published on:</strong> {{ $blog->published_at->format('M d, Y · H:i') }}</div>
              <div><strong>Last Updated:</strong> {{ $blog->updated_at->format('M d, Y · H:i') }}</div>
            </div>
          @endif

          <div style="display: flex; flex-direction: column; gap: 10px;">
            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 10px;">
              {{ $isEdit ? 'Save Article & SEO Changes' : 'Publish Article & SEO Structure' }}
            </button>
            <a href="{{ route('admin.cms.blogs.index') }}" class="btn btn-secondary" style="width: 100%; justify-content: center;">
              Cancel
            </a>
          </div>
        </div>

        <!-- Quick SEO Scorecard / Checklist -->
        <div class="card" style="background: rgba(15, 23, 42, 0.5);">
          <div class="card-header" style="margin-bottom: 12px; padding-bottom: 8px; border-bottom: 1px solid var(--border-color);">
            <div class="card-title" style="font-size: 0.88rem;">SEO Quality Checklist</div>
          </div>
          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.78rem;">
            <div id="checkTitle" style="display: flex; align-items: center; gap: 8px; color: var(--text-muted);">
              <span class="seo-dot" style="width: 8px; height: 8px; border-radius: 50%; background: #64748B;"></span>
              Meta title (50-60 characters)
            </div>
            <div id="checkDesc" style="display: flex; align-items: center; gap: 8px; color: var(--text-muted);">
              <span class="seo-dot" style="width: 8px; height: 8px; border-radius: 50%; background: #64748B;"></span>
              Meta description (140-160 chars)
            </div>
            <div id="checkSlug" style="display: flex; align-items: center; gap: 8px; color: var(--text-muted);">
              <span class="seo-dot" style="width: 8px; height: 8px; border-radius: 50%; background: #64748B;"></span>
              Clean URL slug without stop words
            </div>
            <div id="checkImage" style="display: flex; align-items: center; gap: 8px; color: var(--text-muted);">
              <span class="seo-dot" style="width: 8px; height: 8px; border-radius: 50%; background: #64748B;"></span>
              Featured &amp; social share image set
            </div>
          </div>
        </div>

      </div>

    </div>
  </form>

  <!-- Interactive JavaScript for Dynamic Category Creation & SEO Live SERP Engine -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('articleTitle');
    const slugInput = document.getElementById('articleSlug');
    const excerptInput = document.getElementById('articleExcerpt');
    const seoTitleInput = document.getElementById('seoMetaTitle');
    const seoDescInput = document.getElementById('seoMetaDescription');
    const serpTitlePreview = document.getElementById('serpTitlePreview');
    const serpSlugPreview = document.getElementById('serpSlugPreview');
    const serpDescPreview = document.getElementById('serpDescPreview');
    const titleCounter = document.getElementById('titleCounter');
    const descCounter = document.getElementById('descCounter');

    // 1. Auto-Slug Generation if empty
    if (titleInput && slugInput) {
      titleInput.addEventListener('input', function() {
        if (!slugInput.dataset.manual) {
          const generated = titleInput.value.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .trim()
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
          slugInput.value = generated;
          serpSlugPreview.innerText = generated || 'article-slug';
        }
        updateSerp();
      });

      slugInput.addEventListener('input', function() {
        slugInput.dataset.manual = 'true';
        serpSlugPreview.innerText = slugInput.value || 'article-slug';
      });
    }

    // 2. Real-Time SERP & Character Counting Engine
    function updateSerp() {
      const activeTitle = (seoTitleInput && seoTitleInput.value.trim()) 
        ? seoTitleInput.value.trim() 
        : ((titleInput && titleInput.value.trim()) ? titleInput.value.trim() + ' — Bluebase Tech Blog' : 'Article Title — Bluebase Tech Blog');
      
      const activeDesc = (seoDescInput && seoDescInput.value.trim())
        ? seoDescInput.value.trim()
        : ((excerptInput && excerptInput.value.trim()) ? excerptInput.value.trim().replace(/<[^>]*>/g, '') : 'Concise summary of the article appears here in Google search results...');

      if (serpTitlePreview) serpTitlePreview.innerText = activeTitle;
      if (serpDescPreview) serpDescPreview.innerText = activeDesc.length > 160 ? activeDesc.substring(0, 157) + '...' : activeDesc;

      // Title Counter
      if (titleCounter && seoTitleInput) {
        const titleLen = seoTitleInput.value.length;
        titleCounter.innerText = titleLen + ' / 60 chars';
        if (titleLen >= 45 && titleLen <= 60) {
          titleCounter.style.color = '#10B981';
          setCheck('checkTitle', true);
        } else if (titleLen > 60) {
          titleCounter.style.color = '#EF4444';
          setCheck('checkTitle', false);
        } else {
          titleCounter.style.color = 'var(--text-muted)';
          setCheck('checkTitle', false);
        }
      }

      // Desc Counter
      if (descCounter && seoDescInput) {
        const descLen = seoDescInput.value.length;
        descCounter.innerText = descLen + ' / 160 chars';
        if (descLen >= 120 && descLen <= 160) {
          descCounter.style.color = '#10B981';
          setCheck('checkDesc', true);
        } else if (descLen > 160) {
          descCounter.style.color = '#EF4444';
          setCheck('checkDesc', false);
        } else {
          descCounter.style.color = 'var(--text-muted)';
          setCheck('checkDesc', false);
        }
      }

      // Slug Check
      if (slugInput) {
        setCheck('checkSlug', slugInput.value.length > 3);
      }

      // Image Check
      const blogImg = document.getElementById('blog_image');
      if (blogImg) {
        setCheck('checkImage', blogImg.value.length > 5);
      }
    }

    function setCheck(id, pass) {
      const el = document.getElementById(id);
      if (!el) return;
      const dot = el.querySelector('.seo-dot');
      if (dot) {
        dot.style.background = pass ? '#10B981' : '#64748B';
      }
    }

    if (seoTitleInput) seoTitleInput.addEventListener('input', updateSerp);
    if (seoDescInput) seoDescInput.addEventListener('input', updateSerp);
    if (excerptInput) excerptInput.addEventListener('input', updateSerp);

    // Initial SERP update
    updateSerp();

    // 3. Sync SEO to Social Graph
    const btnSyncOg = document.getElementById('btnSyncSeoToOg');
    if (btnSyncOg) {
      btnSyncOg.addEventListener('click', function() {
        const t = (seoTitleInput && seoTitleInput.value.trim()) ? seoTitleInput.value.trim() : (titleInput ? titleInput.value.trim() : '');
        const d = (seoDescInput && seoDescInput.value.trim()) ? seoDescInput.value.trim() : (excerptInput ? excerptInput.value.trim().replace(/<[^>]*>/g, '') : '');
        const ogTitle = document.getElementById('ogTitleInput');
        const ogDesc = document.getElementById('ogDescInput');
        if (ogTitle && t) ogTitle.value = t;
        if (ogDesc && d) ogDesc.value = d;
      });
    }

    // 4. Dynamic Category Creation Drawer & AJAX Engine
    const btnToggleCat = document.getElementById('btnToggleNewCategory');
    const catDrawer = document.getElementById('newCategoryDrawer');
    const catSelect = document.getElementById('categorySelect');
    const quickCatName = document.getElementById('quickCategoryName');
    const quickCatDesc = document.getElementById('quickCategoryDesc');
    const btnSaveCat = document.getElementById('btnSaveQuickCategory');
    const catMsg = document.getElementById('quickCategoryMsg');

    if (btnToggleCat && catDrawer) {
      btnToggleCat.addEventListener('click', function() {
        catDrawer.style.display = catDrawer.style.display === 'none' ? 'block' : 'none';
        if (catDrawer.style.display === 'block' && quickCatName) {
          quickCatName.focus();
        }
      });
    }

    if (btnSaveCat && quickCatName && catSelect) {
      btnSaveCat.addEventListener('click', function() {
        const nameVal = quickCatName.value.trim();
        if (!nameVal) {
          alert('Please enter a category name');
          return;
        }

        btnSaveCat.disabled = true;
        btnSaveCat.innerText = 'Creating...';

        fetch("{{ route('admin.cms.blogs.categories.ajax') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            name: nameVal,
            description: quickCatDesc ? quickCatDesc.value.trim() : ''
          })
        })
        .then(res => res.json())
        .then(data => {
          btnSaveCat.disabled = false;
          btnSaveCat.innerText = 'Create';

          if (data.success && data.category) {
            // Check if option already exists
            let exists = false;
            for (let i = 0; i < catSelect.options.length; i++) {
              if (catSelect.options[i].value == data.category.id) {
                catSelect.selectedIndex = i;
                exists = true;
                break;
              }
            }

            if (!exists) {
              const opt = document.createElement('option');
              opt.value = data.category.id;
              opt.text = data.category.name;
              opt.selected = true;
              catSelect.appendChild(opt);
            }

            if (catMsg) {
              catMsg.innerText = data.message;
              catMsg.style.color = '#10B981';
              catMsg.style.display = 'block';
            }

            quickCatName.value = '';
            if (quickCatDesc) quickCatDesc.value = '';

            setTimeout(() => {
              if (catDrawer) catDrawer.style.display = 'none';
              if (catMsg) catMsg.style.display = 'none';
            }, 1800);
          } else {
            if (catMsg) {
              catMsg.innerText = data.message || 'Error creating category';
              catMsg.style.color = '#EF4444';
              catMsg.style.display = 'block';
            }
          }
        })
        .catch(err => {
          btnSaveCat.disabled = false;
          btnSaveCat.innerText = 'Create';
          alert('Failed to create category. Please check your network connection.');
        });
      });
    }
  });
  </script>

  <!-- ================= BANNER STUDIO MODAL DIALOG ================= -->
  <style>
    .banner-modal-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.75);
      backdrop-filter: blur(5px);
      z-index: 1050;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .banner-modal-backdrop.open {
      display: flex;
    }
    .banner-modal-dialog {
      width: 1060px;
      max-width: 96vw;
      max-height: 92vh;
      background: #090E23;
      border: 1px solid var(--border-color);
      border-radius: 14px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.7);
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }
    .banner-modal-header {
      padding: 14px 20px;
      background: rgba(15, 23, 42, 0.9);
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      color: #ffffff;
      font-weight: 700;
    }
    .banner-modal-body {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 20px;
      padding: 20px;
      overflow-y: auto;
    }
    @media (max-width: 900px) {
      .banner-modal-body {
        grid-template-columns: 1fr;
      }
    }
  </style>

  <div class="banner-modal-backdrop" id="blogBannerModal">
    <div class="banner-modal-dialog">
      <div class="banner-modal-header">
        <div style="display: flex; align-items: center; gap: 8px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" style="width: 18px; height: 18px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <span>Auto-Generate Branded Textured Banner</span>
        </div>
        <button type="button" onclick="closeBlogBannerModal()" style="background: none; border: none; color: var(--text-dim); cursor: pointer; padding: 4px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>

      <div class="banner-modal-body">
        <!-- Left: Live Preview Canvas -->
        <div style="display: flex; flex-direction: column; gap: 10px;">
          <div style="width: 100%; aspect-ratio: 16/9; background: #070B19; border-radius: 8px; overflow: hidden; border: 1px solid rgba(255,255,255,0.06);">
            <canvas id="formBannerCanvas" width="1280" height="720" style="width: 100%; height: 100%; display: block; object-fit: contain;"></canvas>
          </div>
          <div style="font-size: 0.75rem; color: var(--text-dim); display: flex; justify-content: space-between;">
            <span>1280 &times; 720 HD &bull; Bluebase Corporate Aesthetic</span>
            <span style="color: var(--accent);">Live Rendering</span>
          </div>
        </div>

        <!-- Right: Generator Controls -->
        <div style="display: flex; flex-direction: column; gap: 12px;">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" style="font-size: 0.78rem;">Headline Text</label>
            <textarea id="modalBannerTitle" rows="3" class="form-control" style="font-size: 0.82rem;" oninput="renderFormBannerCanvas()"></textarea>
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" style="font-size: 0.78rem;">Category Tag Pill</label>
            <input type="text" id="modalBannerCategory" class="form-control" style="font-size: 0.82rem;" oninput="renderFormBannerCanvas()">
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" style="font-size: 0.78rem;">Texture Pattern</label>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px;">
              <button type="button" class="btn btn-secondary btn-sm modal-texture-btn active" data-texture="cyber_grid" onclick="selectModalTexture('cyber_grid', this)" style="padding: 6px 8px; font-size: 0.75rem;">
                Cyber Grid
              </button>
              <button type="button" class="btn btn-secondary btn-sm modal-texture-btn" data-texture="abstract_circuit" onclick="selectModalTexture('abstract_circuit', this)" style="padding: 6px 8px; font-size: 0.75rem;">
                Abstract Circuit
              </button>
              <button type="button" class="btn btn-secondary btn-sm modal-texture-btn" data-texture="tech_mesh" onclick="selectModalTexture('tech_mesh', this)" style="padding: 6px 8px; font-size: 0.75rem;">
                Geometric Mesh
              </button>
              <button type="button" class="btn btn-secondary btn-sm modal-texture-btn" data-texture="executive_carbon" onclick="selectModalTexture('executive_carbon', this)" style="padding: 6px 8px; font-size: 0.75rem;">
                Carbon Matrix
              </button>
              <button type="button" class="btn btn-secondary btn-sm modal-texture-btn" data-texture="glass_aura" onclick="selectModalTexture('glass_aura', this)" style="padding: 6px 8px; font-size: 0.75rem;">
                Obsidian Aura
              </button>
              <button type="button" class="btn btn-secondary btn-sm modal-texture-btn" data-texture="minimal_frame" onclick="selectModalTexture('minimal_frame', this)" style="padding: 6px 8px; font-size: 0.75rem;">
                Minimal Luxury
              </button>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label" style="font-size: 0.78rem;">Alignment</label>
              <select id="modalBannerAlign" class="form-control" style="font-size: 0.8rem; padding: 5px 8px;" onchange="renderFormBannerCanvas()">
                <option value="left" selected>Left</option>
                <option value="center">Center</option>
              </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label" style="font-size: 0.78rem;">Font Scale</label>
              <select id="modalBannerScale" class="form-control" style="font-size: 0.8rem; padding: 5px 8px;" onchange="renderFormBannerCanvas()">
                <option value="auto" selected>Auto</option>
                <option value="50">50px</option>
                <option value="42">42px</option>
                <option value="36">36px</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div style="padding: 12px 20px; background: rgba(15, 23, 42, 0.9); border-top: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between;">
        <button type="button" class="btn btn-secondary" onclick="downloadFormBanner()">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
          Download JPG
        </button>
        <div style="display: flex; gap: 10px;">
          <button type="button" class="btn btn-secondary" onclick="closeBlogBannerModal()">Cancel</button>
          <button type="button" class="btn btn-primary" id="btnModalApplyBanner" onclick="applyGeneratedBannerToForm()" style="font-weight: 700;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="20 6 9 17 4 12"/></svg>
            Apply to Blog Article
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let modalTexture = 'cyber_grid';
    let modalAccent = { primary: '#0050e7', light: '#3b82f6' };

    function openBlogBannerModal() {
      const modal = document.getElementById('blogBannerModal');
      const titleInput = document.getElementById('articleTitle');
      const catSelect = document.getElementById('categorySelect');

      const title = titleInput ? titleInput.value.trim() : '';
      let cat = 'ENTERPRISE ARCHITECTURE';
      if (catSelect && catSelect.selectedIndex >= 0) {
        cat = catSelect.options[catSelect.selectedIndex].text.trim();
      }

      document.getElementById('modalBannerTitle').value = title || 'Your Article Title';
      document.getElementById('modalBannerCategory').value = cat || 'Cloud Architecture';

      if (modal) modal.classList.add('open');
      renderFormBannerCanvas();
    }

    function closeBlogBannerModal() {
      const modal = document.getElementById('blogBannerModal');
      if (modal) modal.classList.remove('open');
    }

    function selectModalTexture(name, btn) {
      modalTexture = name;
      document.querySelectorAll('.modal-texture-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      renderFormBannerCanvas();
    }

    function renderFormBannerCanvas() {
      const canvas = document.getElementById('formBannerCanvas');
      if (!canvas) return;
      const ctx = canvas.getContext('2d');
      const width = 1280;
      const height = 720;

      // Base gradient
      ctx.clearRect(0, 0, width, height);
      const bgGrad = ctx.createLinearGradient(0, 0, width, height);
      bgGrad.addColorStop(0, '#070B19');
      bgGrad.addColorStop(0.5, '#0B1229');
      bgGrad.addColorStop(1, '#050814');
      ctx.fillStyle = bgGrad;
      ctx.fillRect(0, 0, width, height);

      // Texture
      if (modalTexture === 'cyber_grid') {
        drawModalCyberGrid(ctx, width, height);
      } else if (modalTexture === 'abstract_circuit') {
        drawModalAbstractCircuit(ctx, width, height);
      } else if (modalTexture === 'tech_mesh') {
        drawModalTechMesh(ctx, width, height);
      } else if (modalTexture === 'executive_carbon') {
        drawModalExecutiveCarbon(ctx, width, height);
      } else if (modalTexture === 'glass_aura') {
        drawModalGlassAura(ctx, width, height);
      } else {
        drawModalMinimalFrame(ctx, width, height);
      }

      // Ambient radial glow
      const radial = ctx.createRadialGradient(width - 100, 100, 30, width - 100, 100, 480);
      radial.addColorStop(0, modalAccent.primary + '33');
      radial.addColorStop(0.7, modalAccent.primary + '0A');
      radial.addColorStop(1, 'transparent');
      ctx.fillStyle = radial;
      ctx.fillRect(0, 0, width, height);

      // Top bar
      ctx.fillStyle = modalAccent.primary;
      ctx.fillRect(0, 0, width, 5);

      // Text elements
      const title = document.getElementById('modalBannerTitle').value.trim() || 'Article Title';
      const category = (document.getElementById('modalBannerCategory').value.trim() || 'ENTERPRISE ARCHITECTURE').toUpperCase();
      const align = document.getElementById('modalBannerAlign').value;
      const startX = (align === 'center') ? width / 2 : 110;

      // Category Pill
      ctx.textAlign = (align === 'center') ? 'center' : 'left';
      ctx.textBaseline = 'middle';
      const kickerText = 'BLUEBASE TECHNOLOGIES • ' + category;
      ctx.font = '700 13px Inter, -apple-system, sans-serif';
      const kickerWidth = ctx.measureText(kickerText).width + 36;
      const pillY = 160;

      ctx.save();
      ctx.fillStyle = 'rgba(0, 80, 231, 0.22)';
      ctx.strokeStyle = modalAccent.light;
      ctx.lineWidth = 1.2;
      if (align === 'center') {
        drawModalRoundRect(ctx, (width / 2) - (kickerWidth / 2), pillY - 16, kickerWidth, 32, 6, true, true);
      } else {
        drawModalRoundRect(ctx, 110, pillY - 16, kickerWidth, 32, 6, true, true);
      }
      ctx.fillStyle = '#FFFFFF';
      ctx.fillText(kickerText, (align === 'center') ? width / 2 : 128, pillY);
      ctx.restore();

      // Headline
      let fontSize = 44;
      const scaleSetting = document.getElementById('modalBannerScale').value;
      if (scaleSetting === 'auto') {
        if (title.length > 70) fontSize = 36;
        else if (title.length > 45) fontSize = 40;
        else fontSize = 48;
      } else {
        fontSize = parseInt(scaleSetting);
      }

      ctx.font = `800 ${fontSize}px Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`;
      ctx.fillStyle = '#FFFFFF';
      ctx.textAlign = (align === 'center') ? 'center' : 'left';

      const lines = getModalWrappedLines(ctx, title, 1060);
      const lineHeight = fontSize * 1.35;
      const titleStartY = pillY + 80;

      lines.forEach((line, index) => {
        const y = titleStartY + (index * lineHeight);
        ctx.shadowColor = 'rgba(0, 0, 0, 0.8)';
        ctx.shadowBlur = 12;
        ctx.fillText(line, startX, y);
        ctx.shadowColor = 'transparent';
      });

      // Watermark
      ctx.font = '500 13px Inter, -apple-system, sans-serif';
      ctx.fillStyle = '#94A3B8';
      ctx.fillText('bluebasetechnologies.com  •  Cloud Architecture, Software Modernization & Autonomous AI', startX, height - 65);
    }

    function drawModalCyberGrid(ctx, width, height) {
      ctx.strokeStyle = 'rgba(255, 255, 255, 0.04)';
      ctx.lineWidth = 1;
      const spacing = 50;
      for (let x = 0; x <= width; x += spacing) {
        ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, height); ctx.stroke();
      }
      for (let y = 0; y <= height; y += spacing) {
        ctx.beginPath(); ctx.moveTo(0, y); ctx.lineTo(width, y); ctx.stroke();
      }
    }
    function drawModalAbstractCircuit(ctx, width, height) {
      drawModalCyberGrid(ctx, width, height);
      ctx.strokeStyle = 'rgba(0, 229, 255, 0.15)';
      ctx.lineWidth = 1.5;
      ctx.beginPath();
      ctx.moveTo(800, 80); ctx.lineTo(1050, 80); ctx.lineTo(1120, 160); ctx.lineTo(1280, 160);
      ctx.stroke();
    }
    function drawModalTechMesh(ctx, width, height) {
      ctx.strokeStyle = 'rgba(139, 92, 246, 0.08)';
      ctx.lineWidth = 1;
      const step = 80;
      for (let x = 0; x < width; x += step) {
        for (let y = 0; y < height; y += step) {
          ctx.strokeRect(x, y, step, step);
          ctx.beginPath(); ctx.moveTo(x, y); ctx.lineTo(x + step, y + step); ctx.stroke();
        }
      }
    }
    function drawModalExecutiveCarbon(ctx, width, height) {
      ctx.fillStyle = 'rgba(255, 255, 255, 0.015)';
      for (let y = 0; y < height; y += 6) ctx.fillRect(0, y, width, 2);
    }
    function drawModalGlassAura(ctx, width, height) {
      const aura = ctx.createRadialGradient(width * 0.7, height * 0.35, 20, width * 0.7, height * 0.35, 450);
      aura.addColorStop(0, 'rgba(0, 80, 231, 0.25)');
      aura.addColorStop(1, 'transparent');
      ctx.fillStyle = aura;
      ctx.fillRect(0, 0, width, height);
    }
    function drawModalMinimalFrame(ctx, width, height) {
      ctx.strokeStyle = 'rgba(255, 255, 255, 0.08)';
      ctx.lineWidth = 1;
      ctx.strokeRect(40, 40, width - 80, height - 80);
    }

    function drawModalRoundRect(ctx, x, y, width, height, radius, fill, stroke) {
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

    function getModalWrappedLines(ctx, text, maxWidth) {
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

    function applyGeneratedBannerToForm() {
      const canvas = document.getElementById('formBannerCanvas');
      const title = document.getElementById('modalBannerTitle').value.trim();
      const category = document.getElementById('modalBannerCategory').value.trim();
      const slugInput = document.getElementById('articleSlug');
      const slug = slugInput ? slugInput.value.trim() : '';
      const btn = document.getElementById('btnModalApplyBanner');

      const dataUrl = canvas.toDataURL('image/jpeg', 0.92);

      btn.disabled = true;
      btn.innerText = 'Saving Banner...';

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
          slug: slug,
          image_data: dataUrl
        })
      })
      .then(res => res.json())
      .then(data => {
        btn.disabled = false;
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="20 6 9 17 4 12"/></svg> Apply to Blog Article';

        if (data.success && data.image_url) {
          const imgInput = document.getElementById('blog_image');
          const ogImgInput = document.getElementById('og_image');
          const preview = document.getElementById('blog_image_preview');

          if (imgInput) imgInput.value = data.image_url;
          if (ogImgInput) ogImgInput.value = data.image_url;
          if (preview) {
            preview.innerHTML = `<img src="${data.full_url}" alt="Preview" style="max-height: 100%; border-radius: 6px;">`;
          }

          closeBlogBannerModal();
          alert('Branded banner image generated and applied successfully to this article!');
        } else {
          alert(data.message || 'Error generating banner.');
        }
      })
      .catch(err => {
        btn.disabled = false;
        btn.innerHTML = 'Apply to Blog Article';
        alert('Failed to save banner: ' + err.message);
      });
    }

    function downloadFormBanner() {
      const canvas = document.getElementById('formBannerCanvas');
      const slugInput = document.getElementById('articleSlug');
      const slug = (slugInput && slugInput.value.trim()) ? slugInput.value.trim() : 'blog-banner-' + Date.now();
      const link = document.createElement('a');
      link.download = slug + '.jpg';
      link.href = canvas.toDataURL('image/jpeg', 0.92);
      link.click();
    }
  </script>
@endsection
