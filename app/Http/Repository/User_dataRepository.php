<?php

namespace App\Http\Repository;

use App\Http\Model\User;
class User_dataRepository
{
    protected $User;
    public function __construct()
    {
        $this->User = new User();

    }

    public function getUser_Data($account)
    {   
        $User_data=User::where('account','=',$account)->get();
        return $User_data;
    }

    public function getUser_Email($Email)
    {   
        $User_Email=User::where('Email','=',$Email)->get();
        return $User_Email;
    }

    public function getUser_phone($phone)
    {   
        $User_phone=User::where('phone','=',$phone)->get();
        return $User_phone;
    }

    public function verification_Random($User_Random)
    {   
        $User_phone = User::where('remember_token', '=', $User_Random)->update(['email_verified' => true]);

        if($User_phone){ 
            return 'ok';
        }else{
            return 'no';
        }
        
    }
    public function Sign_up_data($input,$random)
    {   
        $Sign_up_data = new User;
        $Sign_up_data->name = $input['sign_Name'];
        $Sign_up_data->account = $input['sign_account'];
        $Sign_up_data->password = $input['sign_password'];
        $Sign_up_data->Email = $input['sign_Email'];
        $Sign_up_data->phone = $input['sign_phone'];
        $Sign_up_data->Address = $input['sign_Address'];
        $Sign_up_data->deal = $input['deal'];
        $Sign_up_data->remember_token = $random;
        try{
            $Sign_up_data->save();      
            return "ok";
        }catch (\Exception $e){
            // dd($e);
            return "Repository_no";
        }

    }

    public function forget_account_Repository($input)
    {
        $forget_account_Name=$input['forget_account_Name'];
        $forget_account_Email=$input['forget_account_Email'];
        $forget_account=$input['forget_account'];
        if($forget_account!='forget_password'){
            $forget_account_password=$input['forget_account_password'];
            $forget_account=User::where(['name'=>$forget_account_Name,'password'=>$forget_account_password,'Email'=>$forget_account_Email])->first();
        }else{
            $forget_password_account=$input['forget_password_account'];
            $forget_account=User::where(['name'=>$forget_account_Name,'account'=>$forget_password_account,'Email'=>$forget_account_Email])->first();
        }
        if($forget_account){
            return $forget_account;
        }else{
            $forget_account='no';
            return $forget_account;
        }
    }
    public function updata_user_passwordRepository($account, $password){
        $affectedRows = User::where('account', '=', $account)->update(['password' =>$password]);
        return 'updata_password_ok';
    }
    public function update_User_phoneRepository($phone,$account){
        $affectedRows = User::where('account', '=', $account)->update(['phone' =>$phone]);
        return $affectedRows;
    }
    public function update_addersRepository($adders,$account){
        $affectedRows = User::where('account', '=', $account)->update(['Address' =>$adders]);
        return $affectedRows;
    }
}
