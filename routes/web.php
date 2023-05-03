<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Immob;

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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [Immob::class, 'mainpage']);

Route::get('/allpropertiesforsale', [Immob::class, 'all_properties_for_sale']);

Route::get('/allpropertiesforrent', [Immob::class, 'all_properties_for_rent']);

Route::get('/allhouses', [Immob::class, 'all_houses']);

Route::get('/allappartments', [Immob::class, 'all_appartments']);

Route::get('/allstudios', [Immob::class, 'all_studios']);

Route::get('/allvillas', [Immob::class, 'all_villas']);

Route::get('/allparkings', [Immob::class, 'all_parkings']);

Route::get('/register', [Immob::class, 'register']);

Route::get('/login', [Immob::class, 'login']);



Route::get('/getaddanad', [Immob::class, 'get_add_an_ad']);
Route::post('/postaddanad', [Immob::class, 'post_add_an_ad']);



Route::get('/myads', [Immob::class, 'my_ads']);
Route::post('/deleteanad/{id}', [Immob::class, 'delete_an_ad']);
Route::get('/geteditanad/{id}', [Immob::class, 'get_edit_an_ad']);
Route::post('/posteditanad/{id}', [Immob::class, 'post_edit_an_ad']);
Route::post('/changepropertyvisibility/{id}', [Immob::class, 'change_property_visibility']);

Route::post('/updatepropertycover/{id}', [Immob::class, 'update_property_cover']);
Route::post('/deletepropertycover/{id}', [Immob::class, 'delete_property_cover']);