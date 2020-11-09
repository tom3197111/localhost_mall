

	function acs(){
	    var url = "user/auth/Sign_in"
	    var Sign_in_account = $('#Sign_in_account').val();
	    var Sign_in_password = $('#Sign_in_password').val();
	    var _token = $('#_token').val();
	    if(Sign_in_account!=''||Sign_in_password!=''){
	            $.ajax({
	            type: "post",
	            url: url,
	            data:{Sign_in_account:Sign_in_account, Sign_in_password:Sign_in_password,_token:_token},
	            // dataType: "json",
	            success: function(res) {
	            	if(res=="no"){
	            		alertify.error('帳號或密碼錯誤');
	            	}else if(res=="email_verified_no"){
	            		alertify.error('麻煩至註冊信箱,確認驗證信');
	            	}
	            	else{
	  					window.location.replace("http://www.fishing-tackle-mall.com/localhost_mall/");
	            	}
	            },
	            error: function(res) {
	            	alertify.error('帳號或密碼錯誤');
	            }
	        });
	    }
	}
 