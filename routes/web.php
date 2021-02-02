<?php

use Carbon\Carbon;
use App\IronmanNews;
use App\ToolNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // 最新消息
    Route::prefix('news')->group(function () {
        Route::get('create', 'IronmanNewsController@create');
        Route::get('/', 'IronmanNewsController@index');
        Route::get('edit/{id?}', 'IronmanNewsController@edit');
        Route::post('/store', 'IronmanNewsController@store');
        Route::post('/delete', 'IronmanNewsController@destroy');
        Route::post('/update/{id?}', 'IronmanNewsController@update');
    });
    // 最新消息類別
    Route::prefix('news_type')->group(function () {
        Route::get('/create', 'IronmanNewsTypeController@create');
        Route::get('/', 'IronmanNewsTypeController@index');
        Route::get('edit/{id?}', 'IronmanNewsTypeController@edit');
        Route::post('/store', 'IronmanNewsTypeController@store');
        Route::post('/delete/{id?}', 'IronmanNewsTypeController@destroy');
        Route::post('/update/{id?}', 'IronmanNewsTypeController@update');
    });
    // 最新工具消息
    Route::prefix('toolnews')->group(function () {
        Route::get('create', 'ToolNewsController@create');
        Route::get('/', 'ToolNewsController@index');
        Route::get('edit/{id?}', 'ToolNewsController@edit');
        Route::post('/store', 'ToolNewsController@store');
        Route::post('/delete/{id?}', 'ToolNewsController@destroy');
        Route::post('/update/{id?}', 'ToolNewsController@update');
    });
    // 工具消息類別
    Route::prefix('toolnews_type')->group(function () {
        Route::get('/create', 'ToolNewsTypeController@create');
        Route::get('/', 'ToolNewsTypeController@index');
        Route::get('edit/{id?}', 'ToolNewsTypeController@edit');
        Route::post('/store', 'ToolNewsTypeController@store');
        Route::post('/delete/{id?}', 'ToolNewsTypeController@destroy');
        Route::post('/update/{id?}', 'ToolNewsTypeController@update');
    });
    // 作者
    Route::prefix('news_author')->group(function () {
        Route::get('/create', 'NewsAuthorTypeController@create');
        Route::get('/', 'NewsAuthorTypeController@index');
        Route::get('edit/{id?}', 'NewsAuthorTypeController@edit');
        Route::post('/store', 'NewsAuthorTypeController@store');
        Route::post('/delete/{id?}', 'NewsAuthorTypeController@destroy');
        Route::post('/update/{id?}', 'NewsAuthorTypeController@update');
    });

    // SummerNote上傳
    Route::post('/ajax_upload_img', 'AdminController@ajax_upload_img');
    Route::post('/ajax_delete_img', 'AdminController@ajax_delete_img');
});


//前台

Route::get('/download/{id}', 'FrontController@download');
Route::group(['prefix' => '{local?}'], function () {
    Route::get('/', 'FrontController@index');
    Route::get('/ironman', 'FrontController@news');
    Route::get('/ironman/{id}', 'FrontController@newsDetail');
    Route::get('/keyword/ironman/{id}/{keyword}', 'FrontController@ironmanKeyword');
    Route::get('/tool', 'FrontController@toolNews');
    Route::get('/tool/{id}', 'FrontController@toolNewsDetail');
    Route::get('/keyword/tool/{id}/{keyword}', 'FrontController@toolKeyword');
});

Route::post('/list/news', 'FrontController@newsMore');
Route::post('/list/news/type', 'FrontController@newsType');
Route::post('/list/news/search', 'FrontController@newsSearch');

Route::post('/list/toolNews', 'FrontController@toolNewsMore');
Route::post('/list/toolNews/type', 'FrontController@toolNewsType');
Route::post('/list/toolnews/search', 'FrontController@toolNewsSearch');
