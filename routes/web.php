<?php

use App\Http\Controllers\Farmers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Farmers\RegistrationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\Admins\RegistrationController as adminRegister;
use App\Http\Controllers\Auth\Admins\AdminProfileController;
use App\Http\Controllers\Auth\Admins\planCreateCotroller;
use App\Http\Controllers\Auth\Admins\productsCreateController;
use App\Http\Controllers\Farmers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Advisor\AdvisorRegContoller;
use App\Http\Controllers\Advisor\educationController;
use App\Http\Controllers\Advisor\DashbordsController;
use App\Http\Controllers\Advisor\RepliesController;
use App\Http\Controllers\MailController2;
use App\Http\Controllers\SendEmailController;


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

//* get routes

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [RegistrationController::class, 'showRegistrationForm']);
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth', 'farmer'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('farmers.dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'showProfileEdit'])->name('farmers.editProfile');
    Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::get('mail', [MailController::class, 'index'])->name('mail')->middleware('subscriber');
    Route::post('send/mail', [MailController::class, 'send'])->name('send.mail');
    Route::get('/view/mail/{id}', [MailController::class, 'view'])->name('view.mail');
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::delete('/delete-cart/{id}', [ProductController::class, 'deleteCart'])->name('delete.cart');
    Route::get('/checkout', [CheckoutController::class, 'store'])->name('checkout');
    Route::post('/search/mail', [MailController::class, 'searchMails'])->name('search.mail');
    Route::delete('/delete/mail/{id}', [MailController::class, 'deleteMail'])->name('delete.mail');
    Route::get('/subscription/buy', [SubscriptionsController::class, 'index'])->name('subscription.buy');
    Route::get('/subscribe/{id}', [SubscriptionsController::class, 'subscribe'])->name('subscription.subscribe');
});
//admins route
Route::get('admin/signup', [adminRegister::class, 'showRegistrationForm']);
Route::post('admin/register', [adminRegister::class, 'register'])->name('admin.register');

Route::middleware(['auth', 'plancheck'])->group(function () {
    Route::get('admin/profile', function () {
        return view('dashboards.admin');
    })->name('admins.dashboard');




    Route::get('plan_create', [planCreateCotroller::class, 'plancreate']);
    Route::post('/plan_submit', [planCreateCotroller::class, 'plansubmit']);



    Route::get('/adminupdate', [AdminProfileController::class, 'adminprofile']);
    Route::post('/startupdate', [AdminProfileController::class, 'goupdate']);


    Route::get('product_create', [productsCreateController::class, 'productcreate']);
    Route::post('/productsubmit', [productsCreateController::class, 'productsubmit']);

    //see all plans
    Route::get('allplan', [planCreateCotroller::class, 'getall']);

    //update plans
    Route::get('updateplan/{id}', [planCreateCotroller::class, 'updateplan']);
    Route::post('updateplansubmit', [planCreateCotroller::class, 'goplanupdate']);
    //delete plans
    Route::get('deleteplan/{id}', [planCreateCotroller::class, 'plandelete']);

    //see all products
    Route::get('allproduct', [productsCreateController::class, 'getall']);

    //update product
    Route::get('updateproduct/{id}', [productsCreateController::class, 'updateproduct']);
    Route::post('updateproductsubmit', [productsCreateController::class, 'goproductupdate']);

    //delete products
    Route::get('deleteproduct/{id}', [productsCreateController::class, 'productdelete']);

    Route::get('backtodashboard', function () {
        return view('admin/profile');
    });
});

Route::get('/signin_signup', function () {
    return view('admin_detail');
});


//logout
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    return redirect('/signin');
});

//test routes
Route::get('/test', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'test']);

//Cart routes
Route::get('/cart/{id}', [ProductController::class, 'addCart'])->name('cart.add');
Route::post('/search/product', [ProductController::class, 'searchProducts'])->name('search.product');



//Advisor Route
//registration
Route::get('/reg',[AdvisorRegContoller::class,'index']);
Route::post('/reg',[AdvisorRegContoller::class,'Register']);


//Qualification
Route::get('/edu',[educationController::class,'Education']);
Route::post('/Insertedu',[educationController::class,'Insertedu']);
Route::get('/list',[educationController::class,'showqualification']);

Route::get('delete/{id}',[educationController::class,'deletequalification']);

Route::get('edit/{id}',[educationController::class,'ShowData']);
Route::post('/edit',[educationController::class,'Update']);

// Route::get('rdvisor/ad_profile1', function () {
//     return view('dashboards.advisor');
// })->name("advisors.dashboard");
//Dashbord
Route::get('/show',[DashbordsController::class,'Dashbord'])->name("advisors.dashboard");
Route::post('/startupdate', [DashbordsController::class, 'UpdateDashbord'])->middleware('adminupdatecheck');

//Route::get('/qualificationShow',[DashbordsController::class,'qualificationShow']);

//Replies
Route::get('/reply',[RepliesController::class,'Replies']);
Route::post('/reply',[RepliesController::class,'reply']);

Route::get('/list2',[RepliesController::class,'showReplies']);
Route::get('delete/{id}',[RepliesController::class,'deleteReplies']);

Route::get('edit2/{id}',[RepliesController::class,'ShowReply']);
Route::post('/edit2',[RepliesController::class,'RepliesUpdate']);
//Profile
Route::get('/list3',[AdvisorRegContoller::class,'Myprofile']);
Route::get('edit3/{id}',[AdvisorRegContoller::class,'Showprofile']);

Route::post('/edit3',[AdvisorRegContoller::class,'ProfileUpdate']);


Route::get('/react', function () {
    return view('react');
});

Route::get('/singupreact', function () {
    return view('singupreact');
});

Route::get('send-email', [SendEmailController::class, 'index']);

Route::get('/sendemail', [MailController2::class,'index']);
Route::post('/sendemail/send',[MailController2::class,'send']);

Route::get('/singupreact1', function () {
    return view('Register');
});
