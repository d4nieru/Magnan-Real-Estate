<?php

use Illuminate\Support\Facades\Route;

use App\Http\controllers\Immob;

use App\Http\Controllers\EmailController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


//Page principale
Route::get('/', [Immob::class,'index']);


//Tous les appartements
Route::get('/showallappartments', [Immob::class,'show_all_appartments']);


//Tous les maisons
Route::get('/showallhouses', [Immob::class,'show_all_houses']);


//Tous les villa
Route::get('/showallvillas', [Immob::class,'show_all_villas']);


//Tous les parkings
Route::get('/showallparkings', [Immob::class,'show_all_parkings']);


//Tous les biens en location
Route::get('/rentingpage', [Immob::class,'renting_page']);


//Tous les biens en vente
Route::get('/propertiesforsale', [Immob::class,'properties_for_sale']);


//Ajouter un bien immobilier
Route::get('/add', [Immob::class,'displayForm']);

Route::post('/add', [Immob::class,'add_realestate']);


//Page Admin avec l'option de supprimer / modifier les biens immobilier
Route::get('/adminpage', [Immob::class,'admin_page']);


//Page de modification
Route::get('/edit', [Immob::class, 'edit_realestate']);

Route::get('/edit/{id}', [Immob::class, 'edit_id_realestate']);


//Route permettant la suppression 
Route::delete('/delete/{id}', [Immob::class, 'delete_id_realestate']);


//Pouvoir envoyer un mail
Route::get('/email', [EmailController::class, 'create']);

Route::post('/email', [EmailController::class, 'sendEmail'])->name('send.email');