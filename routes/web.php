<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\CollectionController;
use App\Http\Controllers\backend\HotItemController;
use App\Http\Controllers\backend\MainController;
use App\Http\Controllers\backend\OfferController;
use App\Http\Controllers\backend\OurBlogController;
use App\Http\Controllers\backend\ProductColorController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\backend\ProductSetColorController;
use App\Http\Controllers\backend\ProductSetSizeController;
use App\Http\Controllers\backend\ProductSizeController;
use App\Http\Controllers\backend\ReviewController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\WishController;
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

     Route::get('/adminpanel', [AdminController::class , 'admin' ])->name('admin');

     Route::prefix('main')->group(function () {
        Route::get('/view', [MainController::class, 'mainView'])->name('all.main');
        Route::get('/add', [MainController::class, 'mainAdd'])->name('main.add');
        Route::post('/store', [MainController::class, 'mainStore'])->name('main.store');
        Route::get('/edit/{id}', [MainController::class, 'mainEdit'])->name('main.edit');
        Route::post('/update/{id}', [MainController::class, 'mainUpdate'])->name('main.update');
        Route::get('/delete/{id}', [MainController::class, 'mainDelete'])->name('main.delete');
    });
    Route::prefix('offer')->group(function () {
        Route::get('/view', [OfferController::class, 'offerView'])->name('all.offer');
        Route::get('/add', [OfferController::class, 'offerAdd'])->name('offer.add');
        Route::post('/store', [OfferController::class, 'offerStore'])->name('offer.store');
        Route::get('/edit/{id}', [OfferController::class, 'offerEdit'])->name('offer.edit');
        Route::post('/update/{id}', [OfferController::class, 'offerUpdate'])->name('offer.update');
        Route::get('/delete/{id}', [OfferController::class, 'offerDelete'])->name('offer.delete');
    });
    Route::prefix('cetegory')->group(function () {
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::get('/add', [CategoryController::class, 'categoryAdd'])->name('category.add');
        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    });
    Route::prefix('product')->group(function () {
        Route::get('/view', [ProductController::class, 'productView'])->name('all.product');
        Route::get('/add', [ProductController::class, 'productAdd'])->name('product.add');
        Route::post('/store', [ProductController::class, 'productStore'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
    });
    Route::prefix('collection')->group(function () {
        Route::get('/view', [CollectionController::class, 'collectionView'])->name('all.collection');
        Route::get('/add', [CollectionController::class, 'collectionAdd'])->name('collection.add');
        Route::post('/store', [CollectionController::class, 'collectionStore'])->name('collection.store');
        Route::get('/edit/{id}', [CollectionController::class, 'collectionEdit'])->name('collection.edit');
        Route::post('/update/{id}', [CollectionController::class, 'collectionUpdate'])->name('collection.update');
        Route::get('/delete/{id}', [CollectionController::class, 'collectionDelete'])->name('collection.delete');
    });
    Route::prefix('hotitem')->group(function () {
        Route::get('/view', [HotItemController::class, 'hotitemView'])->name('all.hotitem');
        Route::get('/add', [HotItemController::class, 'hotitemAdd'])->name('hotitem.add');
        Route::post('/store', [HotItemController::class, 'hotitemStore'])->name('hotitem.store');
        Route::get('/edit/{id}', [HotItemController::class, 'hotitemEdit'])->name('hotitem.edit');
        Route::post('/update/{id}', [HotItemController::class, 'hotitemUpdate'])->name('hotitem.update');
        Route::get('/delete/{id}', [HotItemController::class, 'hotitemDelete'])->name('hotitem.delete');
    });
    Route::prefix('ourblog')->group(function () {
        Route::get('/view', [OurBlogController::class, 'ourblogView'])->name('all.ourblog');
        Route::get('/add', [OurBlogController::class, 'ourblogAdd'])->name('ourblog.add');
        Route::post('/store', [OurBlogController::class, 'ourblogStore'])->name('ourblog.store');
        Route::get('/edit/{id}', [OurBlogController::class, 'ourblogEdit'])->name('ourblog.edit');
        Route::post('/update/{id}', [OurBlogController::class, 'ourblogUpdate'])->name('ourblog.update');
        Route::get('/delete/{id}', [OurBlogController::class, 'ourblogDelete'])->name('ourblog.delete');
    });
    Route::prefix('productimage')->group(function () {
        Route::get('/view', [ProductImageController::class, 'productimageView'])->name('all.productimage');
        Route::get('/add', [ProductImageController::class, 'productimageAdd'])->name('productimage.add');
        Route::post('/store', [ProductImageController::class, 'productimageStore'])->name('productimage.store');
        Route::get('/edit/{id}', [ProductImageController::class, 'productimageEdit'])->name('productimage.edit');
        Route::post('/update/{id}', [ProductImageController::class, 'productimageUpdate'])->name('productimage.update');
        Route::get('/delete/{id}', [ProductImageController::class, 'productimageDelete'])->name('productimage.delete');
    });
    Route::prefix('productcolor')->group(function () {
        Route::get('/view', [ProductColorController::class, 'productcolorView'])->name('all.productcolor');
        Route::get('/add', [ProductColorController::class, 'productcolorAdd'])->name('productcolor.add');
        Route::post('/store', [ProductColorController::class, 'productcolorStore'])->name('productcolor.store');
        Route::get('/edit/{id}', [ProductColorController::class, 'productcolorEdit'])->name('productcolor.edit');
        Route::post('/update/{id}', [ProductColorController::class, 'productcolorUpdate'])->name('productcolor.update');
        Route::get('/delete/{id}', [ProductColorController::class, 'productcolorDelete'])->name('productcolor.delete');
    });
    Route::prefix('productsetcolor')->group(function () {
        Route::get('/view', [ProductSetColorController::class, 'productsetcolorView'])->name('all.productsetcolor');
        Route::get('/add', [ProductSetColorController::class, 'productsetcolorAdd'])->name('productsetcolor.add');
        Route::post('/store', [ProductSetColorController::class, 'productsetcolorStore'])->name('productsetcolor.store');
        Route::get('/edit/{id}', [ProductSetColorController::class, 'productsetcolorEdit'])->name('productsetcolor.edit');
        Route::post('/update/{id}', [ProductSetColorController::class, 'productsetcolorUpdate'])->name('productsetcolor.update');
        Route::get('/delete/{id}', [ProductSetColorController::class, 'productsetcolorDelete'])->name('productsetcolor.delete');
    });
    Route::prefix('productsize')->group(function () {
        Route::get('/view', [ProductSizeController::class, 'productsizeView'])->name('all.productsize');
        Route::get('/add', [ProductSizeController::class, 'productsizeAdd'])->name('productsize.add');
        Route::post('/store', [ProductSizeController::class, 'productsizeStore'])->name('productsize.store');
        Route::get('/edit/{id}', [ProductSizeController::class, 'productsizeEdit'])->name('productsize.edit');
        Route::post('/update/{id}', [ProductSizeController::class, 'productsizeUpdate'])->name('productsize.update');
        Route::get('/delete/{id}', [ProductSizeController::class, 'productsizeDelete'])->name('productsize.delete');
    });
    Route::prefix('productsetsize')->group(function () {
        Route::get('/view', [ProductSetSizeController::class, 'productsetsizeView'])->name('all.productsetsize');
        Route::get('/add', [ProductSetSizeController::class, 'productsetsizeAdd'])->name('productsetsize.add');
        Route::post('/store', [ProductSetSizeController::class, 'productsetsizeStore'])->name('productsetsize.store');
        Route::get('/edit/{id}', [ProductSetSizeController::class, 'productsetsizeEdit'])->name('productsetsize.edit');
        Route::post('/update/{id}', [ProductSetSizeController::class, 'productsetsizeUpdate'])->name('productsetsize.update');
        Route::get('/delete/{id}', [ProductSetSizeController::class, 'productsetsizeDelete'])->name('productsetsize.delete');
    });
    Route::prefix('review')->group(function () {
        Route::get('/view', [ReviewController::class, 'reviewView'])->name('all.review');
        Route::get('/add', [ReviewController::class, 'reviewAdd'])->name('review.add');
        Route::post('/store', [ReviewController::class, 'reviewStore'])->name('review.store');
        Route::get('/edit/{id}', [ReviewController::class, 'reviewEdit'])->name('review.edit');
        Route::post('/update/{id}', [ReviewController::class, 'reviewUpdate'])->name('review.update');
        Route::get('/delete/{id}', [ReviewController::class, 'reviewDelete'])->name('review.delete');
    });





//end admin panel route
// pages  view blade route

Route::get('/', [IndexController::class , 'index' ])->name('index');
Route::get('/shop/details/{product_id}', [IndexController::class, 'shopdetailpage'])->name('main.show');
Route::get('/order', [IndexController::class, 'orderPage'])->name('order.page');
Route::get('/cart', [IndexController::class, 'cartPage'])->name('cart.page');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact.page');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog.page');
Route::get('/wish', [IndexController::class, 'wishPage'])->name('wish.page');



Route::get('/checkout' , [OrderController::class, 'viewCheckout'])->name('checkout');
// if(Session::get('get')){
      Route::prefix('order')->group(function () {
        Route::post('addorder' , [OrderController::class, 'addOrder'])->name('add.order');
        Route::get('delete{id}' ,[OrderController::class, 'deleteOrder'])->name('delete.order');
    });
    Route::prefix('cart')->group(function () {
        Route::post('addcart' , [CartController::class, 'addCart'])->name('add.cart');
        Route::get('delete{id}' , [CartController::class, 'deleteCart'])->name('delete.cart');
    });
    Route::prefix('wish')->group(function () {
        Route::get('addwish/{product_id}' , [WishController::class, 'addWish'])->name('add.wish');
        Route::get('delete/{product_id}' , [WishController::class, 'deleteWish'])->name('delete.wish');
    });

Route::get('/client/login', [ClientController::class, 'loginView'])->name('client.login');
Route::post('/client/register', [ClientController::class, 'registerClient'])->name('client.register');
Route::post('/login/client', [ClientController::class, 'loginClient'])->name('login.client');
Route::get('/client/logout', [ClientController::class, 'logoutClient'])->name('client.logout');

Route::get('/regster/client/{product_id}', [ClientController::class, 'addClientRating'])->name('add.client');
