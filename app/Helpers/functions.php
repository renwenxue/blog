<?php 
 //无限极分类
function wuxianji($data,$parent_id=0,$level=0){
            static $new_array=[];
            if(!$data){
                return;
            }
            foreach($data as $k=>$v){
                if($v->parent_id==$parent_id){
                    $v->level=$level;
                    $new_array[]=$v;
                    //调用自身
                    wuxianji($data,$v->cate_id,$level+1);
                }
                 
            }
            return $new_array;
         

    }
//单文件上传
  function upload($filename){
         //判断上传当中有没有错
        if(request()->file($filename)->isValid()){
            //接受值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
            exit("为获取到上传文件或者上传过程出错");
    }

//多文件上传
  function uploads($filename){
         //先接收传过来的值
          $photo=request()->file($filename);
         //判断是否是数组
          if(!is_array($photo)){
            return;
          }

         //打印出photo是个数组 每个图片对应的是键的值 用foreach循环
         foreach($photo as $v){
            //判断上传当中有没有错
            if($v->isValid()){
            //上传
            $store_result[]=$v->store('uploads');
           
            }
         }
            return $store_result;           
    }
