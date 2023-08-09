<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Juan Felipe Pinzón";
    return view('home.about')->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("description", $description)
        ->with("author", $author);
})->name("home.about");
Route::get('/contact', function () {
    $title = "Contact us - Online Store";
    $subtitle = "Contact us";
    $email = "prueba@email.com";
    $address = "Av Happiness # 20 - 12";
    $phoneNumber = "+98784 (312) 5452-566";
    return view('home.contact')->with("title", $title)
        ->with("subtitle", $subtitle)
        ->with("email", $email)
        ->with("address", $address)
        ->with("phoneNumber", $phoneNumber);
})->name("home.contact");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");//porque es importante el orden?
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

