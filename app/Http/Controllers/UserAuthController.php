<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\User_dataService;
// use Validator;
use Session;

// use Illuminate\Support\Facades\DB;

class UserAuthController extends Controller
{
    protected $User_dataService;

    public function __construct()
    {
        $this->User_dataService = new User_dataService();
    }
//帳號驗證和密碼驗證
    public function Sign_up_account()
    {
        if($input = Request()->all())
        {

            $account = $input['sign_account'];
            $user_account=$this->User_dataService->getUser_Data($account);

            if($input['account_test']=='account'){
                if(count($user_account) == 0){
                    return 'ok';
                }else{
                    return 'no';
                }
            }

            if($input['account_test']=='password'){
                if($user_account[0]->password == $input['password']){
                        return 'password_ok';
                }else{
                        return 'no';
                }
            }
        }

    	return View('admin.login');
    }
//密碼驗證
    public function Sign_up_Email()
    {   
        if($input = Request()->all())
        {
            $Email =$input['sign_Email'];
            $user_Email=$this->User_dataService->getUser_Email($Email);
            if(count($user_Email) == 0){
                return 'ok';
            }else{
                return 'no';
            }

        }
        return View('admin.login');
    }
//電話驗證和電話修改    
    public function Sign_up_phone()
    {
        if($input = Request()->all())
        {   
            $phone =$input['sign_phone'];
            $user_phone=$this->User_dataService->getUser_phone($phone);
            //電話驗證
            if(count($user_phone) == 0 && $input['account_test']=='check_phone'){
                return 'ok';
                //電話修改
            } else if(count($user_phone) == 0 && $input['account_test']=='phone_update'){
                $account=$input['account'];
                $user_phone_update=$this->User_dataService->update_User_phone_service($phone,$account);
                if($user_phone_update){
                     // $phone =mb_substr($input['sign_phone'], 0, 4,"UTF-8");
                     // $phone .='******';
                     session(['phone'=>$phone]);
                    return 'ok';
                }else{
                    return 'no';
                }
            } else{
                return 'no';
            }

        }
        return View('admin.login');
    }
//帳號登入
    public function Sign_in(){
        // phpinfo();
        //接收所有請求
       
        if($input = Request()->all()){

        	$password ='';
        	$account =$input['Sign_in_account'];
            
        	$user_account=$this->User_dataService->getUser_Data($account);
            foreach ($user_account as $user_data) {
                $password = $user_data->password;
                $account = $user_data->account;
            }
            if($user_account['0']->email_verified == null && $password ==$input['Sign_in_password'] && $account ==$input['Sign_in_account'])
            {
                return 'email_verified_no';
            } 
            if($password !=$input['Sign_in_password'] || $account !=$input['Sign_in_account'])
            {
            	session(['msg'=>'帳號或密碼錯誤']);
            	return 'no';
            } 
            
		        $name =$user_account['0']->name;
		        $birthday =$user_account['0']->birthday;
		        $Address =$user_account['0']->Address;

		        // $phone =$user_account['0']->phone;
		        // $phone =mb_substr($user_account['0']->phone, 0, 4,"UTF-8");
		        // $phone .='******';
                $phone =  $user_account['0']->phone;
		  //       $Email =mb_substr($user_account['0']->Email, 0, 2,"UTF-8");

				// $Email .='****'.strrchr($user_account['0']->Email, "@");
                $Email =  $user_account['0']->Email;
                $account=$input['Sign_in_account'];
                $password=$input['Sign_in_password'];
                // $account =mb_substr($account, 0, 2,"UTF-8");
                // $account .='******';
                $password =mb_substr($password, 0, 2,"UTF-8");
                $password .='******';
		        session(['account'=>$account]);
                session(['password'=>$password]);
                session(['name'=>$name]);
		        session(['phone'=>$phone]);
		        session(['Address'=>$Address]);
		        session(['Email'=>$Email]);
		        session(['birthday'=>$birthday]);
	            return 'ok';

        }
    }
//帳號登出
    public function Sign_out()
    {
        Session::flush();
        return redirect('/');
    }
//帳號註冊
    public function Sign_up(Request $Request)
    {
        if($input = Request()->all()){
            $verification_Sign_up_data=$this->User_dataService->verification_Sign_up($Request);
            return $verification_Sign_up_data;
        }
    }
//信箱驗證碼
    public function User_Random($User_Random)
    {
        if($User_Random!=''){
            $User__Get_Random=$this->User_dataService->verification_User_Random($User_Random);
            return $User__Get_Random;
        }
    }
//尋找帳號和密碼
    public function forget_account()
    {
        if($input_ = Request()->all()){

            $account_or_password=$this->User_dataService->forget_account_service($input_);
            if($account_or_password &&  $input_['forget_account']=='forget_account'){
                $input_ ='forget_account';
                $this->User_dataService->php_Email($account_or_password,$input_);
               return 'ok';
                // 
            }else if($account_or_password &&  $input_['forget_account']=='forget_password'){
                $input_ ='forget_password';
                $this->User_dataService->php_Email($account_or_password,$input_);
               return 'ok';
            }else{
                return 'no';
            }
        
            return 'no';
        }   
    }
    //密碼修改
    public function user_updata(){
        if($input= Request()->all()){
            $ok=$this->Sign_up_account();
            if($ok='password_ok'&&$input['pas1']==$input['pas2']){
               $user_password_data_updata=$this->User_dataService->user_password_data_updataService($input);
               $password =mb_substr($input['pas1'], 0, 2,"UTF-8");
               $password .='******';
               session(['password'=>$password]);
               return $user_password_data_updata;
            }
        }
    }
    public function user_adders_updata()
    {
        if($input= Request()->all()){
            $dders_updat=$this->User_dataService->adders_updataService($input);
            return $dders_updat;
        }
    }
}
