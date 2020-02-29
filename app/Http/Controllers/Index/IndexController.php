<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class IndexController extends Controller
{
	public function setCookie(){
		//第一种
		// return response('测试产生cookie')->cookie('name','huanhuan',2);

		//第二种 cookie全局辅助函数
		// $cookie=cookie('name','yixing',2);
		// return response('测试产生cookie2')->cookie($cookie);
		
		//第三种 队列形式设置cookie
		// Cookie::queue(Cookie::make('age', '18', 2));

		//第四种
		// Cookie::queue('aa','11',2);
	}
    public function index(){
    	//获取cookie第一种
    	// echo request()->cookie('name');
    	// 获取cookie第二种
    	// $value = Cookie::get('aa');
    	// echo $value;
    	return view('index.index');
    }
    
}