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
// 	$name="1908";
//     return view('welcome',['name'=>$name]);
// });
Route::get('/','Index\IndexController@index');
Route::view('/login','index.login');
Route::view('/reg','index.reg');


//1：实现两种方式访问http://www.1908.com/show 输出“这里是商品详情页”字样
Route::get('/show',function(){
	echo "这里是商品的详情页";

});



//2：访问http://www.1908.com/show/1 输出“商品Id是：1”字样
Route::get('/show/{id}',function($id){
	echo "商品id是:".$id;
});

//3：访问http://www.1908.com/show/23/裤子 输出“商品Id是：23，关键字是：裤子”字样
Route::get('/show/{id}/{name}',function($id,$name){
	echo "商品id是:".$id;
	echo "商品名称是:".$name;
});

//4：实现两种方式访问http://www.1908.com/brand/add显示添加界面
Route::get('/brand/add','UserController@add');//添加第一种
Route::get('/brand/adds','UserController@add');//第二种

//5：实现访问http://www.1908.com/category/add显示添加分类界面，并带过去参数 变量 fid=“服装”;
Route::get('/cartgory',function(){
	  $fid="服装";
      return view("cartgory.add",['fid'=>$fid]);
});


Route::get('/user','UserController@index');

Route::get('/adduser','UserController@add');
 //post路由
Route::post('/adddo','UserController@adddo')->name('do');


//正则约束

Route::get('/look/{id}',function($goods_id){
	echo "商品id：".$goods_id;
});

Route::get('/looks/{id}/{name}',function($goods_id,$goods_name){
	echo "商品id：".$goods_id;
	echo "商品名称：".$goods_name;
})->where(['name'=>'[a-zA-Z]+']);


//添加外来人口
Route::prefix('people')->middleware('checklogin')->group(function(){
	Route::get('create','PeopleController@create');
	Route::post('store','PeopleController@store');
	Route::get('/','PeopleController@index');
	Route::get('edit/{id}','PeopleController@edit');
	Route::post('update/{id}','PeopleController@update');
	Route::get('destroy/{id}','PeopleController@destroy');
});

// Route::view('/login','login');
// Route::post('/logindo','LoginController@logindo');


//添加学生
Route::prefix('student')->group(function(){
	Route::get('create','StudentController@create');
	Route::post('store','StudentController@store');
	Route::get('/','StudentController@index');
	Route::get('edit/{id}','StudentController@edit');
	Route::post('update/{id}','StudentController@update');
	Route::get('destroy/{id}','StudentController@destroy');
});


//1.添加品牌
Route::get('/brand/create','BrandController@create');
Route::post('/brand/store','BrandController@store');
Route::get('/brand','BrandController@index');
Route::get('/brand/edit/{id}','BrandController@edit');
Route::post('/brand/update/{id}','BrandController@update');
Route::get('/brand/destroy/{id}','BrandController@destroy');


//文章添加
Route::prefix('article')->middleware('checklogin')->group(function(){
	Route::get('create','ArticleController@create');
	Route::post('store','ArticleController@store');
	Route::get('/','ArticleController@index');
	Route::get('edit/{id}','ArticleController@edit');
	Route::post('update/{id}','ArticleController@update');
	Route::get('destroy/{id}','ArticleController@destroy');
});
//文章唯一性验证
	Route::post('/article/checkOnly','ArticleController@checkOnly');

//2.商品分类的增删查改
	Route::get('/category/create','CategoryController@create');
	Route::post('/category/store','CategoryController@store');
	Route::get('/category','CategoryController@index');
	Route::get('/category/edit/{id}','CategoryController@edit');
	Route::post('/category/update/{id}','CategoryController@update');
	Route::get('/category/destroy/{id}','CategoryController@destroy');


//3.商品的增删改查
	Route::get('/goods/create','GoodsController@create');
	Route::post('/goods/store','GoodsController@store');
	Route::get('/goods','GoodsController@index');
	Route::get('/goods/edit/{id}','GoodsController@edit');
	Route::post('/goods/update/{id}','GoodsController@update');
	Route::get('/goods/destroy/{id}','GoodsController@destroy');
	Route::get('/goods/show/{id}','GoodsController@show');

//4.管理员的增删改查
	Route::get('/admin/create','AdminController@create');
	Route::post('/admin/store','AdminController@store');
	Route::get('/admin','AdminController@index');
	Route::get('/admin/edit/{id}','AdminController@edit');
	Route::post('/admin/update/{id}','AdminController@update');
	Route::get('/admin/destroy/{id}','AdminController@destroy');

//管理员的登录


	Route::get('/user/create','UserController@create');
	Route::post('/user/store','UserController@store');
	Route::get('/user','UserController@index');
	Route::get('/user/edit/{id}','UserController@edit');
	Route::post('/user/update/{id}','UserController@update');
	Route::get('/user/destroy/{id}','UserController@destroy');
//新闻的增删改查
	Route::get('/news/create','NewsController@create');
	Route::post('/news/store','NewsController@store');
	Route::get('/news','NewsController@index');
	Route::get('/news/destroy/{id}','NewsController@destroy');




