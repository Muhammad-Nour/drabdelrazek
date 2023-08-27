<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchGalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    //FrontController
    Route::controller(FrontController::class)->group(function () {
        Route::get('/' , 'index')->name('home');
        Route::get('products/{category}' , 'products')->name('front.products');
        Route::get('product/details/{product}' , 'productDetails')->name('front.productDetails');
        Route::get('projects' , 'projects')->name('front.projects');
        Route::get('projects/details/{project}' , 'projectDetails')->name('front.projectDetails');
        Route::get('about' , 'about')->name('front.about');
        Route::get('contact' , 'contact')->name('front.contact');
    });
	//end FrontController

Route::middleware('auth:admin')->group(function(){

    Route::get('admin', [DashboardController::class, 'index'])->name('admindashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth']], function() {
        Route::resource('admins', AdminController::class);
        Route::resource('roles', RoleController::class);
    });
});

// admin dashboard
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function() {
    Route::get('products/{product}/editMainImages',[ProductController::class,'editMainImages'])->name('product.editMainImages');

    Route::put('products/{product}/updateMainImage',[ProductController::class,'updateMainImage'])->name('product.updateMainImage');

    Route::post('projectGallery/{project}/store',[ProjectGalleryController::class,'store'])->name('projectGallery.store');

    Route::get('projectGallery/{gallery}/edit',[ProjectGalleryController::class,'edit'])->name('projectGallery.edit');

    Route::put('projectGallery/{gallery}/update',[ProjectGalleryController::class,'update'])->name('projectGallery.update');

    Route::delete('projectGallery/{gallery}/destroy',[ProjectGalleryController::class,'destroy'])->name('projectGallery.destroy');

    Route::PUT('products/{product}/deleteMainImage',[ProductController::class,'deleteMainImages'])->name('product.deleteMainImages');

    Route::post('products/add/images',[ProductController::class,'addImage'])->name('add.ProductImages');
    Route::get('products/{product}/details',[ProductController::class,'getDetails'])->name('product.details');

    Route::post('projects/add/images',[ProjectController::class,'addImage'])->name('add.ProjectImages');
    Route::get('projects/{project}/details',[ProjectController::class,'getDetails'])->name('project.details');

	Route::post('branches/add/images',[BranchController::class,'addImage'])->name('add.branchImages');
    Route::get('branches/{branch}/details',[BranchController::class,'getDetails'])->name('branch.details');

    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('galleries', ProductGalleryController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('customs', CustomController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('contacts', ContactController::class);
	Route::resource('news', NewsController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('branchGallery', BranchGalleryController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require_once __DIR__ .'/jetstreamRoute.php';
require_once __DIR__ .'/routes.php';

}); //end LaravelLocalization
