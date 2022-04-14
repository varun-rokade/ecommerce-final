<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminOrderController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    $admin = Admin::find(1);
    return view('admin.index', compact('admin'));
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){    


    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminProfileController::class, 'changepass'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminProfileController::class, 'updatepass'])->name('update.password');
});
//End admin
// Route::prefix('admin')->middleware('admin')->group(function () {
//     Route::get('/login', [AdminController::class, 'login']);
//     Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
// });

//User

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);

Route::get('/user/logout', [IndexController::class, 'logout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'profile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'store'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'changepass'])->name('change.password');

Route::post('/user/password/update', [IndexController::class, 'updatepass'])->name('user.password.update');

//End user

// Brands

Route::prefix('brand')->group(function ()
{
    Route::get('/view', [BrandController::class, 'allbrand'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    // Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/update', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});

//End Brand

// Category

Route::prefix('category')->group(function ()
{
    Route::get('/view', [CategoryController::class, 'allcategory'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //sub category
    Route::get('/sub/view', [SubCategoryController::class, 'allsubcategory'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    //end sub category

    // sub sub category
    Route::get('/sub/sub/view', [SubCategoryController::class, 'allsubsubcategory'])->name('all.subsubcategory');
    Route::post('/sub/sub/store', [SubCategoryController::class, 'storesub'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'editsub'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update', [SubCategoryController::class, 'updatesub'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'deletesub'])->name('subsubcategory.delete');
    // end sub sub category

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getsub']);
    Route::get('/subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getsubsub']);
});

// End category

// Product

Route::prefix('product')->group(function ()
{
    Route::get('/add', [ProductController::class, 'addproduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'manage'])->name('manage.product');
    Route::get('/edit/{id}', [ProductController::class, 'editproduct'])->name('product.edit');
    Route::get('/delete/{id}', [ProductController::class, 'deleteproduct'])->name('product.delete');
    Route::post('/update', [ProductController::class, 'updateproduct'])->name('product.update');
    Route::post('/image/update', [ProductController::class, 'updateimage'])->name('update.product.image');
    Route::post('/thumbnail/update', [ProductController::class, 'updatethumbnail'])->name('update.product.thumbnail');
    Route::get('/image/delete/{id}', [ProductController::class, 'deletemulti'])->name('delete.product.image');
    Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
});

//End Product

// Slider

Route::prefix('slider')->group(function ()
{
    Route::get('/view', [SliderController::class, 'sliderview'])->name('manage.slider');
    Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'active'])->name('slider.active');
});

// end slider

// reports

Route::prefix('reports')->group(function ()
{
    Route::get('/view', [ReportController::class, 'reports'])->name('all.reports');
    Route::post('/search/date', [ReportController::class, 'searchdate'])->name('search.date');
    Route::post('/search/month', [ReportController::class, 'searchmonth'])->name('search.month');
    Route::post('/search/year', [ReportController::class, 'searchyear'])->name('search.year');
});

// end reports

//all users

Route::prefix('allusers')->group(function ()
{
    Route::get('/view', [AdminProfileController::class, 'allusers'])->name('all.users');
    Route::get('/user/edit/{user_id}', [AdminProfileController::class, 'edituser'])->name('user.edit');
    Route::post('/user/update', [AdminProfileController::class, 'updateuser'])->name('user.update');
    Route::get('/user/delete/{user_id}', [AdminProfileController::class, 'deleteuser'])->name('user.delete');
});

// end all users

//frontend

//languages

Route::get('/language/english', [LanguageController::class, 'english'])->name('english');
Route::get('/language/hindi', [LanguageController::class, 'hindi'])->name('hindi');

//end languages

// product details

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productdetails']);

// end product details

// product tags

Route::get('/product/tag/{tag}', [IndexController::class, 'tagproduct']);

// end product tags

// sub cat product

Route::get('/subcategory/product/{id}/{slug}', [IndexController::class, 'subproduct']);

Route::get('/subsubcategory/product/{id}/{slug}', [IndexController::class, 'subsubproduct']);

// end sub cat product

// modal add to cart

Route::get('/product/view/modal/{id}', [IndexController::class, 'productview']);

//add to cart

Route::post('/cart/data/store/{id}', [CartController::class, 'addtocart']);

// mini cart

Route::get('/product/mini/cart', [CartController::class, 'minicart']);

Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeminicart']);

// end mini cart

// end add to cart

//end modal add to cart


// add to wishlist

Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'addtowishlist']);

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function(){
    Route::get('/wishlist', [WishlistController::class, 'viewwishlist'])->name('wishlist');

    Route::get('/get-wishlist', [WishlistController::class, 'getwishlist']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removewishlist']);

    Route::post('/stripe/order', [StripeController::class, 'order'])->name('stripe.order');

    Route::post('/cash/order', [CashController::class, 'cashorder'])->name('cash.order');

    Route::get('/my/orders', [OrderController::class, 'myorders'])->name('my.orders');

    Route::get('/order_details/{order_id}', [OrderController::class, 'orderdetails']);

    Route::get('/invoice/{order_id}', [OrderController::class, 'invoice']);

    Route::post('/return/order/{order_id}', [OrderController::class, 'returnorder'])->name('return.order');    

    Route::post('/cancel/order/{order_id}', [OrderController::class, 'cancelorder'])->name('order.cancel');    

    Route::post('/track/order', [OrderController::class, 'trackorder'])->name('track.order');
});

Route::get('/mycart', [CartController::class, 'mycart'])->name('mycart');

Route::get('/user/get-cart', [CartController::class, 'getcart']);

Route::get('/user/cart-remove/{rowId}', [CartController::class, 'removecart']);

Route::get('/cart-increment/{rowId}', [CartController::class, 'cartincrement']);

Route::get('/cart-decrement/{rowId}', [CartController::class, 'cartdecrement']);
// end add to wishlisr

//end frontend

// manage coupon

Route::prefix('coupon')->group(function ()
{
    Route::get('/view', [CouponController::class, 'couponview'])->name('manage.coupon');
    Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/update', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');
    Route::get('/inactive/{id}', [CouponController::class, 'inactive'])->name('coupon.inactive');
    Route::get('/active/{id}', [CouponController::class, 'active'])->name('coupon.active');
});

// end manage coupon

// manage orders

Route::prefix('orders')->group(function ()
{
    Route::get('/pending', [AdminOrderController::class, 'pendingorders'])->name('pending.orders');
    Route::get('/pending/details/{order_id}', [AdminOrderController::class, 'pendingorderdetails'])->name('pending.order.details');
    Route::get('/confirmed', [AdminOrderController::class, 'confirmedorders'])->name('confirmed.orders');
    Route::get('/processing', [AdminOrderController::class, 'processingorders'])->name('processing.orders');
    Route::get('/shipped', [AdminOrderController::class, 'shippedorders'])->name('shipped.orders');
    Route::get('/delivered', [AdminOrderController::class, 'deliveredorders'])->name('delivered.orders');
    Route::get('/cancelled', [AdminOrderController::class, 'cancelledorders'])->name('cancelled.orders');
    Route::get('/pending/confirm/{order_id}', [AdminOrderController::class, 'pendingtoconfirm'])->name('pendingtoconfirm');
    Route::get('/confirm/processing/{order_id}', [AdminOrderController::class, 'confirmtoprocessing'])->name('confirmtoprocessing');
    Route::get('/processing/shipped/{order_id}', [AdminOrderController::class, 'processingtoshipped'])->name('processingtoshipped');
    Route::get('/shipped/delivered/{order_id}', [AdminOrderController::class, 'shippedtodelivered'])->name('shippedtodelivered');
    Route::get('/cancel/{order_id}', [AdminOrderController::class, 'cancelorder'])->name('cancelorder');
    Route::get('/invoice/{order_id}', [AdminOrderController::class, 'invoice'])->name('invoice.download');
    Route::get('/return/requests', [AdminOrderController::class, 'returnrequests'])->name('return.requests');
    Route::get('/return/approve/{order_id}', [AdminOrderController::class, 'returnapprove'])->name('return.approve');
});

// end manage orders

// product review

Route::post('/review/store', [ReviewController::class, 'reviewstore'])->name('review.store');

Route::prefix('reviews')->group(function ()
{
    Route::get('/pending', [ReviewController::class, 'pendingreviews'])->name('pending.reviews');
    Route::get('/published', [ReviewController::class, 'publishedreviews'])->name('published.reviews');
    Route::get('/approve/{review_id}', [ReviewController::class, 'reviewapprove'])->name('review.approve');
    Route::get('/delete/{review_id}', [ReviewController::class, 'reviewdelete'])->name('review.delete');
});

// end product review

//frontend coupon

Route::post('/coupon-apply', [CartController::class, 'applycoupon']);

Route::get('/coupon-calculation', [CartController::class, 'couponcal']);

Route::get('/coupon-remove', [CartController::class, 'removecoupon']);

// end frontend coupon

// checkout

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/fetch-cities', [CartController::class, 'fetchCity']);

Route::post('/checkout/store', [CheckoutController::class, 'checkoutstore'])->name('checkout.store');
// end checkout

//end frontend