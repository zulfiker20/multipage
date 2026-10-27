<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\FrontBlogController;
use App\Http\Controllers\Front\FrontAboutController;
use App\Http\Controllers\Front\FrontPortfolioController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\FrontContactController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Front\FrontServiceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Front\FrontSubscriberController;

// Front End Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/contact', [FrontContactController::class, 'index'])->name('contact');
Route::get('/about', [FrontAboutController::class, 'index'])->name('about');
Route::get('/portfolio', [FrontPortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/detail/{slug}', [FrontPortfolioController::class, 'showBySlug'])->name('portfolio.show.slug');

Route::get('/service', [FrontServiceController::class, 'index'])->name('service');
Route::get('/service/detail/{slug}', [FrontServiceController::class, 'showBySlug'])->name('service.show.slug');

Route::get('/blogs', [FrontBlogController::class, 'allBlogs'])->name('frontend.blog.index');
Route::get('/blog/details/{slug}', [FrontBlogController::class, 'blogDetails'])->name('frontend.blog.details');

Route::post('/subscribe', [FrontSubscriberController::class, 'store'])
    ->name('subscribe.store');

Route::get('/admin/banner', [HomeBannerController::class, 'index'])->name('banner');
Route::put('/admin/banner/update', [HomeBannerController::class, 'update'])->name('banner.update');

// About ডাটা সেভ করার জন্য POST রাউট
Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
Route::post('/admin/about/store', [AboutController::class, 'store'])->name('admin.about.store');

// Multi Image Routes
Route::get('/admin/multi/image', [AboutController::class, 'MultiImage'])->name('admin.multi.image');
Route::get('/admin/multi/image/create', [AboutController::class, 'CreateImage'])->name('admin.multi.image.create');
Route::post('/admin/multi/image/store', [AboutController::class, 'StoreMultiImage'])->name('admin.store.multi.image');
Route::get('/admin/multi/image/edit/{id}', [AboutController::class, 'EditMultiImage'])->name('admin.edit.multi.image');
Route::post('/admin/multi/image/update/{id}', [AboutController::class, 'UpdateMultiImage'])->name('admin.update.multi.image');
Route::get('/admin/multi/image/delete/{id}', [AboutController::class, 'DeleteMultiImage'])->name('admin.delete.multi.image');

// Portfolio Routes
Route::get('admin/portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio.index');
Route::get('/admin/portfolio/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
Route::post('/admin/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
Route::get('/admin/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
Route::post('/admin/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
Route::delete('/admin/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.delete');

// Testimonial Routes
Route::get('admin/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
Route::get('/admin/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
Route::post('/admin/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
Route::get('/admin/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
Route::post('/admin/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
Route::delete('/admin/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.delete');

// Work Routes
Route::get('admin/work', [WorkController::class, 'index'])->name('admin.work.index');
Route::get('/admin/work/create', [WorkController::class, 'create'])->name('admin.work.create');
Route::post('/admin/work/store', [WorkController::class, 'store'])->name('admin.work.store');
Route::get('/admin/work/edit/{id}', [WorkController::class, 'edit'])->name('admin.work.edit');
Route::post('/admin/work/update/{id}', [WorkController::class, 'update'])->name('admin.work.update');
Route::delete('/admin/work/delete/{id}', [WorkController::class, 'destroy'])->name('admin.work.delete');

// Partner Routes
Route::get('admin/partner', [PartnerController::class, 'index'])->name('admin.partner.index');
Route::get('/admin/partner/create', [PartnerController::class, 'create'])->name('admin.partner.create');
Route::post('/admin/partner/store', [PartnerController::class, 'store'])->name('admin.partner.store');
Route::get('/admin/partner/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
Route::post('/admin/partner/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
Route::delete('/admin/partner/delete/{id}', [PartnerController::class, 'destroy'])->name('admin.partner.delete');

// Service Routes
Route::get('admin/service', [ServiceController::class, 'index'])->name('admin.service.index');
Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
Route::post('/admin/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
Route::delete('/admin/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.service.delete'); 

// Blog Category Routes
Route::get('admin/blog-category', [BlogCategoryController::class, 'index'])->name('admin.blog_category.index');
Route::get('/admin/blog-category/create', [BlogCategoryController::class, 'create'])->name('admin.blog_category.create');
Route::post('/admin/blog-category/store', [BlogCategoryController::class, 'store'])->name('admin.blog_category.store');
Route::get('/admin/blog-category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('admin.blog_category.edit');
Route::post('/admin/blog-category/update/{id}', [BlogCategoryController::class, 'update'])->name('admin.blog_category.update');
Route::delete('/admin/blog-category/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('admin.blog_category.delete');

// Blog Routes
Route::get('admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
Route::delete('/admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

// Award Routes
Route::get('/award', [AwardController::class, 'index'])->name('admin.award.index');
Route::get('/award/create', [AwardController::class, 'create'])->name('admin.award.create');
Route::post('/award/store', [AwardController::class, 'store'])->name('admin.award.store');
Route::get('/award/edit/{id}', [AwardController::class, 'edit'])->name('admin.award.edit');
Route::post('/award/update/{id}', [AwardController::class, 'update'])->name('admin.award.update');
Route::delete('/award/delete/{id}', [AwardController::class, 'destroy'])->name('admin.award.delete');

// Skill Routes
Route::get('/skills', [SkillController::class, 'index'])->name('admin.skill.index');
Route::get('/skills/create', [SkillController::class, 'create'])->name('admin.skill.create');
Route::post('/skills/store', [SkillController::class, 'store'])->name('admin.skill.store');
Route::get('/skills/edit/{id}', [SkillController::class, 'edit'])->name('admin.skill.edit');
Route::post('/skills/update/{id}', [SkillController::class, 'update'])->name('admin.skill.update');
Route::delete('/skills/delete/{id}', [SkillController::class, 'destroy'])->name('admin.skill.delete');

// Education Routes
Route::get('/education', [EducationController::class, 'index'])->name('admin.education.index');
Route::get('/education/create', [EducationController::class, 'create'])->name('admin.education.create');
Route::post('/education/store', [EducationController::class, 'store'])->name('admin.education.store');
Route::get('/education/edit/{id}', [EducationController::class, 'edit'])->name('admin.education.edit');
Route::post('/education/update/{id}', [EducationController::class, 'update'])->name('admin.education.update');
Route::delete('/education/delete/{id}', [EducationController::class, 'destroy'])->name('admin.education.delete');


Route::get('admin/contact', [ContactController::class, 'index'])->name('admin.contact.index');
Route::post('/admin/contact/store', [ContactController::class, 'store'])->name('admin.contact.store');
Route::delete('/admin/contact/delete/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete');

Route::get('admin/setting', [SettingController::class, 'index'])->name('admin.setting.index');
Route::post('/admin/setting/store', [SettingController::class, 'store'])->name('admin.setting.store');


use App\Http\Controllers\Admin\SubscriberController;

Route::get('admin/subscribers', [SubscriberController::class, 'index'])
    ->name('admin.subscriber.index');
    Route::delete('admin//subscribers/{id}', [SubscriberController::class, 'delete'])
    ->name('admin.subscriber.delete');


Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin logout route
Route::get('/admin/logout', [AdminDashboardController::class, 'destroy'])->name('admin.logout');

// Admin logout route
Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
// Profile update action
Route::get('/admin/profile/edit', [AdminDashboardController::class, 'profileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [AdminDashboardController::class, 'StoreProfile'])->name('admin.profile.store');

require __DIR__ . '/auth.php';
