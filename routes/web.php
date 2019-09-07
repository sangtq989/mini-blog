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

// Route::get('/', function () {
//     return view('core.layout');
// })->name('home');

Route::group([
	
	'namespace'=>'Authen',//ten namespace
	'as' => 'core.',
	
],function(){
	
	Route::post('/handle-login','LoginController@handleLogin')->name('handleLogin');

	Route::get('log-out','LoginController@logOut')->name('logOut');

	Route::get('register','RegisterController@index')->name('register');
	route::post('register/store','RegisterController@store')->name('store');

	
});

Route::group([
	'namespace'=>'ViewController',
	'as' => 'view.'
	

],function(){
	Route::get('/','HomeController@index')->name('home');
	Route::get('/category/{id}/{slug}','CategoryController@index')->name('cate');
	Route::get('/tag/{id}/{slug}','TagController@index')->name('tag');
	Route::get('detail/{slug}/{id}','DetailController@index')->name('detail');
	Route::get('author/@{user_name}','AuthorController@index')->name('author');



	
});

Route::group([
	'prefix' => 'profile',
	'middleware' => 'login',
	'namespace' => 'AccountController',
	'as' => 'acc.'
],function(){
	Route::post('/handle-edit','ProfileController@handle')->name('profile');
	Route::get('/','PostAccountController@index')->name('index');

	Route::get('/create','PostAccountController@create')->name('create');
	Route::post('/store','PostAccountController@store')->name('store');
	
	Route::get('/edit/{slug}/{id}','PostAccountController@edit')->name('edit');
	Route::post('update','PostAccountController@update')->name('update');

	Route::delete('/delete/{id}','PostAccountController@destroy')->name('delete');

	Route::get('/disable/{id}','PostAccountController@disable')->name('disable');
	Route::get('/enable/{id}','PostAccountController@enable')->name('enable');

	Route::get('off-comment/{id}','PostAccountController@offComment')->name('off');
	Route::get('on-comment/{id}','PostAccountController@onComment')->name('on');
});
Route::group([
	'middleware' => 'login',
	'namespace' => 'ViewController',
	'as' => 'com.'
],function (){
	Route::post('/comment/store', 'CommentController@store')->name('add');
	Route::post('reply/store/{commentId}','CommentController@ReplyStore')->name('rep');
});
Route::post('/upload_image', function() {
    $CKEditor = Input::get('CKEditor');
    $funcNum = Input::get('CKEditorFuncNum');
    $message = $url = '';
    if (Input::hasFile('upload')) {
        $file = Input::file('upload');
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $file->move(storage_path().'/images/', $filename);
            $url = public_path() .'/images/' . $filename;
        } else {
            $message = 'An error occured while uploading the file.';
        }
    } else {
        $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
});

// Route::group(['middleware' => 'login'], function() {
//  Route::resource('info','AccountController\PostAccountController');
// });



// Auth::routes();

// // Route::get('/home', 'HomeController@index')->name('home');
