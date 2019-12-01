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




    Route::any('/backend/manhua/addmanhua','backend\ManhuaController@addmanhua');
    Route::any('/backend/manhua/editmanhua/{manhua_id}','backend\ManhuaController@editmanhua')->where(['manhua_id' => '[0-9]+']);
    Route::any('/backend/manhua/chapterlist/{manhua_id}','backend\ManhuaController@chapterlist')->where(['manhua_id' => '[0-9]+']);
    Route::any('/backend/manhua/addchapter','backend\ManhuaController@addchapter');
    Route::any('/backend/manhua/editchapter/{chapter_id}','backend\ManhuaController@editchapter')->where(['chapter_id' => '[0-9]+']);
    Route::get('/backend/manhua/viewchapterphotos/{chapter_id}','backend\ManhuaController@viewchapterphotos')->where(['chapter_id' => '[0-9]+']);
    Route::any('/backend/manhua/savechapterphotos/{chapter_id}','backend\ManhuaController@savechapterphotos')->where(['chapter_id' => '[0-9]+']);

    //设置常用属性
    Route::get('/backend/attributelist','backend\IndexController@attributelist');
    Route::any('/backend/addstatic','backend\IndexController@addstatic');
    Route::any('/backend/editstatic/{id}','backend\IndexController@editstatic')->where(['id' => '[0-9]+']);

    //图片上传
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});


//支付接口
Route::get('/pay','backend\PaymentController@pay');
Route::post('/paymentpage','backend\PaymentController@paymentpage');

Route::post('/callback','backend\PaymentController@callBack');
//支付回调


