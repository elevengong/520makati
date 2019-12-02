<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']],function () {

    //---------------------前端------------------------
    Route::get('/','frontend\IndexController@index');
    Route::get('/beauty/{id}','frontend\IndexController@beauty')->where(['id' => '[0-9]+']);
    Route::get('/contact','frontend\IndexController@contact');



    //---------------------后台------------------------
    Route::any('/backend/login','backend\LoginController@login');
    Route::get('/backend/code','backend\LoginController@code');

});


//---------------------后台------------------------
Route::group(['middleware' => ['web','admin.login']],function () {
    Route::get('/backend/index','backend\IndexController@index');
    Route::post('/backend/logout','backend\IndexController@logout');
    Route::post('/backend/changepwd','backend\IndexController@changepwd');

    Route::any('/backend/adminlist','backend\AdminController@adminList');
    Route::any('/backend/admin/changestatus','backend\AdminController@changestatus');
    Route::delete('/backend/admin/delete/{admin_id}','backend\AdminController@delete')->where(['admin_id' => '[0-9]+']);
    Route::post('/backend/admin/add','backend\AdminController@adminadd');

    //国家
    Route::any('/backend/nation/list','backend\NationController@nationlist');
    Route::any('/backend/nation/nationedit/{id}','backend\NationController@nationedit')->where(['id' => '[0-9]+']);
    Route::any('/backend/nation/nationadd','backend\NationController@nationadd');
    Route::delete('/backend/nation/delete/{id}','backend\NationController@delete')->where(['id' => '[0-9]+']);

    //贵妃管理
    Route::any('/backend/girls/girllist','backend\GirlsController@girllist');
    Route::any('/backend/girls/girladd','backend\GirlsController@girladd');
    Route::any('/backend/girls/girledit/{id}','backend\GirlsController@girledit')->where(['id' => '[0-9]+']);
    Route::delete('/backend/girls/delete/{id}','backend\GirlsController@delete')->where(['id' => '[0-9]+']);
    Route::any('/backend/girls/girlphotolist/{id}','backend\GirlsController@girlphotolist')->where(['id' => '[0-9]+']);
    Route::delete('/backend/girls/girlphotodelete/{id}','backend\GirlsController@girlphotodelete')->where(['id' => '[0-9]+']);
    Route::any('/backend/girls/girlphotoadd/{id}','backend\GirlsController@girlphotoadd')->where(['id' => '[0-9]+']);



    //设置常用属性
    Route::get('/backend/attributelist','backend\IndexController@attributelist');
    Route::any('/backend/addstatic','backend\IndexController@addstatic');
    Route::any('/backend/editstatic/{id}','backend\IndexController@editstatic')->where(['id' => '[0-9]+']);
    Route::delete('/backend/delstatic/{id}','backend\IndexController@delstatic')->where(['id' => '[0-9]+']);

    //图片上传
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});



