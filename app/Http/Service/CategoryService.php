<?php

namespace App\Http\Service;

use App\Http\Repository\CategoryRepository;

use Illuminate\Support\Facades\Validator;
class CategoryService
{
    protected $CategoryRepository;

    public function __construct()
    {
        $this->CategoryRepository = new CategoryRepository();
    }

    public function Category()
    {
        $Category = $this->CategoryRepository->Category();
        return $Category;
    }
    public function tree()
    {
        $categorys = $this->CategoryRepository->tree();
        $data=$this->getTree($categorys,'cate_name','cate_id','cate_pid',0);

         return $data;
    }

    //在傳參(field_name='name',$field_id='id')裡面的  ='值'值設定的
    //都是預設值 如果有其他函數傳進來就會蓋掉
    public function getTree($data,$field_name='name',$field_id='id',$field_pid='pid',$pid=0){
      // dd($data);
      //先建立一個陣列(容器)
      $arr=array();
      //將取得的資料取出
      foreach($data as $k=>$v){
          //如果資料的cate_pid==0
          if($v->$field_pid==$pid){
              //將cate_pid==0的cate_name改成_cate_name
              //並存起來
               $data[$k][$field_name]=$data[$k][$field_name];
              //echo $v->cate_name;
               //將剛剛得到的放入另一個容器$arr[]
               $arr[]=$data[$k];
               //將取得的資料取出
               foreach($data as $m=>$n){
                   //如果資料的cate_pid和cate_id一樣
                   if($n->$field_pid==$v->$field_id){
                       //改變內容在資料前面加上|__並將cate_pid和cate_id一樣
                       //的資料取出
                       $data[$m]['Category_name']=$data[$k][$field_name];
                       $data[$m]["_".$field_name]=$data[$m][$field_name];
                       //最後放到arr[]內
                       $arr[]=$data[$m];
                   }
               }
          }
      }
       // dd($arr);
      return $arr;
    }
    public function create()
    {
         $CategoryRepository = $this->CategoryRepository->create();

         return $CategoryRepository;
    }

    public function changeorder($input)
    {
        $re = $this->CategoryRepository->changeorder($input);

       //傳給前端的js來做跳出訊息的動作
       //如果更新成功則'status'=>0如果失敗 'status'=>1
       if($re){
           $data=[
               'status'=>0,
               'msg'=>'分類排序更新成功',
           ];
       }else{
             $data=[
                'status'=>1,
                'msg'=>'排序失敗,請稍後重試',
            ];
       }
        return $data;
    }
    public function store($input)
    {

        $rules=[
            'cate_name'=>'required',
        ];

        $message=[
            'cate_name.required'=>'分類名稱不能為空',
        ];

          $validator=Validator::make($input,$rules,$message);
          //當$validator接收到的待驗證的資料與驗證規則成立(passes)
          //則執行下去
          if($validator->passes()){
            $re=$this->CategoryRepository->store($input);

            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','數據新增失敗');
            }
          }else{
            return back()->withErrors($validator);

          }
    }
    public function editfind($cate_id){
        $field=$this->CategoryRepository->find($cate_id);

        return $field;
    }
    public function update($cate_id,$input){
        //尋找cate_id為傳參送來的cate_id
        //例如where('欄位名稱',欄位ID)
        //找到後將接收到的資料更新
        $re=$this->CategoryRepository->update($cate_id,$input);

        if($re){
            return redirect('admin/category');
        }else{
            return back()->with('errors','分類更新失敗');

        }

    }
    public function destroy($cate_id){
        $destroy = $this->CategoryRepository->destroy($cate_id);
        if($destroy){
            $date=[
                'status'=>0,
                'msg'=>'分類刪除成功',
            ];
        }else{
            $date=[
                'status'=>1,
                'msg'=>'分類刪除失敗',
            ];
        }

         return $date;
    }
    // public function get_Category_Service(){
    //     $get_Category = $this->CategoryRepository->get_Category_Repository();
    //     return $get_Category;
    // }
}
