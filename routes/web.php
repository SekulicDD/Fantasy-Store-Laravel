<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\LoginPageController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\AdminPanelPageController;
use \App\Http\Controllers\AdminProductsController;
use \App\Http\Controllers\AdminUsersController;
use \App\Http\Controllers\AdminCategoriesController;
use \App\Http\Controllers\AdminMainCategoriesController;
use \App\Http\Controllers\CheckoutController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\LogController;
use \App\Http\Controllers\AdminOrdersController;
use \App\Http\Controllers\ContactController;
use \App\Http\Controllers\AdminMessageController;
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

//home-------
Route::get('/', [HomeController::class, 'index'])->name('home');

//shop-------
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/productsAjax/{page?}/{id?}/{order?}/{search?}', [ProductsController::class, 'showProducts'])->name('productsAjax');

//product-details------
Route::get('/products/{id?}', [ProductsController::class, 'getOneProduct'])->name('details');

//modal---------
Route::post('/modal', [HomeController::class, 'getModal'])->name("modal");

//contact---
Route::get('/contact', [ContactController::class, 'index'])->name("contact");
Route::post('/contact/send', [ContactController::class, 'sendMessage'])->name("sendMessage");

//author---
Route::get('/author', [HomeController::class, 'author'])->name("author");

//comments---
Route::get('/showCommentsAjax', [CommentController::class, 'showComments'])->name('showComments');

//za ulogovane korisnike---
Route::middleware(["loggedIn"])->group(function (){
    Route::post('/cartAddAjax/{id?}', [CartController::class, 'store'])->name('addToCart');
    Route::post('/cartDeleteAjax/{id?}', [CartController::class, 'delete'])->name('deleteFromCart');
    Route::get('/logoutUser', [LoginController::class, 'logout'])->name("logout");
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order', [CheckoutController::class, 'addOrder'])->name('order');
    Route::post('/comment', [CommentController::class, 'makeComment'])->name('comment');
});


//ako je izlogovan korisnik---
Route::middleware(["loggedOut"])->group(function (){
    Route::get('/login', [LoginPageController::class, 'index'])->name('loginPage');
    Route::post('/loginUser', [LoginController::class, 'login'])->name("login");
    Route::post("/registerUser",[RegisterController::class, 'register'])->name("register");
    Route::get('/admin/login', [AdminPanelPageController::class, 'loginPage'])->name("adminLoginPage");
});


//ADMIN RUTE------------------------------------------------------------------------------------------------
Route::middleware(["isAdmin"])->group(function () {
    Route::get('/admin/', [AdminPanelPageController::class, 'homePage'])->name("adminHomePage");
    Route::get('/admin/products', [AdminPanelPageController::class, 'productsPage'])->name("adminProductsPage");
    Route::get('/admin/users', [AdminPanelPageController::class, 'usersPage'])->name("adminUsersPage");
    Route::get('/admin/categories', [AdminPanelPageController::class, 'categoryPage'])->name("adminCategoryPage");
    Route::get('/admin/mainCategories', [AdminPanelPageController::class, 'mainCategoryPage'])->name("adminMainCategoryPage");
    Route::get('/admin/orders', [AdminPanelPageController::class, 'ordersPage'])->name("adminOrdersPAge");
    Route::get('admin/logs', [LogController::class, 'showLog'])->name('showLog');
    Route::get('admin/messages', [AdminPanelPageController::class, 'messagesPage'])->name('adminMessagesPage');
//products
    Route::get('/admin/product', [AdminProductsController::class, 'getProductEdit'])->name("getEdit");
    Route::get('/admin/productsAjax/{page?}', [AdminProductsController::class, 'showProducts']);

    Route::post('/admin/product/edit', [AdminProductsController::class, 'editProduct'])->name("editProduct");
    Route::post('/admin/product/delete', [AdminProductsController::class, 'deleteProduct']);
    Route::get('/admin/product/insertForm', [AdminProductsController::class, 'getInsertForm']);
    Route::post('/admin/product/insert', [AdminProductsController::class, 'insertProduct'])->name("adminInsertProduct");

//users
    Route::get('/admin/user', [AdminUsersController::class, 'getUserEdit'])->name("getUserEdit");
    Route::get('/admin/usersAjax/{page?}', [AdminUsersController::class, 'showUsers']);

    Route::post('/admin/user/edit', [AdminUsersController::class, 'editUser'])->name("editUser");
    Route::post('/admin/user/delete', [AdminUsersController::class, 'deleteUser']);

//categories
    Route::get('/admin/category', [AdminCategoriesController::class, 'getCategoryEdit'])->name("getCategoryEdit");
    Route::get('/admin/categoriesAjax/{page?}', [AdminCategoriesController::class, 'showCategories']);

    Route::post('/admin/category/edit', [AdminCategoriesController::class, 'editCategory'])->name("editCategory");
    Route::post('/admin/category/delete', [AdminCategoriesController::class, 'deleteCategory']);
    Route::get('/admin/category/insertForm', [AdminCategoriesController::class, 'getInsertForm']);
    Route::post('/admin/category/insert', [AdminCategoriesController::class, 'insertCategory'])->name("adminInsertCategory");

//mainCategories
    Route::get('/admin/mainCategory', [AdminMainCategoriesController::class, 'getMainCategoryEdit'])->name("getMainCategoryEdit");
    Route::get('/admin/mainCategoriesAjax/{page?}', [AdminMainCategoriesController::class, 'showMainCategories']);

    Route::post('/admin/mainCategory/edit', [AdminMainCategoriesController::class, 'editMainCategory'])->name("editMainCategory");
    Route::post('/admin/mainCategory/delete', [AdminMainCategoriesController::class, 'deleteMainCategory']);
    Route::post('/admin/mainCategory/insert', [AdminMainCategoriesController::class, 'insertMainCategory'])->name("adminInsertMainCategory");

//orders
    Route::get('/admin/order', [AdminOrdersController::class, 'getOrderEdit'])->name("getEdit");
    Route::get('/admin/ordersAjax/{page?}', [AdminOrdersController::class, 'showOrders']);

    Route::post('/admin/order/edit', [AdminOrdersController::class, 'editOrder'])->name("editOrder");
    Route::post('/admin/order/delete', [AdminOrdersController::class, 'deleteOrder']);
    Route::get('/admin/order/insertForm', [AdminOrdersController::class, 'getInsertForm']);
    Route::post('/admin/order/insert', [AdminOrdersController::class, 'insertOrder'])->name("adminInsertOrder");

//messages
    Route::get('/admin/messageAjax/{page?}', [AdminMessageController::class, 'showMessages']);
    Route::post('/admin/message/delete', [AdminMessageController::class, 'deleteMessage']);
});

