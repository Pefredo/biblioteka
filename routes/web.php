<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('hello')->group(function (){
	Route::get('/world', function () {
    echo "Witaj swiecie";
	});
	
	Route::get('/{name?}/{age?}', function (String $name = "Nieznajomy", int $age = null) {
    echo "Witaj, ". $name;
		if(is_null($age)){
			echo ". Nie podałeś wieku!";
		}else{
			echo ", masz już ". $age . " lat!";
		}
	
	});
});

Route::redirect('/witaj-swiecie', '/hello/world',301);
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', 'Bookcontroller');

Route::get('onlyjson', function(){
	//
})->middleware('isjson');


Route::group(['middleware' => 'isjson'], function(){
	
});

