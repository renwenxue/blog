<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Validator;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a_title=request()->a_title??'';
        $a_type=request()->a_type??'';
        $where=[];
        if($a_title){
            $where[]=["a_title","like","%$a_title%"];
        }
        if($a_type){
            $where[]=["a_type","like","%$a_type%"];
        }
    
        $pageSize=config('app.pageSize');
        $res=Article::where($where)->orderby('a_id','desc')->paginate($pageSize);
        return view("/article.index",['res'=>$res,'a_title'=>$a_title,'a_type'=>$a_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("/article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->except('_token');

       //3.表单验证
        $validator = Validator::make($data,[
                            'a_title' => 'required|unique:article|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]+$/u',
                            'a_type' => 'required',
                            'import' => 'required',
                            'is_show' => 'required',
                             ],[
                                'a_title.required' => '文章不能为空',
                                'a_title.unique' => '文章名称已存在',
                                'a_title.regex' => '中文数字字母下划线',
                                'a_type.required' => '文章分类不能为空',
                                'import.required' => '文章重要性不能为空',
                                'is_show.required' => '是否显示不能为空',
                                
        ]);
                    if ($validator->fails()){
                        return redirect('article/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //文件上传
        if($request->hasFile('img')){
            $data['img']=upload('img');
        }
        //时间
        $data['add_time']=time();

        $res=Article::create($data);
        if($res){
            return redirect('/article');
        }

    }

    //文件上传
    public function upload($filename){
         //判断上传当中有没有错
        if(request()->file('img')->isValid()){
            //接受值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
            exit("为获取到上传文件或者上传过程出错");
    }

    //ajax 唯一性验证
    public function checkOnly(){
        $a_title=request()->a_title;

        $count=Article::where(['a_title'=>$a_title])->count();
        echo json_encode(['code'=>'00000','msg'=>'ok','count'=>$count]);
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
        $res=Article::where("a_id",$id)->first();
        return view("/article.edit",['res'=>$res]);

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
        //文件上传
        if($request->hasFile('img')){
            $data['img']=$this->upload('img');
        }

        $res=Article::where("a_id",$id)->update($data);
        if($res!==false){
            return redirect('/article');
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
        $res=Article::where("a_id",$id)->delete();
        if($res){
        return redirect('/article');
       }
    }
}
