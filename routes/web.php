<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController,DashboardController,Customer_loginController,CategoryController, Clinet_massageController, FrontendController, ProductController, ServiceController, SponsorController, VendorManageController};
use App\Models\Category;


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
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// website view controller

Route::get('/',  [FrontendController::class, 'front_root'])->name('customer.home');
Route::get('/contact',  [FrontendController::class, 'contact_page'])->name('contact.page');
Route::post('/contact',  [FrontendController::class, 'contact_page_post'])->name('contact.post');
Route::get('/product/details/{id}',  [FrontendController::class, 'product_details'])->name('product.details');
Route::get('/category/grid/{id}',  [FrontendController::class, 'category_grid'])->name('category.grid');
Route::get('/product/cart',  [FrontendController::class, 'product_add_cart'])->name('product.add.cart');

// website view controller

// Dashboard part start....................

// DashboardController Started

// profile route started
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::post('/image-upload', [DashboardController::class, 'image_upload'])->name('image-upload');
Route::post('/data_update', [DashboardController::class, 'data_update'])->name('data_update');
Route::post('/change/password', [DashboardController::class, 'change_profile_password'])->name('change.password');
// profile route end

Route::middleware(['isnotadmin'])->group(function () {

    // users route started
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::post('/users', [DashboardController::class, 'admin_register'])->name('users.promote');
    Route::get('/active/status/{id}', [DashboardController::class, 'vendor_status'])->name('vendor.status');
    // users route end

    // category route started
    Route::resource('/category', CategoryController::class);
    // category route end
    // service part route started
    Route::resource('/service', ServiceController::class);
    Route::get('/service/status/{id}', [ServiceController::class,  'status'])->name('service.status');
    // service part route started
    // sponsor route started
    Route::resource('/sponsor', SponsorController::class);
    Route::get('/sponsor/status/{id}', [SponsorController::class,  'status'])->name('sponsor.status');
    // sponsor route end
    // client massage box start
    Route::resource('/client-massage', Clinet_massageController::class);
    // client massage box end
});

    // Vendor Dashboard Items Start

    // Product Start
    Route::resource('/products', ProductController::class);
    Route::get('/products/add/variation', [ProductController::class, 'variation'])->name('products.variation');
    Route::post('/products/add/size/variation', [ProductController::class, 'variation_size_add'])->name('products.size.variation');
    Route::post('/products/add/color/variation', [ProductController::class, 'variation_color_add'])->name('products.color.variation');
    Route::get('/products/inventory/{id}', [ProductController::class, 'inventory_add'])->name('products.inventory.add');
    Route::post('/products/inventory/add/{id}', [ProductController::class, 'inventory_add_post'])->name('products.inventory.post');
    // Product end

    // Vendor Dashboard Items end

    // Dashboard part end..............
    //




// E-commerce part start................

// Frontend_manageController Started

// customer register part start
// Route::get('/customer/dashboard', [Customer_loginController::class, 'customer_dash'])->name('customer.dashboard');
Route::get('/customer/login/register', [Customer_loginController::class, 'customer_login'])->name('customer.login.register');
Route::post('/customer/data/insert', [Customer_loginController::class, 'registration_insert'])->name('login.insert');
Route::post('/customer/data/login', [Customer_loginController::class, 'login'])->name('custom.login');
// customer register part end

// vendor register part start
Route::get('/vendor/registration', [VendorManageController::class, 'vendor_view'])->name('vendor.registration');
Route::post('/vendor/login', [VendorManageController::class, 'vendor_login'])->name('vendor.login');
Route::post('/vendor/registration', [VendorManageController::class, 'vendor_registration'])->name('vendor.register');
// vendor register part end

// E-commerce part end............
