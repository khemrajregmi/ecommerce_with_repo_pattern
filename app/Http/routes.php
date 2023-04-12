<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an Admin .
*/

/**
 * Admin Login Route
 */
Route::get('admin', 'Auth\LoginController@getLoginIndex')->name('login');
Route::post('admin', 'Auth\LoginController@postLogin')->name('login');
Route::get('logout', 'Auth\LoginController@getLogout')->name('logout');
/** Admin Login Routes ends */



/**
 * =========================
 *
 * Admin Group Routes
 *
 * ===================
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth','auth.permission.user']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('attribute', 'Admin\AttributeController');
    Route::resource('attributegroup', 'Admin\AttributeGroupController');
    Route::resource('stockstatus', 'Admin\StockStatusController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('manufacturer', 'Admin\ManufacturerController');
    Route::resource('review', 'Admin\ReviewController');
    Route::resource('lengthclass', 'Admin\LengthClassController');
    Route::resource('vouchertheme', 'Admin\VoucherThemeController');
    Route::resource('voucher', 'Admin\VoucherController');
    Route::resource('weightclass', 'Admin\WeightClassController');
    Route::resource('return', 'Admin\ProductReturnController');
    Route::resource('returnaction', 'Admin\ProductReturnActionController');
    Route::resource('coupon', 'Admin\CouponController');
    Route::resource('returnstatus', 'Admin\ProductReturnStatusController');
    Route::resource('returnreason', 'Admin\ProductReturnReasonController');
    Route::resource('customergroup', 'Admin\CustomerGroupController');
    Route::resource('customer', 'Admin\CustomerController');
    Route::resource('orderstatus', 'Admin\OrderStatusController');
    Route::resource('order', 'Admin\OrderController');
    Route::resource('setting', 'Admin\SettingController');
    Route::resource('banner', 'Admin\BannerController');
    Route::resource('role', 'Admin\UserRoleController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('country', 'Admin\CountryController');
    Route::resource('state', 'Admin\StateController');
    Route::resource('city', 'Admin\CityController');
    Route::resource('area', 'Admin\AreaController');
    Route::resource('store','Admin\StoreController');
    Route::resource('combotype','Admin\ComboTypeController');
    Route::resource('combooffer','Admin\ComboOfferController');
    Route::resource('discount','Admin\DiscountController');
    Route::resource('discounttype','Admin\DiscountTypeController');
    Route::resource('customerfamilysize','Admin\CustomerFamilySizeController');
    Route::resource('duration','Admin\DurationController');
    Route::resource('customerprosug','Admin\CustomerProSugController');


    /** Order Invoice Routes Starts **/
    Route::get('order/printinvoice/{id}','Admin\OrderController@printInvoice')->name('admin.order.printinvoice');
    Route::get('order/printshippinglist/{id}','Admin\OrderController@printShoppingList')->name('admin.order.printshippinglist');
    Route::post('order/history','Admin\OrderController@orderAddHistory')->name('admin.order.history');
    /** Order Invoice Routes Ends **/



    /** Import Export Routes Starts **/
    Route::get('importExport', 'Admin\ImportExportController@importExport')->name('admin.product.importexport');
    Route::get('downloadExcel/{type}', 'Admin\ImportExportController@downloadExcel')->name('admin.productdownloadExcel');
    Route::post('importExcel', 'Admin\ImportExportController@importExcel')->name('admin.product.importexcel');



    Route::get('categoryimportExport', 'Admin\ImportExportController@importExportCategory')->name('admin.category.importexport');
    Route::get('categorydownloadExcel/{type}', 'Admin\ImportExportController@downloadExcelCategory')->name('admin.categorydownloadExcel');
    Route::post('categoryimportExcel', 'Admin\ImportExportController@importExcelCategory')->name('admin.category.importexcel');



    Route::get('manufacturerimportExport', 'Admin\ImportExportController@importExportManufacturer')->name('admin.manufacturer.importexport');
    Route::get('manufacturerdownloadExcel/{type}', 'Admin\ImportExportController@downloadExcelManufacturer')->name('admin.manufacturerdownloadExcel');
    Route::post('manufacturerimportExcel', 'Admin\ImportExportController@importExcelManufacturer')->name('admin.manufacturer.importexcel');
    /** Import Export Routes Ends **/



    /**Routes for Reports Starts **/
    Route::get('/order-reports','Admin\OrderController@orderSalesReport')->name('admin.order.reports');
    Route::post('/order-reports','Admin\OrderController@postorderSalesReport')->name('admin.order.reports');
    /**Routes for Reports Ends **/


    //Admin Ajax Routes
    Route::get('user/{id}/make_store_admin','Admin\UserController@getMakeUserStoreAdmin')->name('admin.make_store_admin.ajax');
    Route::post('make_or_remove_user_as_store_admin','Admin\UserController@makeOrRemoveUserAsStoreAdmin')->name('admin.make_or_remove_user_as_store_admin.ajax');
    Route::get('/information/{id}/states','Admin\CityController@getAllStatesByCountryId' )->name('admin.states.ajax');
    Route::get('/information/{id}/cities','Admin\AreaController@getAllCityByStateId' )->name('admin.cities.ajax');
    Route::get('/information/{id}/areas','Admin\AreaController@getAllAreaByCityId' )->name('admin.areas.ajax');
    Route::get('/categoryAjax','Admin\CommonAjaxController@getCategoryProducts')->name('admin.categoryProducts.ajax');
    Route::get('/productAjax','Admin\CommonAjaxController@getProductById')->name('admin.product.ajax');
    Route::get('/productdiscount/{id}/products','Admin\DiscountController@getAllProductByCategoryId' )->name('admin.products.ajax');
    Route::get('/storewiseproduct','Admin\CommonAjaxController@getAllProductByStoreId' )->name('admin.storewiseproduct.ajax');
    Route::get('/addToCartAjax','Admin\CartController@addToCart' )->name('admin.addToCart.ajax');
    Route::get('/getCartItemsAjax','Admin\CartController@getCartItems' )->name('admin.getCartItems.ajax');
    Route::get('/removeCartItemAjax','Admin\CartController@removeCartItems' )->name('admin.removeFromCart.ajax');
    Route::get('/createinvoice','Admin\OrderController@createInvoice' )->name('admin.createinvoice.ajax');


});
/* End of Admin Group Routes */

/* End of Admin Routes */

/**
 * =========================
 *
 * Customer Group Routes
 *
 * ===================
 */
Route::group(['prefix'    => 'customer','middleware' => ['customer']], function () {

    Route::get('/dashboard', 'Home\Customer\CustomerController@index')->name('customer.dashboard');
    Route::get('/logout', 'Auth\Customer\LoginController@getLogout')->name('customer.logout');
    Route::get('/profile', 'Home\Customer\CustomerController@profile')->name('customer.profile');
    Route::get('/address', 'Home\Customer\CustomerController@address')->name('customer.address');
    Route::get('/orders/{id}', 'Home\Customer\CustomerController@orders')->name('customer.order');
    Route::post('/image', 'Home\Customer\CustomerController@postImage')->name('customer.image');
    Route::post('/update', 'Home\Customer\CustomerController@updateCustomer')->name('customer.update');
    Route::get('/wishlist/{id}', 'Home\Customer\WishlistController@wishlist')->name('customer.wishlist');
    Route::get('/addwishlist', 'Home\Customer\WishlistController@addToWishList')->name('customer.addwishlist');
    Route::get('/removewishlist', 'Home\Customer\WishlistController@removeWishList')->name('customer.removewishlist');
    Route::get('/removefamilywishlist', 'Home\Customer\CustomerController@removeFamilyWishList')->name('customer.removefamilywishlist');
    Route::post('/newletter', 'Home\Customer\CustomerController@newsletter')->name('customer.newsletter');
    Route::get('/familysizewishlist/{id}', 'Home\Customer\CustomerController@familyWishlist')->name('customer.familysizewishlist');
    Route::get('/familywishlist/{id}', 'Home\Customer\CustomerController@showFamilyWishlist')->name('customer.familywishlist');
    Route::post('/familywishlist/update', 'Home\Customer\CustomerController@updateFamilyWishlist')->name('customer.familywishlist.update');
    Route::post('/familysize', 'Home\Customer\CustomerController@postFamilyWishlist')->name('customer.familysize');
    Route::get('/addfamilywishlist', 'Home\Customer\WishlistController@addFamilyWishList')->name('customer.addfamilywishlist');
    Route::get('/product/suggestion', 'Home\Customer\CustomerController@addSuggestion')->name('customer.product.suggestion');
    Route::post('/product/suggestion', 'Home\Customer\CustomerController@storeSuggestion')->name('customer.product.suggestion');
    Route::get('/changepass', 'Home\Customer\CustomerController@changePassword')->name('customer.changepass');
    Route::post('/changepass', 'Home\Customer\CustomerController@updatePassword')->name('customer.changepass');

});
/* End of Customer Group Routes */


/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an Home .
*/

Route::get('/', array('as' => ' ', 'uses' => 'Home\HomeController@index'));
Route::get('/products', array('as' => 'product.list', 'uses' => 'Home\HomeController@getProductList'));
Route::get('/quickview/{id}', array('as' => 'quickview', 'uses' => 'Home\HomeController@quickView'));
Route::get('/singleproduct/{slug}', array('as' => 'single.product', 'uses' => 'Home\HomeController@singleProduct'));
Route::get('{category}/{product}', array('as' => 'category.product', 'uses' => 'Home\HomeController@categoryProduct'));
Route::get('/aboutshop', array('as' => 'about.shop', 'uses' => 'Home\HomeController@aboutShop'));
Route::get('/cart', array('as' => 'cart', 'uses' => 'Home\CartController@getCart'));
Route::get('/addcart', array('as' => 'addcart', 'uses' => 'Home\CartController@addToCart'));
Route::get('/faq', array('as' => 'faq', 'uses' => 'Home\HomeController@faQ'));;
Route::get('/privacypolicy', array('as' => 'privacy.policy', 'uses' => 'Home\HomeController@privacyPolicy'));


Route::get('/store', array('as' => 'store', 'uses' => 'Home\HomeController@ourStore'));
Route::get('/storedetails', array('as' => 'store.details', 'uses' => 'Home\HomeController@storeDetails'));
Route::get('/termsandcondition', array('as' => 'terms.condition', 'uses' => 'Home\HomeController@termsCondition'));
Route::get('/checkout', array('as' => 'checkout', 'uses' => 'Home\CartController@getCheckOut'));
Route::get('/compare', array('as' => 'compare', 'uses' => 'Home\HomeController@compare'));
Route::get('/order/cancel/{id}', array('as' => 'order.cancel', 'uses' => 'Home\CartController@orderCancel'));
Route::post('/order/update', array('as' => 'order.update', 'uses' => 'Home\CartController@orderUpdate'));
Route::get('/checkout/payment', array('as' => 'checkout.payment', 'uses' => 'Home\CartController@checkoutPayment'));
Route::get('/checkout/review', array('as' => 'checkout.review', 'uses' => 'Home\CartController@checkoutReview'));
Route::post('/order/checkout', 'Home\CartController@orderCheckout')->name('order.checkout');
Route::get('addcompare', 'Home\HomeController@addCompare')->name('addCompare');
Route::get('deletecompare', 'Home\HomeController@removeCompare')->name('deletecompare');
Route::post('search', 'Home\HomeController@searchProduct')->name('search');
Route::post('/review', 'Home\ReviewController@store')->name('review');
Route::post('/sitemap', 'Home\HomeController@sitemap')->name('sitemap');










/**
 * Frontend Login Route
 */
Route::get('signin', 'Auth\Customer\LoginController@getSignInIndex')->name('signin');
Route::post('signin', 'Auth\Customer\LoginController@postSignIn')->name('singin');
Route::get('signup', 'Home\Customer\CustomerController@getSignUpIndex')->name('signup');
Route::post('signup', 'Home\Customer\CustomerController@postSignUp')->name('signup');

/** Frontend Login Routes ends */


/**
 * =========================
 *
 * Frontend Group Routes
 *
 * ===================
 */






