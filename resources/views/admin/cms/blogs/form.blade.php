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
            <div class="form-hint">Click &ldquo;Browse Media&rdquo; to pick from the central media library or upload new high-resolution graphics.</div>
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
@endsection
