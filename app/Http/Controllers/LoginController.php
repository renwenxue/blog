<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    public function login(){
        return view("login.login");
    }
    public function logindo(Request $request){
        $admin=$request->except("_token");

        $admin['upwd']=md5(md5($admin['upwd']));
        
        $res=Admin::where($admin)->first();

        if($res){
            session(['admin'=>$res]);
            $request->session()->save();
            return redirect('/index');
        }
        
    }


   
}
