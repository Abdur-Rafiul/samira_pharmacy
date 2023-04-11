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

//Route::get('/', function () {
//    return view('index');
//});


use App\Http\Controllers\admin\ChangeImageController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactListController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationListController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\PaymentTestController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\SiteSEOController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SMSTestController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VisitorListController;


Route::get('/', [HomeController::class, 'HomePage']);
Route::get('/HomeSummary', [HomeController::class, 'HomeSummary'])->middleware('loginCheck');

//login
Route::get('/SignIn', [AdminLoginController::class, 'SignIn'])->name('login');
Route::post('/OnSignIn', [AdminLoginController::class, 'OnSignIn']);
Route::get('/OnLogOut', [AdminLoginController::class, 'OnLogOut']);


Route::get('/VisitorListPage', [VisitorListController::class, 'VisitorListPage'])->middleware('loginCheck');
Route::get('/VisitorListData', [VisitorListController::class, 'VisitorListData'])->middleware('loginCheck');


Route::get('/NotificationListPage', [NotificationListController::class, 'NotificationListPage'])->middleware('loginCheck');
Route::get('/NotificationListData', [NotificationListController::class, 'NotificationListData'])->middleware('loginCheck');
Route::post('/CreateNotification', [NotificationListController::class, 'CreateNotification'])->middleware('loginCheck');


Route::get('/ContactListPage', [ContactListController::class, 'ContactListPage'])->middleware('loginCheck');
Route::get('/ContactListData', [ContactListController::class, 'ContactListData'])->middleware('loginCheck');
Route::post('/ContactListDelete', [ContactListController::class, 'ContactListDelete'])->middleware('loginCheck');


Route::get('/AdminListPage', [AdminListController::class, 'AdminListPage'])->middleware('loginCheck');
Route::get('/AdminListData', [AdminListController::class, 'AdminListData'])->middleware('loginCheck');
Route::post('/AdminAdd', [AdminListController::class, 'AdminAdd'])->middleware('loginCheck');
Route::post('/AdminListDelete', [AdminListController::class, 'AdminListDelete'])->middleware('loginCheck');


Route::get('/AboutPage', [SiteInfoController::class, 'AboutPage'])->middleware('loginCheck');
Route::get('/TermsPage', [SiteInfoController::class, 'TermsPage'])->middleware('loginCheck');
Route::get('/PolicyPage', [SiteInfoController::class, 'PolicyPage'])->middleware('loginCheck');
Route::get('/PurchasePage', [SiteInfoController::class, 'PurchasePage'])->middleware('loginCheck');
Route::get('/AddressPage', [SiteInfoController::class, 'AddressPage'])->middleware('loginCheck');
Route::get('/AboutCompanyPage', [SiteInfoController::class, 'AboutCompanyPage'])->middleware('loginCheck');


Route::get('/MobileAppPage', [SiteInfoController::class, 'MobileAppPage'])->middleware('loginCheck');
Route::get('/SocialPage', [SiteInfoController::class, 'SocialPage'])->middleware('loginCheck');


Route::get('/GetSiteInfoDetails', [SiteInfoController::class, 'GetSiteInfoDetails'])->middleware('loginCheck');
Route::post('/UpdateSiteInfo', [SiteInfoController::class, 'UpdateSiteInfo'])->middleware('loginCheck');


Route::get('/siteSEO', [SiteSEOController::class, 'SiteSEOPage'])->middleware('loginCheck');
Route::get('/GetSEODetails', [SiteSEOController::class, 'GetSEODetails'])->middleware('loginCheck');
Route::post('/UpdateSEODetails', [SiteSEOController::class, 'UpdateSEODetails'])->middleware('loginCheck');
Route::post('/ChangeSEOIMG', [ChangeImageController::class, 'ChangeSEOIMG'])->middleware('loginCheck');

//category
Route::get('/CategoryListPage', [CategoryController::class, 'CategoryListPage'])->middleware('loginCheck');
Route::get('/CategoryListData', [CategoryController::class, 'CategoryListData'])->middleware('loginCheck');
Route::post('/CategoryAdd', [CategoryController::class, 'CategoryAdd'])->middleware('loginCheck');
Route::post('/CategoryDelete', [CategoryController::class, 'CategoryDelete']);
Route::post('/ChangeCategoryImage', [CategoryController::class, 'ChangeCategoryImage'])->middleware('loginCheck');
Route::post('/GetCategoryName', [CategoryController::class, 'GetCategoryName'])->middleware('loginCheck');
Route::post('/CategoryNameEdit', [CategoryController::class, 'CategoryNameEdit'])->middleware('loginCheck');

//sub-category
Route::get('/SubCategoryListPage', [SubCategoryController::class, 'SubCategoryListPage'])->middleware('loginCheck');
Route::get('/SubCategoryListData', [SubCategoryController::class, 'SubCategoryListData'])->middleware('loginCheck');
Route::post('/SubCategoryAdd', [SubCategoryController::class, 'SubCategoryAdd'])->middleware('loginCheck');
Route::post('/SubCategoryDelete', [SubCategoryController::class, 'SubCategoryDelete'])->middleware('loginCheck');
Route::post('/GetSubCategoryEditData', [SubCategoryController::class, 'GetSubCategoryEditData'])->middleware('loginCheck');
Route::post('/SubCategoryNameEdit', [SubCategoryController::class, 'SubCategoryNameEdit'])->middleware('loginCheck');

//brand
Route::get('/BrandListPage', [BrandController::class, 'BrandListPage'])->middleware('loginCheck');
Route::get('/BrandListData', [BrandController::class, 'BrandListData'])->middleware('loginCheck');
Route::post('/BrandAdd', [BrandController::class, 'BrandAdd'])->middleware('loginCheck');
Route::post('/BrandDelete', [BrandController::class, 'BrandDelete'])->middleware('loginCheck');
Route::post('/ChangeBrandImage', [BrandController::class, 'ChangeBrandImage'])->middleware('loginCheck');

//product list
Route::get('/ProductListPage', [ProductListController::class, 'ProductListPage'])->middleware('loginCheck');
Route::get('/ProductListData', [ProductListController::class, 'ProductListData'])->middleware('loginCheck');
Route::get('/GetCategoryList', [ProductListController::class, 'GetCategoryList'])->middleware('loginCheck');
Route::post('/GetSubCategoryAsCategory', [ProductListController::class, 'GetSubCategoryAsCategory'])->middleware('loginCheck');
Route::post('/ProductListAdd', [ProductListController::class, 'ProductListAdd'])->middleware('loginCheck');
Route::post('/ProductListDelete', [ProductListController::class, 'ProductListDelete'])->middleware('loginCheck');
Route::post('/ChangeProductListImage', [ProductListController::class, 'ChangeProductListImage'])->middleware('loginCheck');
Route::post('/ProductListEditData', [ProductListController::class, 'ProductListEditData'])->middleware('loginCheck');
Route::post('/ProductListDataEdit', [ProductListController::class, 'ProductListDataEdit'])->middleware('loginCheck');

//Product Details
Route::get('/ProductDetailsPage', [ProductDetailsController::class, 'ProductDetailsPage'])->middleware('loginCheck');
Route::get('/ProductDetailsData', [ProductDetailsController::class, 'ProductDetailsData'])->middleware('loginCheck');
Route::post('/ProductDetailsAdd', [ProductDetailsController::class, 'ProductDetailsAdd'])->middleware('loginCheck');
Route::post('/ProductDetailsWithOneImg', [ProductDetailsController::class, 'ProductDetailsWithOneImg'])->middleware('loginCheck');
Route::post('/ProductDetailsWithTwoImg', [ProductDetailsController::class, 'ProductDetailsWithTwoImg'])->middleware('loginCheck');
Route::post('/ProductDetailsWithThreeImg', [ProductDetailsController::class, 'ProductDetailsWithThreeImg'])->middleware('loginCheck');
Route::post('/ProductDetailsDelete', [ProductDetailsController::class, 'ProductDetailsDelete'])->middleware('loginCheck');
Route::post('/ProductDetailsEditData', [ProductDetailsController::class, 'ProductDetailsEditData'])->middleware('loginCheck');
Route::post('/ProductDetailsDataEdit', [ProductDetailsController::class, 'ProductDetailsDataEdit'])->middleware('loginCheck');
Route::post('/ProductImageEditData', [ProductDetailsController::class, 'ProductImageEditData'])->middleware('loginCheck');
Route::post('/ChangeProductImageOne', [ProductDetailsController::class, 'ChangeProductImageOne'])->middleware('loginCheck');
Route::post('/ChangeProductImageTwo', [ProductDetailsController::class, 'ChangeProductImageTwo'])->middleware('loginCheck');
Route::post('/ChangeProductImageThree', [ProductDetailsController::class, 'ChangeProductImageThree'])->middleware('loginCheck');
Route::post('/ChangeProductImageFour', [ProductDetailsController::class, 'ChangeProductImageFour'])->middleware('loginCheck');

//shop
Route::get('/ShopPage', [ShopController::class, 'ShopPage'])->middleware('loginCheck');
Route::get('/ShopData', [ShopController::class, 'ShopData'])->middleware('loginCheck');
Route::post('/ShopAdd', [ShopController::class, 'ShopAdd'])->middleware('loginCheck');
Route::post('/ShopDelete', [ShopController::class, 'ShopDelete'])->middleware('loginCheck');
Route::post('/ChangeShopLogo', [ShopController::class, 'ChangeShopLogo'])->middleware('loginCheck');

//Slider
Route::get('/SliderListPage', [SliderController::class, 'SliderListPage'])->middleware('loginCheck');
Route::get('/SliderListData', [SliderController::class, 'SliderListData'])->middleware('loginCheck');
Route::get('/GetProductCode', [SliderController::class, 'GetProductCode'])->middleware('loginCheck');
Route::post('/SliderAdd', [SliderController::class, 'SliderAdd'])->middleware('loginCheck');
Route::post('/SliderDelete', [SliderController::class, 'SliderDelete'])->middleware('loginCheck');
Route::post('/ChangeSliderImage', [SliderController::class, 'ChangeSliderImage'])->middleware('loginCheck');
Route::post('/SliderListEditData', [SliderController::class, 'SliderListEditData'])->middleware('loginCheck');
Route::post('/SliderDataEdit', [SliderController::class, 'SliderDataEdit'])->middleware('loginCheck');

//custom order
Route::get('/CustomOrderPage', [CustomOrderController::class, 'CustomOrderPage'])->middleware('loginCheck');
Route::get('/CustomOrderData', [CustomOrderController::class, 'CustomOrderData'])->middleware('loginCheck');
Route::post('/CustomOrderDelete', [CustomOrderController::class, 'CustomOrderDelete'])->middleware('loginCheck');

//otp
Route::get('/OtpListPage', [OTPController::class, 'OtpListPage'])->middleware('loginCheck');
Route::get('/OtpListData', [OTPController::class, 'OtpListData'])->middleware('loginCheck');

//Product Order
Route::get('/ProductOrderPage', [ProductOrderController::class, 'ProductOrderPage'])->middleware('loginCheck');
Route::get('/ProductOrderData', [ProductOrderController::class, 'ProductOrderData'])->middleware('loginCheck');
Route::post('/ProductOrderDetailsData', [ProductOrderController::class, 'ProductOrderDetailsData'])->middleware('loginCheck');
Route::post('/ProductOrderDelete', [ProductOrderController::class, 'ProductOrderDelete'])->middleware('loginCheck');
Route::post('/ProductOrderStatusEdit', [ProductOrderController::class, 'ProductOrderStatusEdit'])->middleware('loginCheck');
Route::post('/ProductOrderInvoiceData', [ProductOrderController::class, 'ProductOrderInvoiceData'])->middleware('loginCheck');

//Product Review
Route::get('/ProductReviewPage', [ProductReviewController::class, 'ProductReviewPage'])->middleware('loginCheck');
Route::get('/ProductReviewData', [ProductReviewController::class, 'ProductReviewData'])->middleware('loginCheck');
Route::post('/ProductReviewDelete', [ProductReviewController::class, 'ProductReviewDelete'])->middleware('loginCheck');

//sms test
Route::get('/smsTest', [SMSTestController::class, 'smsTest']);
Route::get('/PaymentTest', [PaymentTestController::class, 'PaymentTest']);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->middleware('loginCheck');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->middleware('loginCheck');

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->middleware('loginCheck');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->middleware('loginCheck');

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->middleware('loginCheck');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->middleware('loginCheck');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->middleware('loginCheck');

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn'])->middleware('loginCheck');
//SSLCOMMERZ END


