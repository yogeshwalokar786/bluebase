<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ModernizationController;
use App\Http\Controllers\UseCaseController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\SolutionCmsController;
use App\Http\Controllers\Admin\BlogCmsController;
use App\Http\Controllers\Admin\TestimonialCmsController;
use App\Http\Controllers\Admin\SettingsCmsController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\SeoController;

// ==========================================
// 1. PUBLIC MARKETING WEBSITE
// ==========================================

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services & Dedicated Capabilities
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/web-development', [ServiceController::class, 'webDevelopment'])->name('services.web-development');
Route::get('/website-design', [ServiceController::class, 'websiteDesign'])->name('services.website-design');
Route::get('/mobile-app-development', [ServiceController::class, 'mobileApp'])->name('services.mobile-app-development');
Route::get('/saas-mvp-development', [ServiceController::class, 'saasMvp'])->name('services.saas-mvp-development');
Route::get('/ecommerce-development', [ServiceController::class, 'ecommerce'])->name('services.ecommerce-development');
Route::get('/ui-ux-design', [ServiceController::class, 'uiUxDesign'])->name('services.ui-ux-design');
Route::get('/api-backend-development', [ServiceController::class, 'apiBackend'])->name('services.api-backend-development');
Route::get('/website-redesign', [ServiceController::class, 'websiteRedesign'])->name('services.website-redesign');
Route::get('/maintenance-support', [ServiceController::class, 'maintenanceSupport'])->name('services.maintenance-support');

Route::get('/professional-services', fn() => redirect()->route('services', [], 301))->name('services.professional');
Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions');

// Clean Route Aliases
Route::get('/services/web-development', fn() => redirect()->route('services.web-development', [], 301));
Route::get('/services/website-design', fn() => redirect()->route('services.website-design', [], 301));
Route::get('/services/mobile-app-development', fn() => redirect()->route('services.mobile-app-development', [], 301));
Route::get('/services/saas-mvp-development', fn() => redirect()->route('services.saas-mvp-development', [], 301));
Route::get('/services/ecommerce-development', fn() => redirect()->route('services.ecommerce-development', [], 301));
Route::get('/services/ui-ux-design', fn() => redirect()->route('services.ui-ux-design', [], 301));
Route::get('/services/api-backend-development', fn() => redirect()->route('services.api-backend-development', [], 301));
Route::get('/services/website-redesign', fn() => redirect()->route('services.website-redesign', [], 301));
Route::get('/services/maintenance-support', fn() => redirect()->route('services.maintenance-support', [], 301));

// Legacy 301 Redirects to Modern Startup Services (Zero Broken Links)
Route::get('/neptune-dxp', fn() => redirect()->route('services.web-development', [], 301))->name('products.neptune-dxp');
Route::get('/ai-agents', fn() => redirect()->route('services.web-development', [], 301))->name('products.ai-agents');
Route::get('/naia', fn() => redirect()->route('services.web-development', [], 301))->name('products.naia');
Route::get('/sap-native', fn() => redirect()->route('services.web-development', [], 301))->name('modernization.sap-native');
Route::get('/move-to-s-4hana', fn() => redirect()->route('services.website-redesign', [], 301))->name('modernization.move-to-s-4hana');
Route::get('/sap-fiori', fn() => redirect()->route('services.ui-ux-design', [], 301))->name('modernization.sap-fiori');
Route::get('/sap-integration', fn() => redirect()->route('services.api-backend-development', [], 301))->name('modernization.sap-integration');
Route::get('/low-code-for-sap', fn() => redirect()->route('services.saas-mvp-development', [], 301))->name('modernization.low-code-for-sap');
Route::get('/asset-management', fn() => redirect()->route('services.website-redesign', [], 301))->name('use-cases.asset-management');
Route::get('/run-mobile-in-offline', fn() => redirect()->route('services.mobile-app-development', [], 301))->name('use-cases.run-mobile-in-offline');
Route::get('/supplier-portals', fn() => redirect()->route('services.ecommerce-development', [], 301))->name('use-cases.supplier-portals');
Route::get('/stock-inventory-management', fn() => redirect()->route('services.ecommerce-development', [], 301))->name('use-cases.stock-inventory-management');
Route::get('/use-case-warehouse-and-logistics', fn() => redirect()->route('services.web-development', [], 301))->name('use-cases.warehouse-logistics');
Route::get('/industry-manufacturing', fn() => redirect()->route('solutions', [], 301))->name('industries.manufacturing');
Route::get('/industry-defense', fn() => redirect()->route('solutions', [], 301))->name('industries.defense');

// Company & Partners
Route::get('/company', [CompanyController::class, 'company'])->name('company');
Route::get('/about', fn() => redirect()->route('company', [], 301));
Route::get('/about-us', fn() => redirect()->route('company', [], 301));
Route::get('/careers', [CompanyController::class, 'careers'])->name('careers');
Route::get('/customer-stories', [CompanyController::class, 'customerStories'])->name('customer-stories');
Route::get('/compliance-security', [CompanyController::class, 'complianceSecurity'])->name('compliance-security');
Route::get('/how-we-work', [CompanyController::class, 'howWeWork'])->name('how-we-work');
Route::get('/partner-overview', [CompanyController::class, 'partnerOverview'])->name('partner-overview');
Route::get('/become-a-partner', [CompanyController::class, 'becomePartner'])->name('become-a-partner');
Route::get('/find-a-partner', [CompanyController::class, 'findPartner'])->name('find-a-partner');

// Resources & Legal
Route::get('/whitepapers', [ResourceController::class, 'whitepapers'])->name('whitepapers');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/suits-blog', fn() => redirect()->route('blog', [], 301))->name('suits-blog');
Route::get('/suits-blog/{slug}', fn($slug) => redirect()->route('blog.show', ['slug' => $slug], 301));
Route::get('/tech-blog', fn() => redirect()->route('blog', [], 301));
Route::get('/tech-blog/{slug}', fn($slug) => redirect()->route('blog.show', ['slug' => $slug], 301));
Route::get('/privacy-policy', [ResourceController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-use', [ResourceController::class, 'termsOfUse'])->name('terms-of-use');
Route::get('/sitemap.xml', [SeoController::class, 'publicSitemap'])->name('sitemap.xml');

// Inquiries & Interactive Public Forms
Route::get('/contact', [InquiryController::class, 'contactForm'])->name('contact');
Route::post('/contact', [InquiryController::class, 'storeContact'])->name('contact.store');

Route::get('/book-a-demo', [InquiryController::class, 'demoForm'])->name('book-a-demo');
Route::post('/book-a-demo', [InquiryController::class, 'storeDemo'])->name('book-a-demo.store');

Route::get('/free-trial', [InquiryController::class, 'trialForm'])->name('free-trial');
Route::post('/free-trial', [InquiryController::class, 'storeTrial'])->name('free-trial.store');

Route::post('/partner/apply', [InquiryController::class, 'storePartner'])->name('partner.apply');
Route::post('/newsletter/subscribe', [InquiryController::class, 'storeNewsletter'])->name('newsletter.subscribe');

// ==========================================
// 2. ADMIN AUTHENTICATION
// ==========================================
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ==========================================
// 3. SECURE ADMIN PORTAL & CMS
// ==========================================
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // ------------------------------------------
    // A. LEAD MANAGEMENT PORTAL
    // ------------------------------------------
    Route::prefix('leads')->name('leads.')->group(function () {
        // Inquiries
        Route::get('/inquiries', [LeadController::class, 'inquiries'])->name('inquiries');
        Route::get('/inquiries/export', [LeadController::class, 'exportInquiries'])->name('inquiries.export');
        Route::get('/inquiries/{id}', [LeadController::class, 'showInquiry'])->name('inquiries.show');
        Route::post('/inquiries/{id}', [LeadController::class, 'updateInquiry'])->name('inquiries.update');
        Route::delete('/inquiries/{id}', [LeadController::class, 'destroyInquiry'])->name('inquiries.destroy');

        // Demo Bookings
        Route::get('/demos', [LeadController::class, 'demos'])->name('demos');
        Route::get('/demos/export', [LeadController::class, 'exportDemos'])->name('demos.export');
        Route::get('/demos/{id}', [LeadController::class, 'showDemo'])->name('demos.show');
        Route::post('/demos/{id}', [LeadController::class, 'updateDemo'])->name('demos.update');
        Route::delete('/demos/{id}', [LeadController::class, 'destroyDemo'])->name('demos.destroy');

        // Free Trial Requests
        Route::get('/trials', [LeadController::class, 'trials'])->name('trials');
        Route::get('/trials/export', [LeadController::class, 'exportTrials'])->name('trials.export');
        Route::get('/trials/{id}', [LeadController::class, 'showTrial'])->name('trials.show');
        Route::post('/trials/{id}', [LeadController::class, 'updateTrial'])->name('trials.update');
        Route::delete('/trials/{id}', [LeadController::class, 'destroyTrial'])->name('trials.destroy');

        // Partner Applications
        Route::get('/partners', [LeadController::class, 'partners'])->name('partners');
        Route::get('/partners/export', [LeadController::class, 'exportPartners'])->name('partners.export');
        Route::get('/partners/{id}', [LeadController::class, 'showPartner'])->name('partners.show');
        Route::post('/partners/{id}', [LeadController::class, 'updatePartner'])->name('partners.update');
        Route::delete('/partners/{id}', [LeadController::class, 'destroyPartner'])->name('partners.destroy');

        // Newsletter Subscribers
        Route::get('/subscribers', [LeadController::class, 'subscribers'])->name('subscribers');
        Route::get('/subscribers/export', [LeadController::class, 'exportSubscribers'])->name('subscribers.export');
        Route::post('/subscribers/{id}/toggle', [LeadController::class, 'toggleSubscriber'])->name('subscribers.toggle');
        Route::delete('/subscribers/{id}', [LeadController::class, 'destroySubscriber'])->name('subscribers.destroy');
    });

    // Backward-compatible Lead aliases
    Route::get('/inquiries', fn() => redirect()->route('admin.leads.inquiries'))->name('inquiries');
    Route::post('/inquiries/{id}/status', [LeadController::class, 'updateInquiry'])->name('inquiries.status');
    Route::get('/demos', fn() => redirect()->route('admin.leads.demos'))->name('demos');
    Route::get('/trials', fn() => redirect()->route('admin.leads.trials'))->name('trials');
    Route::get('/partners', fn() => redirect()->route('admin.leads.partners'))->name('partners');
    Route::get('/subscribers', fn() => redirect()->route('admin.leads.subscribers'))->name('subscribers');

    // ------------------------------------------
    // B. FULL CMS (CONTENT MANAGEMENT SYSTEM)
    // ------------------------------------------
    Route::prefix('cms')->name('cms.')->group(function () {
        // Solutions CMS
        Route::get('/solutions', [SolutionCmsController::class, 'index'])->name('solutions.index');
        Route::get('/solutions/create', [SolutionCmsController::class, 'create'])->name('solutions.create');
        Route::post('/solutions', [SolutionCmsController::class, 'store'])->name('solutions.store');
        Route::get('/solutions/{id}/edit', [SolutionCmsController::class, 'edit'])->name('solutions.edit');
        Route::post('/solutions/{id}', [SolutionCmsController::class, 'update'])->name('solutions.update');
        Route::delete('/solutions/{id}', [SolutionCmsController::class, 'destroy'])->name('solutions.destroy');
        Route::post('/solutions/{id}/toggle', [SolutionCmsController::class, 'toggleActive'])->name('solutions.toggle');

        // Blogs / Case Studies CMS
        Route::get('/blogs', [BlogCmsController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create', [BlogCmsController::class, 'create'])->name('blogs.create');
        Route::post('/blogs', [BlogCmsController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{id}/edit', [BlogCmsController::class, 'edit'])->name('blogs.edit');
        Route::post('/blogs/{id}', [BlogCmsController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{id}', [BlogCmsController::class, 'destroy'])->name('blogs.destroy');
        Route::post('/blogs/{id}/toggle', [BlogCmsController::class, 'togglePublish'])->name('blogs.toggle');
        Route::post('/blogs/categories/ajax-store', [BlogCmsController::class, 'ajaxStoreCategory'])->name('blogs.categories.ajax');

        // Testimonials CMS
        Route::get('/testimonials', [TestimonialCmsController::class, 'index'])->name('testimonials.index');
        Route::get('/testimonials/create', [TestimonialCmsController::class, 'create'])->name('testimonials.create');
        Route::post('/testimonials', [TestimonialCmsController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/{id}/edit', [TestimonialCmsController::class, 'edit'])->name('testimonials.edit');
        Route::post('/testimonials/{id}', [TestimonialCmsController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{id}', [TestimonialCmsController::class, 'destroy'])->name('testimonials.destroy');
    });

    // Backward-compatible CMS aliases
    Route::get('/services', fn() => redirect()->route('admin.cms.services.index'))->name('services');
    Route::get('/solutions', fn() => redirect()->route('admin.cms.solutions.index'))->name('solutions');

    // ------------------------------------------
    // C. FILE MANAGER & MEDIA LIBRARY
    // ------------------------------------------
    Route::prefix('filemanager')->name('filemanager.')->group(function () {
        Route::get('/', [FileManagerController::class, 'index'])->name('index');
        Route::get('/api/files', [FileManagerController::class, 'apiFiles'])->name('api.files');
        Route::post('/upload', [FileManagerController::class, 'upload'])->name('upload');
        Route::post('/delete', [FileManagerController::class, 'delete'])->name('delete');
    });

    // ------------------------------------------
    // D. ADVANCED SEO & SITEMAP GENERATOR
    // ------------------------------------------
    Route::prefix('seo')->name('seo.')->group(function () {
        Route::get('/global', [SeoController::class, 'globalSeo'])->name('global');
        Route::post('/global', [SeoController::class, 'updateGlobalSeo'])->name('global.update');

        Route::get('/pages', [SeoController::class, 'pageSeoIndex'])->name('pages.index');
        Route::get('/pages/create', [SeoController::class, 'pageSeoCreate'])->name('pages.create');
        Route::post('/pages', [SeoController::class, 'pageSeoStore'])->name('pages.store');
        Route::get('/pages/{id}/edit', [SeoController::class, 'pageSeoEdit'])->name('pages.edit');
        Route::post('/pages/{id}', [SeoController::class, 'pageSeoUpdate'])->name('pages.update');
        Route::delete('/pages/{id}', [SeoController::class, 'pageSeoDestroy'])->name('pages.destroy');

        Route::get('/sitemap', [SeoController::class, 'sitemapIndex'])->name('sitemap.index');
        Route::post('/sitemap/generate', [SeoController::class, 'generateSitemap'])->name('sitemap.generate');
    });

    // ------------------------------------------
    // E. SITE SETTINGS CMS
    // ------------------------------------------
    Route::get('/settings', [SettingsCmsController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingsCmsController::class, 'update'])->name('settings.update');
});
