<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "123";
        //清除缓存
        // Cache::flush();
        $page=request()->page??1;
        // $goods=Cache::get('goods');
        // $goods=cache('goods_'.$page);

        $goods=Redis::get('goods_'.$page);

        // dump($goods);
        if(!$goods){
            echo "走DB";
        $pageSize=config("app.pageSize");
        $goods=Goods::leftjoin('brand','goods.b_id','=','brand.b_id')
                    ->leftjoin('category','goods.cate_id','=','category.cate_id')
                    ->orderby('g_id','desc')
                    ->paginate($pageSize);

        // Cache::put('goods',$goods,60*60*24);
        // cache(['goods_'.$page=>$goods],60*60*24);

        $goods=serialize($goods);
         Redis::setex('goods_'.$page,20,$goods);

        }

        $goods=unserialize($goods);

        return view("/goods.index",['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::all();
        $category=Category::all();
        $category=wuxianji($category);
        return view("/goods.create",['brand'=>$brand,'category'=>$category]);
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
        //商品货号
        $data['g_sn']=$this->CreateGoodsSn();
        
        //单文件上传
        if ($request->hasFile('g_img')) {
            $data['g_img']=upload('g_img');
        }
        //多文件上传
        if($data['g_imgs']){
            $g_imgs=$data['g_imgs']=uploads('g_imgs');
            //把数组转化为字符串才能入库
            $data['g_imgs']=implode('|',$g_imgs);

        }

        //入库
        $res=Goods::create($data);
        if($res){
            return redirect("/goods");
        }
       
    }
    //商品货号
    public function CreateGoodsSn(){
        return 'goods'.date('YmdHis').rand(1000,9999);
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        //预览详情
        //访问量
        $count=Redis::setnx('num_'.$id,1);
        if(!$count){
            $count=Redis::incr('num_'.$id);
        }

        $goods=Goods::where("g_id",$id)->first();
        
        return view('goods.show',['goods'=>$goods,'count'=>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=Goods::where('g_id',$id)->first();        
        $brand=Brand::all();
        $category=Category::all();
        $category=wuxianji($category);
        return view("/goods.edit",['brand'=>$brand,'category'=>$category,'res'=>$res]);
                    
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
        if ($request->hasFile('g_img')) {
            $data['g_img']=upload('g_img');
        }
        //多文件上传
        if($data['g_imgs']){
            $g_imgs=$data['g_imgs']=uploads('g_imgs');
            //把数组转化为字符串才能入库
            $data['g_imgs']=implode('|',$g_imgs);

        }

        $res=Goods::where("g_id",$id)->update($data);
        if($res!==false){
            return redirect("/goods");
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
        $res=Goods::where("g_id",$id)->delete();
        if($res){
            return redirect("/goods");
        }
    }
}
