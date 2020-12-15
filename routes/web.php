<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\HomeControllerSite;
use App\Http\Controllers\Site\StaticPagesController;
use App\Http\Controllers\Site\PageControllerSite;
use App\Http\Controllers\Admin\HomeControllerAdmin;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PagecontentsController;
use App\Http\Controllers\Admin\SettingController;

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

Route::get('/',[HomeControllerSite::class,'index'])->name('home');




//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('painel')->group(function(){
    Route::get('/',[HomeControllerAdmin::class,'index'])->name('painel');
    //Login no Painel de Controle
    Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class, 'index'])->name('painel-login');
    Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'authenticate']);
    Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('painel-logout');
    //Registro no Painel de Controle
    Route::get('/register',[App\Http\Controllers\Admin\Auth\RegisterController::class,'index'])->name('painel-register');
    Route::post('/register',[App\Http\Controllers\Admin\Auth\RegisterController::class,'register']);

    //Editar Paginas
    Route::resource('/pages', PagesController::class);

    Route::resource('/page/{pageid}/pagecontent', PagecontentsController::class);

    //Configurações
    Route::get('/settings',[SettingController::class,'index'])->name('settings');
    Route::put('/settingssave',[SettingController::class,'save'])->name('settings.save');

    
});

Route::get('/{slug}',[PageControllerSite::class,'index']);
