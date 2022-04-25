<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adsController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;


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

Route::get('/', [AdsController::class, 'index'])->name('index');
Route::get('/index/{p}', [AdsController::class, 'pages'])->name('pages');
Route::get('/show/{id}', [AdsController::class, 'show'])->name('show');
Route::post('/filter', [AdsController::class, 'filter'])->name('filter');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

Route::middleware([AuthMiddleware::class])->group(function () {

    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

    Route::get('/EspacePersoUsers', [AdsController::class, 'EspacePersoUsers'])->name('EspacePersoUsers');

    Route::get('/NewAd', [AdsController::class, 'NewAd'])->name('NewAd');
    Route::post('/NewAd', [AdsController::class, 'createNewAd'])->name('createNewAd');
    Route::get('/updAd/{id}', [AdsController::class, 'updAd'])->name('updAd1');
    Route::post('/updAd', [AdsController::class, 'UpdateAd'])->name('UpdateAd1');
    Route::get('/admin/delAds/{id}', [AdsController::class, 'delAd'])->name('delAds');
});

route::middleware([AuthMiddleware::class, AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/aAds', [AdminController::class, 'aAds'])->name('aAds');
    Route::get('/admin/aCategory', [AdminController::class, 'aCategory'])->name('aCategory');
    Route::get('/admin/aLocations', [AdminController::class, 'aLocations'])->name('aLocations');
    Route::get('/admin/aUser', [AdminController::class, 'aUsers'])->name('adminUser');

    Route::get('/admin/newCat', [AdminController::class, 'newCat'])->name('newCat');
    Route::get('/admin/newLocation', [AdminController::class, 'newLocation'])->name('newLocation');
    Route::get('/admin/newUser', [AdminController::class, 'newUser'])->name('newUser');

    Route::post('/admin/NewUser', [AdminController::class, 'createNewUser'])->name('createNewUser');
    Route::post('/admin/NewCat', [AdminController::class, 'createNewCat'])->name('createNewCat');
    Route::post('/admin/newLocation', [AdminController::class, 'createNewLoc'])->name('createNewLoc');

    Route::get('/admin/updCat/{id}', [AdminController::class, 'updCat'])->name('updCat');
    Route::post('/admin/updCat', [AdminController::class, 'updateCat'])->name('updateCat');
    Route::get('/admin/updLocation/{id}', [AdminController::class, 'updLocation'])->name('updLocation');
    Route::post('/admin/updLoc', [AdminController::class, 'updateLoc'])->name('updateLoc');
    Route::get('/admin/updUser/{id}', [AdminController::class, 'updUser'])->name('updUser');
    Route::post('/admin/updUser', [AdminController::class, 'updateUser'])->name('updateUser');



    Route::get('/admin/delCat/{id}', [AdminController::class, 'delCat'])->name('delCat');
    Route::get('/admin/delLoc/{id}', [AdminController::class, 'delLoc'])->name('delLoc');
    Route::get('/admin/delUser/{id}', [AdminController::class, 'delUser'])->name('delUser');
});



//sending mail

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

Route::get('/send-mail', function () {

    Mail::to('dmahadoo@gmail.com')->send(new MailtrapExample());

    return 'A message has been sent to Mailtrap!';
});
