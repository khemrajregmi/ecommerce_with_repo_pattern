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




/**
 * Frontend Login Route
 */

Route::get('/social/{provider}', 'Auth\Customer\LoginController@redirectToProvider')->name('social.login');
Route::get('/social/{provider}/callback', 'Auth\Customer\LoginController@handleProviderCallback');
Route::get('signin', 'Auth\Customer\LoginController@getSignInIndex')->name('signin');
Route::get('checkout-sigin', 'Auth\Customer\LoginController@checkoutSignIn')->name('checkout-sigin');
Route::post('signin', 'Auth\Customer\LoginController@postSignIn')->name('singin');
Route::get('signup', 'Home\Customer\CustomerController@getSignUpIndex')->name('signup');
Route::post('signup', 'Home\Customer\CustomerController@postSignUp')->name('signup');

/** Frontend Login Routes ends */



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
Route::group(['as' => 'admin.','prefix' => 'admin', 'middleware' => ['auth','auth.permission.user']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('attribute', 'Admin\AttributeController');
    Route::resource('attributegroup', 'Admin\AttributeGroupController');
    Route::resource('stockstatus', 'Admin\StockStatusController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('feature', 'Admin\FeatureProductController');
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
    Route::resource('customerproductsuggestion','Admin\CustomerProSugController');

    /** Order Invoice Routes Starts **/

    Route::get('order/printinvoice/{id}','Admin\OrderController@printInvoice')->name('order.printinvoice');
    Route::get('order/printshippinglist/{id}','Admin\OrderController@printShoppingList')->name('order.printshippinglist');
    Route::post('order/history','Admin\OrderController@orderAddHistory')->name('order.history');

    /** Order Invoice Routes Ends **/



    /** Import Export Routes Starts **/

    ##Product Import Export
    Route::get('importExport', 'Admin\ImportExportController@importExport')->name('product.importExport');
    Route::get('downloadExcel/{type}', 'Admin\ImportExportController@downloadExcel')->name('product.export');
    Route::post('importExcel', 'Admin\ImportExportController@importExcel')->name('product.import');


    ##Category Import Export
    Route::get('categoryimportExport', 'Admin\ImportExportController@importExportCategory')->name('category.importexport');
    Route::get('categorydownloadExcel/{type}', 'Admin\ImportExportController@downloadExcelCategory')->name('category.export');
    Route::post('categoryimportExcel', 'Admin\ImportExportController@importExcelCategory')->name('category.import');

    ##Manufacutrer Import Export
    Route::get('manufacturerimportExport', 'Admin\ImportExportController@importExportManufacturer')->name('manufacturer.importexport');
    Route::get('manufacturerdownloadExcel/{type}', 'Admin\ImportExportController@downloadExcelManufacturer')->name('manufacturer.import');
    Route::post('manufacturerimportExcel', 'Admin\ImportExportController@importExcelManufacturer')->name('manufacturer.export');

    /** Import Export Routes Ends **/



    /**Routes for Reports Starts **/
    Route::get('/sales-order-reports','Admin\ReportController@orderSalesReport')->name('salesreport.orders');
    Route::post('/sales-order-reports','Admin\ReportController@postorderSalesReport')->name('salesreport.orderfilter');


    Route::get('/sales-shipping-reports','Admin\ReportController@shippingSalesReport')->name('salesreport.shipping');
    Route::post('/sales-shipping-reports','Admin\ReportController@postShippingSalesReport')->name('salesreport.shippingfilter');


    Route::get('/sales-return-reports','Admin\ReportController@returnSalesReport')->name('salesreport.return');
    Route::post('/sales-return-reports','Admin\ReportController@postReturnSalesReport')->name('salesreport.returnfilter');


    Route::get('/sales-coupon-reports','Admin\ReportController@couponSalesReport')->name('salesreport.coupon');
    Route::post('/sales-coupon-reports','Admin\ReportController@postCouponSalesReport')->name('salesreport.couponfilter');


    Route::get('/sales-product-view','Admin\ReportController@productViewReport')->name('salesreport.product-view');
    Route::get('/sales-product-reports','Admin\ReportController@productPurchaseReport')->name('salesreport.product-purchased');
    Route::post('/sales-product-reports','Admin\ReportController@postProductPurchaseReport')->name('salesreport.purchased-filter');


    Route::get('/inventory-reports','Admin\ReportController@productInventoryReport')->name('salesreport.inventory');
    Route::post('/inventory-reports','Admin\ReportController@postProductInventoryReport')->name('salesreport.inventory-filter');

    /**Routes for Reports Ends **/



    //Admin Ajax Routes
    Route::get('user/{id}/make_store_admin','Admin\UserController@getMakeUserStoreAdmin')->name('make_store_admin.ajax');
    Route::post('make_or_remove_user_as_store_admin','Admin\UserController@makeOrRemoveUserAsStoreAdmin')->name('make_or_remove_user_as_store_admin.ajax');
    Route::get('/information/{id}/states','Admin\CityController@getAllStatesByCountryId' )->name('states.ajax');
    Route::get('/information/{id}/cities','Admin\AreaController@getAllCityByStateId' )->name('cities.ajax');
    Route::get('/information/{id}/areas','Admin\AreaController@getAllAreaByCityId' )->name('areas.ajax');
    Route::get('/categoryAjax','Admin\CommonAjaxController@getCategoryProducts')->name('categoryProducts.ajax');
    Route::get('/productAjax','Admin\CommonAjaxController@getProductById')->name('getProducts.ajax');
    Route::get('/productdiscount/{id}/products','Admin\DiscountController@getAllProductByCategoryId' )->name('products.ajax');
    Route::get('/storewiseproduct','Admin\CommonAjaxController@getAllProductByStoreId' )->name('storewiseproduct.ajax');
    Route::get('/addToCartAjax','Admin\CartController@addToCart' )->name('addToCart.ajax');
    Route::get('/getCartItemsAjax','Admin\CartController@getCartItems' )->name('getCartItems.ajax');
    Route::get('/removeCartItemAjax','Admin\CartController@removeCartItems' )->name('removeFromCart.ajax');
    Route::get('/createinvoice','Admin\OrderController@createInvoice' )->name('createinvoice.ajax');


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
Route::group(['as' => 'customer.','prefix'    => 'customer','middleware' => ['customer']], function () {

    Route::get('/dashboard', 'Home\Customer\CustomerController@index')->name('dashboard');
    Route::get('/logout', 'Auth\Customer\LoginController@getLogout')->name('logout');
    Route::get('/profile', 'Home\Customer\CustomerController@profile')->name('profile');
    Route::get('/address', 'Home\Customer\CustomerController@address')->name('address');
    Route::get('/orders/{id}', 'Home\Customer\CustomerController@orders')->name('order');
    Route::post('/image', 'Home\Customer\CustomerController@postImage')->name('image');
    Route::post('/update', 'Home\Customer\CustomerController@updateCustomer')->name('update');
    Route::get('/wishlist/{id}', 'Home\Customer\WishlistController@wishlist')->name('wishlist');
    Route::get('/addwishlist', 'Home\Customer\WishlistController@addToWishList')->name('addwishlist');
    Route::get('/removewishlist', 'Home\Customer\WishlistController@removeWishList')->name('removewishlist');
    Route::get('/removefamilywishlist', 'Home\Customer\CustomerController@removeFamilyWishList')->name('removefamilywishlist');
    Route::post('/newletter', 'Home\Customer\CustomerController@newsletter')->name('newsletter');
    Route::get('/familysizewishlist/{id}', 'Home\Customer\CustomerController@familyWishlist')->name('familysizewishlist');
    Route::get('/familywishlist/{id}', 'Home\Customer\CustomerController@showFamilyWishlist')->name('familywishlist');
    Route::post('/familywishlist/update', 'Home\Customer\CustomerController@updateFamilyWishlist')->name('familywishlist.update');
    Route::post('/familysize', 'Home\Customer\CustomerController@postFamilyWishlist')->name('familysize');
    Route::get('/addfamilywishlist', 'Home\Customer\WishlistController@addFamilyWishList')->name('addfamilywishlist');
    Route::get('/product/suggestion', 'Home\Customer\CustomerController@addSuggestion')->name('product.suggestion');
    Route::post('/product/suggestion', 'Home\Customer\CustomerController@storeSuggestion')->name('product.suggestion');
    Route::get('/changepass', 'Home\Customer\CustomerController@changePassword')->name('changepass');
    Route::post('/changepass', 'Home\Customer\CustomerController@updatePassword')->name('changepass');
    Route::post('/add-address', 'Home\Customer\CustomerController@addAddress')->name('add-address');
    
    Route::get('/delete-address', 'Home\Customer\CustomerController@deleteAddress')->name('delete-address');
    Route::get('customer-autoaddress', 'Home\Customer\AccountController@getCustomerAddress')->name('customerdetail.ajax');

    // Route::get('customer-autoaddress', 'Home\Customer\MyaccountController@getCustomerAddress')->name('customerdetail.ajax');

});
/* End of Customer Group Routes */


/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an Home .
*/

Route::get('/', 'Home\HomeController@index')->name(' ');
Route::get('/about', 'Home\HomeController@about')->name('about');
Route::get('/shipping-return', 'Home\HomeController@shippingReturn')->name('shipping.return');
Route::get('/privacy-notice', 'Home\HomeController@privacyPolicy')->name('privacy.policy');
Route::get('/faq', 'Home\HomeController@faq')->name('faq');
Route::get('/product', 'Home\HomeController@product')->name('product');
Route::get('/online-support', 'Home\HomeController@onlineSupport')->name('online.support');
Route::get('/call-centre', 'Home\HomeController@callCentre')->name('call.centre');
Route::get('/', 'Home\HomeController@index')->name(' ');
    

Route::get('/products', 'Home\HomeController@getProductList')->name('product.list');
Route::get('/quickview/{id}', 'Home\HomeController@quickView')->name('quickview');
Route::get('/singleproduct/{slug}', 'Home\HomeController@singleProduct')->name('single.product');
Route::get('{category}/{subcategory}', 'Home\HomeController@categoryProduct')->name('category.product');
Route::get('/cart', 'Home\CartController@getCart')->name('cart');
Route::get('/addcart', 'Home\CartController@addToCart')->name('addcart');

Route::get('/stores', 'Home\HomeController@ourStores')->name('stores');
Route::get('/store-detail', 'Home\HomeController@storeDetail')->name('store.detail');
Route::get('/termsandcondition', 'Home\HomeController@termsCondition')->name('terms.condition');
Route::get('/checkout', 'Home\CartController@getCheckOut')->name('checkout');
Route::get('/compare', 'Home\HomeController@compare')->name('compare');
Route::get('/order/cancel/{id}', 'Home\CartController@orderCancel')->name('order.cancel');
Route::post('/order/update', 'Home\CartController@orderUpdate')->name('order.update');
// Route::get('/checkout/payment', 'Home\CartController@checkoutPayment')->name('checkout.payment');
// Route::get('/checkout/review', 'Home\CartController@checkoutReview')->name('checkout.review');
Route::post('/order/checkout', 'Home\CartController@orderCheckout')->name('order.checkout');
Route::get('addcompare', 'Home\HomeController@addCompare')->name('addCompare');
Route::get('deletecompare', 'Home\HomeController@removeCompare')->name('deletecompare');
Route::post('search', 'Home\HomeController@searchProduct')->name('search');
Route::post('/review', 'Home\ReviewController@store')->name('review');

Route::get('/how-it-works', 'Home\HomeController@howitWorks')->name('howitworks');
Route::get('/help', 'Home\HomeController@help')->name('help');
Route::get('/sitemap', 'Home\HomeController@sitemap')->name('sitemap');



/**
 * =========================
 *
 * Frontend Group Routes
 *
 * ===================
 */
