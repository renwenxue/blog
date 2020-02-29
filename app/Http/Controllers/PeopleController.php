<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePeoplePost;
use Validator;
use Illuminate\Validation\Rule;

// use DB;
use App\People;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     * 列表展示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username=request()->username??'';
        $where=[];
        if($username){
            $where[]=["username","like","%$username%"];
        }


        // $data=DB::table("people")->select('*')->get();
        //ORM
        // $data=People::all();
        $pageSize=config('app.pageSize');
        $data=People::where($where)->orderby('p_id','desc')->paginate($pageSize);
        return view('/people.index',['data'=>$data,'username'=>$username]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/people.create');
    }

    /**
     * Store a newly created resource in storage.
     * 执行添加页面
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //2.表单验证
    // public function store(StorePeoplePost $request)
    {
        //1.表单验证 validate
        // $request->validate([
        //         'username' => 'required|unique:people|min:2|max:12',
        //         'age' => 'required|numeric|between:1,130',
                 // ],['username.required' => '名字不能为空',
                 //    'username.unique' => '名字已存在',
                 //    'username.min' => '名字长度最小2位',
                 //    'username.max' => '名字长度最大12位',
                 //    'age.required' => '年龄不能为空',
                 //    'age.numeric' => '年龄必须是数字',
                 //    'age.between' => '年龄不能超过130',

        // ]);

        $data=$request->except('_token');
        // dd($data);
        //3.表单验证
        $validator = Validator::make($data,[
                            'username' => 'unique:people|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                            'age' => 'required|numeric|between:1,130',
                             ],[
                                'username.unique' => '名字已存在',
                                'username.regex' => '中文数字字母下划线2-12位之间',
                                'age.required' => '年龄不能为空',
                                'age.numeric' => '年龄必须是数字',
                                'age.between' => '年龄不能超过130',
                                
        ]);
                    if ($validator->fails()){
                        return redirect('people/create')
                        ->withErrors($validator)
                        ->withInput();
        }



        //文件上传
        if($request->hasFile('head')){
            $data['head']=$this->upload('head');
            // dd($img);

        }


        $data['add_time']=time();
        // $res=DB::table('people')->insert($data);
    // ORM方法一 
        // $people=new People;
        // $people->username=$data['username'];
        // $people->age=$data['age'];
        // $people->card=$data['card'];
        // $people->head=$data['head'];
        // $people->add_time=$data['add_time'];
        // $people->is_hubei=$data['is_hubei'];
        // $res=$people->save();
    // ORM方法二
        $res=People::create($data);
        if($res){
            return redirect('/people');
        }
    }

    //上传文件
    public function upload($filename){
        //判断上传当中有没有错
        if(request()->file('head')->isValid()){
            //接受值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
            exit("为获取到上传文件或者上传过程出错");
    }

    /**
     * Display the specified resource.
     * 预览详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        // $res=DB::table("people")->where('p_id',$id)->first();
    // ORM方法一 
        $res=People::where("p_id",$id)->first();

        return view("people.edit",['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     * 执行编辑页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except('_token');

        $validator = Validator::make($data,[
                            // 'username' => 'unique:people|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                'username'=>[
                                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                                Rule::unique('people')->ignore($id,'p_id'),
                            ],
                                 'age' => 'required|numeric|between:1,130',
                            ],[
                                'username.unique' => '名字已存在',
                                'username.regex' => '中文数字字母下划线2-12位之间',
                                'age.required' => '年龄不能为空',
                                'age.numeric' => '年龄必须是数字',
                                'age.between' => '年龄不能超过130',
                                
        ]);
                    if ($validator->fails()){
                        return redirect('people/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }



         //文件上传
        if($request->hasFile('head')){
            $data['head']=$this->upload('head');
        }
        // $res=DB::table("people")->where('p_id',$id)->update($data);
        $res=People::where("p_id",$id)->update($data);
        if($res!==false){
            return redirect('/people');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $res=DB::table("people")->where('p_id',$id)->delete();
        $res=People::where("p_id",$id)->delete();
       if($res){
        return redirect('/people');
       }
    }
}
