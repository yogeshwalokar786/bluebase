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
use App\Http\Controllers\Admin\ClientLogoCmsController;
use App\Http\Controllers\Admin\BlogCmsController;
use App\Http\Controllers\Admin\JobOpeningCmsController;
use App\Http\Controllers\Admin\TestimonialCmsController;
use App\Http\Controllers\Admin\SettingsCmsController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\MailController;

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
Route::get('/customer-stories/omg-rental-bikes', [CompanyController::class, 'omgRentalBikesStory'])->name('customer-stories.omg-rental-bikes');
Route::get('/case-studies/omg-rental-bikes', fn() => redirect()->route('customer-stories.omg-rental-bikes', [], 301));
Route::get('/customer-stories/aarohi-classic-2024', [CompanyController::class, 'aarohiClassicStory'])->name('customer-stories.aarohi-classic-2024');
Route::get('/case-studies/aarohi-classic-2024', fn() => redirect()->route('customer-stories.aarohi-classic-2024', [], 301));
Route::get('/customer-stories/indiamart-lead-automation', [CompanyController::class, 'indiamartLeadAutomationStory'])->name('customer-stories.indiamart-lead-automation');
Route::get('/case-studies/indiamart-lead-automation', fn() => redirect()->route('customer-stories.indiamart-lead-automation', [], 301));
Route::get('/customer-stories/{slug}', [CompanyController::class, 'showStory'])->name('customer-stories.show');
Route::get('/case-studies/{slug}', fn($slug) => redirect()->route('customer-stories.show', ['slug' => $slug], 301));
Route::get('/compliance-security', [CompanyController::class, 'complianceSecurity'])->name('compliance-security');
Route::get('/how-we-work', [CompanyController::class, 'howWeWork'])->name('how-we-work');
Route::get('/company/how-we-work', fn() => redirect()->route('how-we-work', [], 301))->name('company.how-we-work');
Route::get('/company/customer-stories', fn() => redirect()->route('customer-stories', [], 301))->name('company.customer-stories');
Route::get('/company/careers', fn() => redirect()->route('careers', [], 301))->name('company.careers');
Route::get('/company/compliance-security', fn() => redirect()->route('compliance-security', [], 301))->name('company.compliance-security');
Route::get('/partner-overview', fn() => redirect()->route('company', [], 301))->name('partner-overview');
Route::get('/become-a-partner', fn() => redirect()->route('contact', [], 301))->name('become-a-partner');
Route::get('/find-a-partner', fn() => redirect()->route('company', [], 301))->name('find-a-partner');

// Resources & Legal
Route::get('/whitepapers', fn() => redirect()->route('blog', [], 301))->name('whitepapers');
Route::get('/guides', fn() => redirect()->route('blog', [], 301));
Route::get('/playbooks', fn() => redirect()->route('blog', [], 301));
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::post('/blog/{id}/helpful', [BlogController::class, 'voteHelpful'])->where('id', '[0-9]+')->name('blog.helpful');
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
Route::post('/contact/security-verify', [InquiryController::class, 'generateSecurityToken'])->name('contact.security.verify');

Route::get('/client-portal', fn() => redirect(env('CRM_URL', 'https://crm.bluebasetechnologies.com/login')))->name('client-portal');
Route::get('/crm', fn() => redirect(env('CRM_URL', 'https://crm.bluebasetechnologies.com/login')))->name('crm');

Route::get('/book-a-demo', fn() => redirect()->route('contact', [], 301))->name('book-a-demo');
Route::post('/book-a-demo', [InquiryController::class, 'storeContact'])->name('book-a-demo.store');

Route::get('/free-trial', [InquiryController::class, 'trialForm'])->name('free-trial');
Route::post('/free-trial', [InquiryController::class, 'storeTrial'])->name('free-trial.store');

Route::post('/partner/apply', [InquiryController::class, 'storePartner'])->name('partner.apply');
Route::post('/newsletter/subscribe', [InquiryController::class, 'storeNewsletter'])->name('newsletter.subscribe');

// Inbound Email Webhook (for external forwarders, Postmark, Mailgun, cPanel email piping)
Route::post('/mail/inbound', [MailController::class, 'incomingWebhook'])->name('mail.inbound');

// ==========================================
// 2. ADMIN AUTHENTICATION
// ==========================================
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ==========================================
// 3. SECURE ADMIN PORTAL (MEDIA, SETTINGS, CLIENT LOGOS)
// ==========================================
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // 1. CMS Management (Client Logos, Blogs, Careers)
    Route::prefix('cms')->name('cms.')->group(function () {
        // Client Logos
        Route::get('/clients', [ClientLogoCmsController::class, 'index'])->name('clients.index');
        Route::get('/clients/create', [ClientLogoCmsController::class, 'create'])->name('clients.create');
        Route::post('/clients', [ClientLogoCmsController::class, 'store'])->name('clients.store');
        Route::get('/clients/{id}/edit', [ClientLogoCmsController::class, 'edit'])->name('clients.edit');
        Route::post('/clients/{id}', [ClientLogoCmsController::class, 'update'])->name('clients.update');
        Route::delete('/clients/{id}', [ClientLogoCmsController::class, 'destroy'])->name('clients.destroy');
        Route::post('/clients/{id}/toggle', [ClientLogoCmsController::class, 'toggleActive'])->name('clients.toggle');
        Route::post('/clients/reorder', [ClientLogoCmsController::class, 'reorder'])->name('clients.reorder');

        // Blog Management CMS
        Route::get('/blogs', [BlogCmsController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create', [BlogCmsController::class, 'create'])->name('blogs.create');
        Route::post('/blogs', [BlogCmsController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{id}/edit', [BlogCmsController::class, 'edit'])->name('blogs.edit');
        Route::post('/blogs/{id}', [BlogCmsController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{id}', [BlogCmsController::class, 'destroy'])->name('blogs.destroy');
        Route::post('/blogs/{id}/toggle', [BlogCmsController::class, 'togglePublish'])->name('blogs.toggle');
        Route::post('/blogs/category/ajax', [BlogCmsController::class, 'ajaxStoreCategory'])->name('blogs.category.ajax');
        Route::post('/blogs/generate-banner', [BlogCmsController::class, 'generateBanner'])->name('blogs.generate_banner');
        Route::get('/banner-studio', [BlogCmsController::class, 'bannerStudio'])->name('banner_studio');

        // Case Studies CMS
        Route::get('/case-studies', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'index'])->name('case-studies.index');
        Route::get('/case-studies/create', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'create'])->name('case-studies.create');
        Route::post('/case-studies', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'store'])->name('case-studies.store');
        Route::get('/case-studies/{id}/edit', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'edit'])->name('case-studies.edit');
        Route::post('/case-studies/{id}', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'update'])->name('case-studies.update');
        Route::delete('/case-studies/{id}', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'destroy'])->name('case-studies.destroy');
        Route::post('/case-studies/{id}/toggle', [\App\Http\Controllers\Admin\CaseStudyCmsController::class, 'toggle'])->name('case-studies.toggle');

        // Careers & Job Openings CMS
        Route::get('/careers', [JobOpeningCmsController::class, 'index'])->name('careers.index');
        Route::get('/careers/create', [JobOpeningCmsController::class, 'create'])->name('careers.create');
        Route::post('/careers', [JobOpeningCmsController::class, 'store'])->name('careers.store');
        Route::get('/careers/{id}/edit', [JobOpeningCmsController::class, 'edit'])->name('careers.edit');
        Route::post('/careers/{id}', [JobOpeningCmsController::class, 'update'])->name('careers.update');
        Route::delete('/careers/{id}', [JobOpeningCmsController::class, 'destroy'])->name('careers.destroy');
        Route::post('/careers/{id}/toggle', [JobOpeningCmsController::class, 'toggle'])->name('careers.toggle');
    });
    Route::get('/clients', fn() => redirect()->route('admin.cms.clients.index'))->name('clients');
    Route::get('/blogs', fn() => redirect()->route('admin.cms.blogs.index'))->name('blogs');
    Route::get('/careers', fn() => redirect()->route('admin.cms.careers.index'))->name('careers');

    // 2. Contact Inquiries Management
    Route::prefix('leads')->name('leads.')->group(function () {
        Route::get('/inquiries', [LeadController::class, 'inquiries'])->name('inquiries');
        Route::get('/inquiries-export', [LeadController::class, 'exportInquiries'])->name('inquiries.export');
        Route::get('/inquiries/{id}', [LeadController::class, 'showInquiry'])->name('inquiries.show');
        Route::post('/inquiries/{id}', [LeadController::class, 'updateInquiry'])->name('inquiries.update');
        Route::delete('/inquiries/{id}', [LeadController::class, 'destroyInquiry'])->name('inquiries.destroy');
    });
    Route::get('/inquiries', fn() => redirect()->route('admin.leads.inquiries'))->name('inquiries');

    // 3. Webmail & Communications Center
    Route::prefix('mail')->name('mail.')->group(function () {
        Route::get('/', [MailController::class, 'index'])->name('index');
        Route::post('/send', [MailController::class, 'send'])->name('send');
        Route::post('/sync', [MailController::class, 'sync'])->name('sync');
        Route::post('/signature', [MailController::class, 'updateSignature'])->name('signature');
        Route::post('/bulk', [MailController::class, 'bulk'])->name('bulk');
        Route::post('/{id}/star', [MailController::class, 'toggleStar'])->name('star');
        Route::post('/{id}/read', [MailController::class, 'toggleRead'])->name('read');
        Route::post('/{id}/trash', [MailController::class, 'moveToTrash'])->name('trash');
        Route::post('/{id}/restore', [MailController::class, 'restore'])->name('restore');
        Route::delete('/{id}', [MailController::class, 'destroy'])->name('destroy');
    });

    // 4. Media Manager & File Library
    Route::prefix('filemanager')->name('filemanager.')->group(function () {
        Route::get('/', [FileManagerController::class, 'index'])->name('index');
        Route::get('/api/files', [FileManagerController::class, 'apiFiles'])->name('api.files');
        Route::post('/upload', [FileManagerController::class, 'upload'])->name('upload');
        Route::post('/delete', [FileManagerController::class, 'delete'])->name('delete');
    });

    // 3. Site Settings
    Route::get('/settings', [SettingsCmsController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingsCmsController::class, 'update'])->name('settings.update');
    Route::post('/settings/test-email', [SettingsCmsController::class, 'sendTestEmail'])->name('settings.test_email');

    // Safe fallbacks for retired admin routes
    Route::get('/seo/{any?}', fn() => redirect()->route('admin.dashboard'))->where('any', '.*');
    Route::get('/cms/testimonials/{any?}', fn() => redirect()->route('admin.dashboard'))->where('any', '.*');
});
