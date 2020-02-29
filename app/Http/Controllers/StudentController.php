<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
// use Validator;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s_name=request()->s_name??'';
        $class=request()->class??'';
        $where=[];
        if($s_name){
            $where[]=["s_name","like","%$s_name%"];
        }
        if($class){
            $where[]=["class","like","%$class%"];
        }
      // $res=DB::table('student')->select('*')->get();
        $pageSize=config('app.pageSize');
        $res=Student::where($where)->orderby('s_id','desc')->paginate($pageSize);
      
      //是ajax请求 即要实现ajax分页
        // dd(request()->ajax());
        if(request()->ajax()){
            return view("student.ajaxPage",['res'=>$res,'s_name'=>$s_name,'class'=>$class]);
        }

        return view("student.index",['res'=>$res,'s_name'=>$s_name,'class'=>$class]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.表单验证 validate
        // $request->validate([
        //         's_name' => 'required|unique|alpha_dash|min:2|max:12',
        //         's_sex' => 'required|numeric',
        //         'result' => 'required|numeric|between:0,100',
        //          ],['s_name.required' => '学生名字不能为空',
        //             's_name.alpha_dash' => '必须是数字字母下划线',
        //             's_name.unique' => '学生名字已存在',
        //             's_name.min' => '名字长度最小2位',
        //             's_name.max' => '名字长度最大12位',
        //             's_sex.required' => '性别不能为空',
        //             's_sex.numeric' => '性别必须是数字',
        //             'result.required'=>'成绩必填',
        //             'result.numeric'=>'成绩必须是数字',
        //             'result.between'=>'成绩不得超过100分',
        // ]);

        $data=$request->except('_token');
        // dd($data);
        //上传文件
        if($request->hasFile('s_img')){
            $data['s_img']=$this->upload('s_img');
        }

        $res=DB::table("student")->insert($data);


        return redirect('/student');
    }

    //上传文件
    public function upload($filename){
        //判断上传文件中是否出错
        if(request()->file('s_img')->isValid()){
            //接受值
            $photo =request()->file('s_img');
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit("为获取到上传文件或者上传过程出错");

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
        $res=DB::table("student")->where('s_id',$id)->first();
        
        return view("student.edit",['res'=>$res]);
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
        $data=$request->except('_token');
        $res=DB::table("student")->where("s_id",$id)->update($data);
        if($res!==false){
           return redirect('/student');
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
       $res=DB::table("student")->where("s_id",$id)->delete();
       if($res){
        return redirect('/student');
       }
    }
}
