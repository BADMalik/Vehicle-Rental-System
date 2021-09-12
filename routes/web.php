<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
Route::group(['middleware'=>'guest'],function()
{
    Route::get('/login',[Controller::class,'login'])->name('login');
    Route::post('/verifyUser',[Controller::class,'verifyUser'])->name('verifyUser');
    Route::get('/signup',[Controller::class,'signup'])->name('signup');
    Route::post('/registerUser',[Controller::class,'create'])->name('registerUser');

});

Route::group(['middleware' => ['auth','user']], function ()
{
    // Auth::loginUsingId(4);

    Route::get('/product/view/{id}',[Controller::class,'viewProduct'])->name('product.view');
    Route::get('/product/owner/{user_id}',[Controller::class,'productOwner'])->name('userProfile');
    Route::get('/addPost',[Controller::class,'addPost'])->name('addPost');
    Route::post('/createPost',[Controller::class,'createPost'])->name('createPost');
    Route::put('/updatePost/{id}',[Controller::class,'updatePost'])->name('updatePost');
    Route::get('/editPost/{id}',[Controller::class,'editPost'])->name('editPost');
    Route::get('/editProfile/{id}',[Controller::class,'editProfile'])->name('editProfile');
    Route::put('/updateProfile/{id}',[Controller::class,'updateProfile'])->name('updateProfile');
    // Route::get('')

    // Route::get('/logout',[Controller::class,'logout'])->name('logout');
    Route::put('/updateUserProfilePicture/{id}',[Controller::class,'updateUserProfilePicture'])->name('updateUserProfilePicture');
    Route::put('/editPostProfilePicture/{id}',[Controller::class,'updatePostProfilePicture'])->name('updatePostProfilePicture');
    Route::get('/home',[Controller::class,'index'])->name('home');
    Route::get('/ad/deleteUserAd/{id}',[Controller::class,'deleteUserAd'])->name('deleteUserAd');

    //admin

});

    Route::get('/logout',[Controller::class,'logout'])->name('logout');
Route::group(['middleware' => ['auth','admin']], function ()
{

    Route::get('/ad/delete/{id}',[Controller::class,'deleteAd'])->name('deleteAd');
    Route::get('/ad/addToPending/{id}',[Controller::class,'addToPending'])->name('addToPending');
    // Route::get('/ad/approveDeleted/{id}',[Controller::class,'approveDeleted'])->name('approveDeleted');
    Route::get('/ad/unapprove/{id}',[Controller::class,'unApproveAd'])->name('unApproveAd');
    Route::get('/ad/status/update/{id}',[Controller::class,'updateAdStatus'])->name('approveAd');
    Route::get('/admin/home',[Controller::class,'adminHome'])->name('adminHome');
});

