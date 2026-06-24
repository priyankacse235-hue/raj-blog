<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticationcontroller;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Profilecontroller;
use App\Http\Controllers\Blogcontroller;
use App\Http\Controllers\BlogMasterController;
use App\Http\Controllers\ManageContentController;
use App\Http\Controllers\Front_endController;
use App\Http\Controllers\ManageCategoryController; 
use App\Http\Controllers\GenralSettingController;
use App\Http\Controllers\SocailMediaMasterController; 
use App\Http\Controllers\walletController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HappyCustomersControllers;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\SearchController;

//Profile
Route::post('admin/profile/update', [Profilecontroller::class, 'update']);
 //save template

Route::post('/save-template', [TemplateController::class, 'save_file']);
//Search
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search-suggestions', [SearchController::class, 'suggestions']);
//Toggle
Route::get('admin/blog-status/{id}', [BlogMasterController::class, 'changeStatus']);
// registration route 
Route::get('registration/{referral?}', [Authenticationcontroller::class, 'registration']);
Route::post('registration', [Authenticationcontroller::class, 'register_user']);
// login route
Route::get('login', [Authenticationcontroller::class, 'login_view'])->name('login');
Route::post('login', [Authenticationcontroller::class, 'auth_login']);
Route::get('logout', [Authenticationcontroller::class, 'logout']);

// admin routes 
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('dashboard', [AdminDashboardController::class, 'index']);

    // templatesp
    Route::get('templates', [TemplateController::class, 'index']);
    Route::get('create-template', [TemplateController::class, 'create_template']);
    Route::post('create-template', [TemplateController::class, 'save_template']);
    Route::get('delete-template/{id}', [TemplateController::class, 'destroy']);
    Route::get('design-template/{id}', [TemplateController::class, 'design']); 
    Route::get('template/status/{id}', [TemplateController::class, 'change_status']);
    Route::get('template-edit/{id}', [TemplateController::class, 'edit_template']);
    Route::post('template-edit/{id}', [TemplateController::class, 'update_template']);
    Route::POST('template_load_more', [TemplateController::class, 'template_load_more']);

    Route::post('upload-user-gallery', [TemplateController::class, 'upload']);
    Route::get('get-user-gallery', [TemplateController::class, 'list']);

    // blog route
    Route::get('admin/blog/status/{id}', [BlogMasterController::class, 'changeStatus']);
    Route::resource('blog', BlogMasterController::class);
    Route::put('blog/seo/{id}', [BlogMasterController::class, 'blog_seo']);
    Route::get('blog-duplicate/{id}', [BlogMasterController::class, 'duplicate_blog']);
    Route::get('blog_load_more', [BlogMasterController::class, 'blog_load_more']);
    
    Route::resource('category', ManageCategoryController::class);
    Route::get('category/status/{id}', [ManageCategoryController::class, 'change_status']);
    Route::get('category_load_more', [ManageCategoryController::class, 'category_load_more']);
    

    // Route::get('blog_content/{id}', [ManageContentController::class, 'index']);
    // Route::get('blog_content/create/{id}', [ManageContentController::class, 'create_content']);
    // Route::post('blog_content/create/{id}', [ManageContentController::class, 'create_content']);
    // Route::get('blog_content/edit/{id}/{blog_id}', [ManageContentController::class, 'update_content']);
    // Route::post('blog_content/edit/{id}/{blog_id}', [ManageContentController::class, 'update_content']);
    // Route::get('content_status/{id}', [ManageContentController::class, 'change_status']);
    // Route::get('content_delete/{id}', [ManageContentController::class, 'content_delete']);

    // genral setting route
    Route::get('genral-setting', [AdminDashboardController::class, 'genral_setting']);
    Route::post('genral-setting', [AdminDashboardController::class, 'genral_setting']);
    
    Route::get('users', [AdminDashboardController::class, 'all_users']);
    Route::get('user/status/{id}', [AdminDashboardController::class, 'user_status']);

    Route::get('contacts', [AdminDashboardController::class, 'all_contacts']);
    Route::get('contacts_load_more', [AdminDashboardController::class, 'contacts_load_more']);

    // spam report route 
    Route::get('spam-report', [AdminDashboardController::class, 'spam_report']);
    Route::get('blog-block/{url}', [AdminDashboardController::class, 'blog_block']);
    Route::get('blog-unblock/{url}', [AdminDashboardController::class, 'unblog_block']);
    Route::get('request-activation/{id}', [AdminDashboardController::class, 'request_activation']);

    // route for manage socail media account 
    Route::resource('social-media', SocailMediaMasterController::class);

    // invite your friend link
    Route::get('profile/{tab_name}', [Authenticationcontroller::class, 'invite_to_friend']);
    Route::post('invite-to-friend', [Authenticationcontroller::class, 'invite_to_friend_post']);
    Route::resource('wallet-setting', walletController::class);

    // ck editer image upload 
    Route::post('image-upload', [BlogMasterController::class, 'image_upload']);

    // happy customers route
    Route::resource('happy-customers', HappyCustomersControllers::class);

    // change status
    Route::post('change-status', [AjaxController::class, 'change_status']);
    // Route::get('404', [AdminDashboardController::class, 'not_found']);
    Route::fallback([AdminDashboardController::class, 'not_found']);

});

// defualt route
Route::get('/', [Front_endController::class, 'index'])->name('home');
Route::get('about', [Front_endController::class, 'about']);
Route::get('contact', [Front_endController::class, 'contact']);
Route::post('contact', [Front_endController::class, 'submit_contact']);
Route::get('blogs', [Front_endController::class, 'all_blogs']);
Route::get('templates', [Front_endController::class, 'templates']);
Route::get('{category}/{slug}', [Front_endController::class, 'blog_details']);
Route::post('add_view_count', [Front_endController::class, 'add_view_count']);
Route::get('404', [Front_endController::class, 'not_found']);
Route::get('privacy-policy', [Front_endController::class, 'privacy_policy']);
Route::get('terms-and-conditions', [Front_endController::class, 'terms']);
Route::post('spam-report', [AjaxController::class, 'spam_report']);
Route::post('post-comment', [AjaxController::class, 'post_comment']);
Route::post('load_comments', [AjaxController::class, 'load_comments']);
Route::get('happy-birthday-didi', [TemplateController::class, 'load_file']);
Route::get('trix-try', [TemplateController::class, 'trix_try']);
Route::post('save-template', [TemplateController::class, 'save_file']);

// site map for SEO optimization
Route::get('sitemap.xml', [Front_endController::class, 'site_map']);

// google auth routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
// Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);
