<?php

namespace App\Http\Repository;

use App\Http\Model\Category;

class CategoryRepository
{
    protected $Category;

    public function __construct()
    {
        $this->Category = new Category();

    }
    public function Category()
    {
        $Category =Category::where('cate_pid','=',0)->orderBy('cate_order','asc')->get();
        return $Category;
    }

    public function tree(){
      //全部取出資料庫
      //$categorys=$this->all();
      //cate_order 用asc的順序取出資料庫
      $categorys=Category::orderBy('cate_order','asc')->get();

      //將取出的資料透過getTree做處理
      return $categorys;

    }
    public function get_Category_Repository(){
        $Category =Category::all();
        return $Category;
    }

    public function create()
    {   //找出所有cate_pid=0(父級分類)
        $data=Category::where('cate_pid',0)->get();
        return $data;
    }

    public function changeorder($input)
    {
        //從資料庫尋找從前端傳送過來的cate_id的資料
        $cate=Category::find($input['cate_id']);
        //然後在指定cate_order欄位將從前端送來的資料輸入
        $cate->cate_order=$input['cate_order'];
        //最後更新
        $re=$cate->update();
        return $re;
    }

    public function find($cate_id)
    {
        $field=Category::find($cate_id);
        return $field;
    }

    public function update($cate_id,$input)
    {
       $re=Category::where('cate_id',$cate_id)->update($input);
       return $re;
    }

    public function store($input)
    {
        $re=Category::create($input);

        return $re;
    }

    public function destroy($cate_id){
        $re=Category::where('cate_id',$cate_id)->delete();
        return $re;
    }
}
