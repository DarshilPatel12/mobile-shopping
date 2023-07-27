<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';




//Admin route
Route::prefix('admin')->group(function () {
    Route::controller(\App\Http\Controllers\admin\AuthController::class)->group(function () {
        Route::get('/', 'admin_login_form')->name('admin.login');
        Route::post('/admin_login', 'admin_login');
       
    });


    Route::group(['middleware' => 'admin'], function () {
        Route::controller(\App\Http\Controllers\admin\HomeController::class)->group(function () {
            Route::get('/home', 'show_data')->name('admin.home');
            Route::post('/edit_image/{id}', 'edit_image');
            Route::post('/edit_about_home/{id}', 'edit_about_home');
        });

        Route::controller(\App\Http\Controllers\admin\ProductController::class)->group(function () {
            Route::get('/product', 'show_product')->name('admin.product');
            Route::get('/product/add', 'add_form')->name('admin.product.add');
            Route::get('/product/edit/{id}', 'edit_form')->name('admin.product.edit');
            Route::post('/add_product', 'add_product');
            Route::post('/edit_product/{id}', 'edit_product');
            Route::get('/delete_product/{id}', 'delete_product');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category', 'show_category')->name('admin.category');
            Route::get('/category/add', 'add_form')->name('admin.category.add');
            Route::get('/category/edit/{id}', 'edit_form')->name('admin.category.edit');
            Route::post('/add_category', 'add_category');
            Route::post('/edit_category/{id}', 'edit_category');
            Route::get('/delete_category/{id}', 'delete_category');
        });

        Route::controller(\App\Http\Controllers\admin\AboutController::class)->group(function () {
            Route::get('/about', 'show_about')->name('admin.about');
            Route::post('/edit_about/{id}', 'edit_about');
        });

        Route::controller(\App\Http\Controllers\admin\ContactController::class)->group(function () {
            Route::get('/contact', 'show_contact')->name('admin.contact');
            Route::get('/delete_contact/{id}', 'delete_contact');
        });

        Route::controller(\App\Http\Controllers\admin\CartController::class)->group(function () {
            Route::get('/order', 'show_order')->name('admin.order');
            Route::get('/delivered/{id}', 'delivered');
        });

        Route::controller(\App\Http\Controllers\admin\ProfileController::class)->group(function () {
            Route::get('/change_password_form', 'change_password_form');
            Route::post('/change_password', 'change_password');
        });
        
        Route::get('/add_admin_form', [\App\Http\Controllers\admin\AuthController::class ,'add_admin_form']);
        Route::post('/add_admin', [\App\Http\Controllers\admin\AuthController::class ,'add_admin']);
        Route::get('/admin_logout', [\App\Http\Controllers\admin\AuthController::class ,'admin_logout'])->name('admin.logout');
    });
});






// Home route
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'show_home')->name('home');
});


// Product route
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'show_product_user')->name('product');
    Route::get('/select_category', 'select_category');
    Route::get('/view_product/{id}', 'view_product');
});



// About route
Route::controller(AboutController::class)->group(function () {
    Route::get('/aboutus', 'show_about')->name('about');
});


// Contact route
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact_form')->name('contact');
    Route::post('/add_contact', 'add_contact');
});


// Cart route
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart_data')->name('cart');
    Route::get('/add_to_cart/{id}', 'add_to_cart');
    Route::get('/remove_to_cart/{id}', 'remove_to_cart');
    Route::get('/cash_order', 'cash_order');
    Route::get('/stripe/{totalprice}', 'stripe');
    Route::post('/stripe/{totalprice}', 'stripePost')->name('stripe.post');
    Route::get('/show_order', 'show_order_user');
    Route::get('/cancle_order/{id}', 'cancle_order');
});