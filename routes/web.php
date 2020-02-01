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
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::group(['middleware'=>['auth:web','auto-check-permission']],function (){

    Route::group(['prefix' => 'admin'],function (){

        Route::get('home', 'HomeController@index')->name('home');
        Route::resource('governorates','GovernoratesController');
        Route::resource('cities','CitiesController');
        Route::resource('categories','CategoriesController');
        Route::resource('roles','RoleController');

        Route::group(['prefix' => 'settings'],function (){
            Route::get('index','SettingsController@index')->name('settings.index');
            Route::get('{id}/edit','SettingsController@edit')->name('settings.edit');
            Route::patch('{id}','SettingsController@update')->name('settings.update');
        });

        Route::group(['prefix' => 'clients'],function (){
            Route::get('index','ClientsController@index')->name('clients.index');
            Route::get('isActive/{id}','ClientsController@isActive')->name('clients.active');
            Route::delete('trash/{id}','ClientsController@delete')->name('client.trash');
            Route::get('trashed','ClientsController@trashed')->name('client.trashed');
            Route::get('search','ClientsController@search')->name('client.search');
            Route::delete('delete/{id}','ClientsController@destroy')->name('client.delete');
            Route::get('restore/{id}','ClientsController@restore')->name('client.restore');
        });

        Route::resource('posts','PostsController');
//        Route::get('posts/{id}','PostsController@showPost')->name('post.show');

        Route::get('contacts','ContactsController@index')->name('contacts.index');
        Route::delete('contact/{id}','ContactsController@destroy')->name('contacts.destroy');
        Route::get('contacts/search','ContactsController@search')->name('contact.search');
        Route::group(['prefix'=>'donation-request'],function (){
            Route::get('index','DonationRequestController@index')->name('donation.index');
            Route::delete('{id}','DonationRequestController@destroy')->name('donation.destroy');
            Route::get('show/{id}','DonationRequestController@show')->name('donation.show');
            Route::get('search','DonationRequestController@search')->name('donation.search');

        });
        Route::resource('users','UserController');
        Route::resource('profile','ProfileController')->except(['create', 'show','destroy','store']);

    });

});





Route::group([ 'middleware'=>'auth:site_client'],function (){

    Route::post('toggle-favourite','PostsController@toggleFavourite')->name('toggle-favourite');
});

Route::group(['prefix' => 'Blood-Bank' , 'namespace'=>'Web' ],function (){
    Route::group([ 'middleware'=>'auth:site_client'],function (){
//auth('site_client')->user();
        Route::get('profile/{id}','HomeController@profile')->name('client.profile');
        Route::get('profile/{id}/edit','HomeController@editProfile')->name('edit.profile');
        Route::get('profile/change-password/{id}','HomeController@changePasswordPage')->name('edit.password');
        Route::put('profile/change-password/{id}','HomeController@changePassword')->name('Change.password');
        Route::put('profile/update/{id}','HomeController@updateProfile')->name('update.profile');
Route::get('fav-posts/{id}','HomeController@favProfile')->name('fav.posts');

    });
    Route::get('index','HomeController@index')->name('home.page');
    Route::get('login','AuthController@showLoginPage')->name('loginPage.client');
    Route::post('login','AuthController@login')->name('login.client');
    Route::get('sign-up','AuthController@showRedisterPage')->name('registerPage.client');
    Route::post('sign-up','AuthController@register')->name('register.client');

    Route::get('About-us','GeneralController@showAbout')->name('about.page');
    Route::resource('requests','DonationController');
    Route::resource('contact','GeneralController');
    Route::get('article/{id}','HomeController@ShowArticale')->name('article.page');
    Route::get('articles','HomeController@showArticles')->name('articles.page');

});
Route::post('client-logout', function (){
    auth('site_client')->logout();
    return back();
});





