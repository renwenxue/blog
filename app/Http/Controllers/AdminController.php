<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res=Admin::all();

        return view("/admin.index",['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("/admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");
        $data['upwd']=md5($data['upwd']);
        $data['repwd']=md5($data['repwd']);
        //3.表单验证
        $validator = Validator::make($data,[
                'username' => 'unique:admin|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,8}$/u',
                'upwd' => 'required',
                'repwd' => 'required',
                'tel' => 'required',
                'email' => 'required',
            ],[
                'username.unique' => '名字已存在',
                'username.regex' => '中文数字字母下划线2-8位之间',
                'upwd.required' => '密码不能为空',
                'repwd.required' => '确认密码不能为空',
                'tel.required' => '手机号不能为空',
                'email.required' => '邮箱不能为空',
                
        ]);

        if ($validator->fails()){
                return redirect('admin/create')
                ->withErrors($validator)
                ->withInput();
        }




        //单文件上传
        if ($request->hasFile('img')) {
            $data['img']=upload('img');
        }
        $res=Admin::create($data);
        if($res){
            return redirect("/admin");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=Admin::where("uid",$id)->first();

        return view("/admin.edit",['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except("_token");
        //单文件上传
        if ($request->hasFile('img')) {
            $data['img']=upload('img');
        }
        $res=Admin::where("uid",$id)->update($data);
        if($res!==false){
            return redirect("/admin");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Admin::where("uid",$id)->delete();
        if($res){
            return redirect("/admin");
        }
    }
}
