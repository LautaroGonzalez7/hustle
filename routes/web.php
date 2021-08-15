<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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


Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [Controllers\ProductController::class, 'products'])->name('products');
Route::get('/single-product/{id}', [Controllers\ProductController::class, 'singleProduct'])->name('single.product');

//Session
Route::post('/session/product', [Controllers\Session\SessionController::class, 'addProduct'])->name('session.addProduct.post');
Route::post('/session/message', [Controllers\Session\SessionController::class, 'addMessage'])->name('session.addMessage.post');
Route::post('/session/shipment', [Controllers\Session\SessionController::class, 'addShipmentInformation'])->name('session.addShipmentInformation.post');

//Steps
Route::get('/steph-one', [Controllers\Steps\StepController::class, 'stepOne'])->name('stepOne.get');
Route::get('/steph-two', [Controllers\Steps\StepController::class, 'stepTwo'])->name('stepTwo.get');
Route::get('/steph-three', [Controllers\Steps\StepController::class, 'stepThree'])->name('stepThree.get');

//Orders
Route::get('/order', [Controllers\Order\OrderController::class, 'addOrder'])->name('addOrder');
Route::get('/order-stripe', [Controllers\Order\OrderController::class, 'addStripeOrder'])->name('addStripeOrder');

//Stripe
Route::get('/stripe', [Controllers\Stripe\StripeController::class, 'checkout'])->name('stripe.get');

//Auth
Route::get('/dashboard/login', [Controllers\Auth\DashboardLoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [Controllers\Auth\RegisterController::class, 'register']);

Route::middleware(['auth'])->group(
    static function (Router $router) {
        // SPA
        $router->get('/app{any}', [Controllers\SpaController::class, '__invoke'])->where('any', '.*')->name('app');

        // CATEGORY
        $router->post('/category', [Controllers\Category\CreateCategoryController::class, '__invoke'])->name('category.post');
        $router->put('/category/{id}', [Controllers\Category\UpdateCategoryController::class, '__invoke'])->name('category.put');
        $router->get('/category/{id}', [Controllers\Category\GetCategoryController::class, '__invoke'])->name('category.get');
        $router->get('/category', [Controllers\Category\IndexCategoryController::class, '__invoke'])->name('category.get');

        // PRODUCT
        $router->post('/product', [Controllers\Product\CreateProductController::class, '__invoke'])->name('product.post');
        $router->put('/product/{id}', [Controllers\Product\UpdateProductController::class, '__invoke'])->name('product.put');
        $router->get('/product/{id}', [Controllers\Product\GetProductController::class, '__invoke'])->name('product.get');
        $router->get('/product', [Controllers\Product\IndexProductController::class, '__invoke'])->name('product.getAll');
        $router->post('/product/{id}/images', [Controllers\Product\AddImagesProductController::class, '__invoke'])->name('product.images');

        // COMPLEMENT
        $router->post('/complement', [Controllers\Complement\CreateComplementController::class, '__invoke'])->name('complement.post');
        $router->put('/complement/{id}', [Controllers\Complement\UpdateComplementController::class, '__invoke'])->name('complement.put');
        $router->get('/complement/{id}', [Controllers\Complement\GetComplementController::class, '__invoke'])->name('complement.get');
        $router->get('/complement', [Controllers\Complement\IndexComplementController::class, '__invoke'])->name('complement.getAll');
        $router->post('/complement/{id}/images', [Controllers\Complement\AddImagesComplementController::class, '__invoke'])->name('complement.images');
    }
);
