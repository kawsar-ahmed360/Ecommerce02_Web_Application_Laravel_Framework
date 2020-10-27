<?php

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



Route::get('/','FontendController@mainfont')->name('/');
Route::get('cat_product','FontendController@catProduct')->name('catProduct');
Route::get('Brand_product','FontendController@BrandProduct')->name('BrandProduct');
Route::get('search_product','FontendController@searchProduct')->name('searchProduct');
Route::get('single_Porduct/{slug}','FontendController@SinglePorduct')->name('SinglePorduct');

//...........cart............
Route::post('add_cart','CartController@addCART')->name('addCART');
Route::get('shopping_cart','CartController@ShoppingCart')->name('ShoppingCart');
Route::get('shopping_cart_remove/{rowId}','CartController@ShoppingCartRemove')->name('ShoppingCartRemove');
Route::post('shopping_cart_Update','CartController@ShoppingCartUpdate')->name('ShoppingCartUpdate');
Route::get('checkout_page','CartController@CheckOutPage')->name('CheckOutPage');

//.....................Checkout Controller............
Route::post('checkout_save','CheckOutController@CheckOutSave')->name('CheckOutSave');

//..........................SociaLite Controller..................
Route::get('login/github', 'SocialiteController@redirectToProvider')->name('redirectToProvider');
Route::get('login/github/callback', 'SocialiteController@handleProviderCallback')->name('handleProviderCallback');

//.............................Contact Managecontroller.........................

Route::get('contact_page','ContactManageController@ContactPage')->name('ContactPage');
Route::post('contact_pagesave','ContactManageController@ContactPageSave')->name('ContactPageSave');

//..........................End Contact Manage Controller...................


Auth::routes();

route::group(['middleware'=>['auth','Admin']],function(){
Route::get('/home', 'HomeController@index')->name('home');


});

//..........................Admin site..................
route::group(['middleware'=>['auth','Admin']],function(){

route::get('admin_profile','AdminAuthentication@AdminProfile')->name('AdminProfile');
route::get('admin_profileajax','AdminAuthentication@AdminProfileajax')->name('AdminProfileajax');
route::post('admin_profilesave','AdminAuthentication@AdminProfilesave')->name('AdminProfilesave');
route::post('admin_password_change','AdminAuthentication@AdminpasswordChange')->name('AdminpasswordChange');
route::post('admin_image_change','AdminAuthentication@AdminImageChange')->name('AdminImageChange');
route::get('userview','AdminAuthentication@UserView')->name('UserView');
route::get('userdelete/{id}','AdminAuthentication@UserDelete')->name('UserDelete');

//......................Category Management..............................

route::get('categoryview','CategoryManagement@Category_View')->name('Category_View');
route::get('categoryviewajax','CategoryManagement@Category_Viewajax')->name('Category_Viewajax');
route::post('categorySave','CategoryManagement@Category_Save')->name('Category_Save');
route::get('categoryactive','CategoryManagement@Category_active')->name('Category_active');
route::get('categoryDeactive','CategoryManagement@Category_Deactive')->name('Category_Deactive');
route::post('categoryEdite','CategoryManagement@Category_Edite')->name('Category_Edite');
route::get('categoryDelete','CategoryManagement@Category_Delete')->name('Category_Delete');
//......................Category Management End..............................

//......................Brand Management..............................
route::get('Brandsview','BrandManagementController@Brands_View')->name('Brands_View');
route::post('BrandsSave','BrandManagementController@Brands_Save')->name('Brands_Save');
route::get('Brandsviewajax','BrandManagementController@Brands_Viewajax')->name('Brands_Viewajax');
route::get('BrandsActiveajax','BrandManagementController@Brands_Activeajax')->name('Brands_Activeajax');
route::get('BrandsDeactiveajax','BrandManagementController@Brands_Deactiveajax')->name('Brands_Deactiveajax');
route::get('BrandsDeleteajax','BrandManagementController@Brands_Deleteajax')->name('Brands_Deleteajax');
route::post('BrandsEditeajax','BrandManagementController@Brands_Editeajax')->name('Brands_Editeajax');

//......................Brand Management End..............................
//......................Color Management..............................
route::get('Colorsview','ColorManagement@Colors_View')->name('Colors_View');
route::post('ColorsSave','ColorManagement@Colors_Save')->name('Colors_Save');
route::get('Colorsviewajax','ColorManagement@Colors_Viewajax')->name('Colors_Viewajax');
route::get('ColorsActiveajax','ColorManagement@Colors_Activeajax')->name('Colors_Activeajax');
route::get('ColorsDeactiveajax','ColorManagement@Colors_Deactiveajax')->name('Colors_Deactiveajax');
route::get('ColorsDeleteajax','ColorManagement@Colors_Deleteajax')->name('Colors_Deleteajax');
route::post('ColorsEditeajax','ColorManagement@Colors_Editeajax')->name('Colors_Editeajax');

//......................Color Management End..............................

//......................Size Management..............................
route::get('Sizesview','SizeManagement@Sizes_View')->name('Sizes_View');
route::post('SizesSave','SizeManagement@Sizes_Save')->name('Sizes_Save');
route::get('Sizesviewajax','SizeManagement@Sizes_Viewajax')->name('Sizes_Viewajax');
route::get('SizesActiveajax','SizeManagement@Sizes_Activeajax')->name('Sizes_Activeajax');
route::get('SizesDeactiveajax','SizeManagement@Sizes_Deactiveajax')->name('Sizes_Deactiveajax');
route::get('SizesDeleteajax','SizeManagement@Sizes_Deleteajax')->name('Sizes_Deleteajax');
route::post('SizesEditeajax','SizeManagement@Sizes_Editeajax')->name('Sizes_Editeajax');

//......................Size Management End..............................


//......................Product Management..............................

route::get('ProductAdd','ProductController@Product_Add')->name('Product_Add');
route::get('Productview','ProductController@Product_View')->name('Product_View');
route::post('ProductSave','ProductController@Product_Save')->name('Product_Save');
route::get('ProductActive/{id}','ProductController@Product_Active')->name('Product_Active');
route::get('ProductDeactive/{id}','ProductController@Product_Deactive')->name('Product_Deactive');
route::get('ProductDelete/{id}','ProductController@Product_Delete')->name('Product_Delete');
route::get('ProductEdite/{id}','ProductController@Product_Edite')->name('Product_Edite');
route::post('ProductUpdate','ProductController@Product_Update')->name('Product_Update');
route::get('ProductSingle_view/{id}','ProductController@Product_Single_view')->name('Product_Single_view');
//......................Product Management End..............................


//........................Customer_order.......................

route::get('Customer_Orderbackend','OrderController@customerOrderbackend')->name('customerOrderbackend');
route::get('Customer_OrderApprove/{id}','OrderController@customerOrderApprove')->name('customerOrderApprove');
route::get('Customer_OrderDelete/{id}','OrderController@customerOrderDelete')->name('customerOrderDelete');

//..............................Cotact message...................

route::get('contact_view','ContactManageController@contactView')->name('contactView');
route::get('contact_viewajax','ContactManageController@contactViewajax')->name('contactViewajax');
route::get('message_seen','ContactManageController@MessageSeen')->name('MessageSeen');
route::get('message_Unseen','ContactManageController@MessageUnSeen')->name('MessageUnSeen');
route::get('message_Delete','ContactManageController@MessageDelete')->name('MessageDelete');


});



//..............Customer Auth..........................
route::get('customer_login','Customer_AuthController@CustomerLogin')->name('CustomerLogin');
route::get('customer_Register','Customer_AuthController@CustomerRegister')->name('CustomerRegister');
route::post('customer_Register_save','Customer_AuthController@CustomerRegisterSave')->name('CustomerRegisterSave');
route::get('/cus_email_verify','Customer_AuthController@CustomerEmailVerify')->name('CustomerEmailVerify');
route::post('/customer_verify_email','Customer_AuthController@CustomerVerifyEmail')->name('CustomerVerifyEmail');

//....................Customer Dashobrd......................


route::group(['middleware'=>['auth','Customer']],function(){
route::get('/customer_dashobrd','CustomerDashbord@Customer_Dashbord')->name('Customer_Dashbord');
route::post('/customer_edite','CustomerDashbord@CustomerEdite')->name('CustomerEdite');
route::post('/pass_change','CustomerDashbord@passwordChange')->name('passwordChange');
route::post('/update_img','CustomerDashbord@UpdateImage')->name('UpdateImage');
route::get('/customer_viewajax','CustomerDashbord@CustomerviewAjax')->name('CustomerviewAjax');


route::get('customer_order','CheckOutController@customerOrder')->name('customerOrder');
//......................Order Controller.................
route::get('customer_order_details/{id}','OrderController@customerOrderDetails')->name('customerOrderDetails');


});

