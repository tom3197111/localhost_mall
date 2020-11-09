<?php

namespace App\Http\Service;
use mail;
use App\Http\Repository\User_dataRepository;
use Session;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class User_dataService
{
    protected $User_dataRepository;

    public function __construct()
    {
        $this->User_dataRepository = new User_dataRepository();
    }

    public function getUser_Data($account)
    {
        $User_Data = $this->User_dataRepository->getUser_Data($account);

        return $User_Data;
    }

    public function getUser_Email($Email)
    {
        $User_Email = $this->User_dataRepository->getUser_Email($Email);

        return $User_Email;
    }

    public function getUser_phone($phone)
    {
        $User_phone = $this->User_dataRepository->getUser_phone($phone);

        return $User_phone;
    }

    public function verification_User_Random($User_Random)
    {
        $verification_User_Random = $this->User_dataRepository->verification_Random($User_Random);

        return $verification_User_Random;       
    }

    public function verification_Sign_up($Request)
    {
       if($input=Request()->all()){
            $rules=[
                'sign_Name'=>'required',
                'sign_account'=>'required|between:6,12|regex:/^[0-9a-zA-Z]{0,12}$/',
                'sign_password'=>'required|between:6,12|regex:/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)])+$).{6,12}$/',
                'sign_Email'=>'required|regex:/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
                'sign_phone'=>'required|regex:/^09[0-9]{8}$/',
                'sign_Address'=>'required',
                'deal'=>'required',
            ];
            //當發生password required時給的錯誤訊息
              $message=[
                'sign_Name.required'=>'姓名不能為空',
                'sign_account.required'=>'帳號不能為空',
                'sign_account.between'=>'帳號必須在6-12位之間',
                'sign_account.regex'=>'帳號只能使用英文和數字',
                'sign_password.required'=>'密碼不能為空',
                'sign_password.between'=>'密碼必須在6-12位之間',
                'sign_password.regex'=>'密碼需要包含大小寫英文和特殊符號以及數字',
                'sign_Email.required'=>'Email不能為空',
                'sign_Email.regex'=>'Email格式不正確',
                'sign_phone.required'=>'行動電話不能為空',
                'sign_phone.regex'=>'行動電話格式錯誤',
                'sign_Address.required'=>'縣市不能為空',
                'deal.required'=>'請閱讀完條款後打勾',

              ];
            //傳入 make 方法的第一個參數是待驗證的資料，
            //第二個參數是資料的驗證規則。
            //第三個是設定錯誤信息
            $validator=Validator::make($input,$rules,$message);
          //當$validator接收到的待驗證的資料與驗證規則成立(passes)則執行下去
            if($validator->passes()){
                $random=$this->generateRandomString();
                $random.=$input['sign_Name'];
                $Sign_up_data=$this->User_dataRepository->Sign_up_data($input,$random);
                if($Sign_up_data=='ok'){
                    $account_or_password=null;
                    $input_=null;
                    $this->php_Email($account_or_password,$input_,$neme=$input['sign_Name'],$email=$input['sign_Email'],$random);
                    return $Sign_up_data;
                }
                return $Sign_up_data;
            }else{
                //當 $validator發生errors找到全部(ALL)的錯誤
                //dd($validator->errors()->all());
                //退回(back)發送請求的該頁面並且將錯誤訊息一起傳送過去(withErrors($validator))
                //dd(back()->withErrors($validator));
                $errors=$validator->messages();
                // dd($errors);
                return back()->withErrors($errors);
            }
        }
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function php_Email($account_or_password=null,$input_=null,$neme=null,$email=null,$random=null){

        //回覆信件至此信箱
        if($account_or_password!=null){
            // 收件者信箱
            $email=$account_or_password['Email'];
            // 收件者的名稱or暱稱
            $name=$account_or_password['name'];

            if($input_ == 'forget_account'){
                $account_or_password=$account_or_password['account'];
                $content =['title'=>"帳號查詢",
                        'content'=>"您的帳號是:".$account_or_password
                    ];
                $subject='帳號查詢';  
            }else if($input_ == 'forget_password'){
                $account_or_password=$account_or_password['password'];
                $content =['title'=>"密碼查詢",
                        'content'=>"您的密碼是:".$account_or_password
                    ];
                $subject='密碼查詢';
                
            }
        }else{
            $email=$email;
            // 收件者信箱
            $name=$neme;
            $content =['title'=>"會員信箱驗證碼",
                        'content'=>"請點擊網址:http://www.fishing-tackle-mall.com/localhost_mall/random/".$random
                    ];
            $subject='漁具百貨驗證信';
        }

                \Mail::send('emails.test',$content,function($message) use ($email,$subject){ 
                    
                    $message ->to($email)->subject($subject); 
                }); 
    }

    public function forget_account_service($input){
        $forget_account=$this->User_dataRepository->forget_account_Repository($input);
        return $forget_account;
    }

    public function user_password_data_updataService($input){
        $account=$input['sign_account'];
        $password=$input['pas1'];
        $updata_user_password=$this->User_dataRepository->updata_user_passwordRepository($account, $password);
        return $updata_user_password;
    }

    public function update_User_phone_service($phone,$account){
        $update_phone=$this->User_dataRepository->update_User_phoneRepository($phone,$account);
        return $update_phone;
    }

    public function adders_updataService($input){
        $account=$input['account'];
        $adders=$input['edit_Address'];
        if($input['city']=='縣市' ||$input['town']=='鄉鎮市區' ){
            return 'no';
        }
        $update_adders=$this->User_dataRepository->update_addersRepository($adders,$account);
        if($update_adders){
            session(['Address'=>$input['edit_Address']]);
            return 'ok';
        }else{
            return 'no';    
        }
        
    }
}
