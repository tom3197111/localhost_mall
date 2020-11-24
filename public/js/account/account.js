
//註冊姓名檢查是否空白
$(".tip_Name").hide();
$(".tip_Name_ok").hide();
	function check_sign_Name(){
	    if($('#edit_name').val()==''){
	    	var sign_Name = $('#sign_Name').val();
	    	// alert("abb")
	    }else{
	    	var sign_Name = $('#edit_name').val();
	    	// alert("a")
	    }
		if(sign_Name!=''){
			$(".tip_Name_ok").show();
			$(".tip_Name").hide();
	    }else{
	    	$(".tip_Name").show();
	    	$(".tip_Name_ok").hide();
	    }
	}



// 密碼驗證

$(".tip_most_Confirm").hide();
$(".tip_most").hide();
$(".tip").hide();
$(".tip_most_Confirm_ok").hide();
$(".tip_most_Validator").hide();
//修改密碼 原密碼驗證
$(".edit_tip_most_Confirm_no").hide();
$(".edit_password_ok").hide();
$(".edit_password_no").hide();
//修改密碼驗證
$(".edit_tip_most_Confirm").hide();
$(".edit_tip_most").hide();
$(".edit_tip").hide();
$(".edit_tip_most_Confirm_ok").hide();
$(".edit_tip_most_Validator").hide();
	function checkpas1(val){//當第一個密碼框失去焦點時，觸發checkpas1事件
		if(val=='password'){
			var pas1=$("#edit_Confirm_Password_data").val();
			var pas2=$("#edit_Confirm_Password_two_").val();
			//舊密碼
			var pas3=$("#edit_password").val();
		}else{
			var pas1=document.getElementById("sign_password").value;
			var pas2=document.getElementById("Confirm_Password").value;//獲取兩個密碼框的值
			var pas3 = null;
		}
		var reg=/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)])+$).{6,12}$/;
		var pass1 = reg.test(pas1)
		var pass2 = reg.test(pas2)
		if( pass1==false || pass2==false){
			$(".tip_most_Validator").show();
			$(".edit_tip_most_Validator").show();
		}else{
			$(".tip_most_Validator").hide();
			$(".edit_tip_most_Validator").hide();
		}
		if(pas1!=pas2&&pas2!=""){//此事件當兩個密碼不相等且第二個密碼是空的時候會顯示錯誤資訊
			$(".tip").show();
			$(".tip_most_Confirm_ok").hide();
			$(".edit_tip").show();
			$(".edit_tip_most_Confirm_ok").hide();
			}else{
				$(".tip").hide();//若兩次輸入的密碼相等且都不為空時，不顯示錯誤資訊。
				$(".edit_tip").hide();
			}
		if(pas1.length >=6){
			$(".tip_most").hide();
			$(".edit_tip_most").hide();
		}
		if(pas1.length >12 || pas1.length <6){
			$(".tip_most").show();
			$(".edit_tip_most").show();
		}
		if( (pas1.length <=12 && pas1.length >=6) && (pas2.length <=12 && pas2.length >=6) && 
			(pas1 ==pas2&&pas2!="") && pass1==true && pass2==true && pas3==null){

			$(".tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_no").hide();

		}else if((pas1.length <=12 && pas1.length >=6) && (pas2.length <=12 && pas2.length >=6) && 
			(pas1==pas2) && pass1==true && pass2==true && pas3==pas2 && pas3==pas1){

			$(".edit_tip_most_Confirm_no").show();

		}else if((pas1.length <=12 && pas1.length >=6) && (pas2.length <=12 && pas2.length >=6) && 
			(pas1==pas2) && pass1==true && pass2==true && pas3!=pas2 && pas3!=pas1){
			$(".edit_tip_most_Confirm_ok").show();
			$(".tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_no").hide();
		}else{
			$(".tip_most_Confirm_ok").hide();
			$(".edit_tip_most_Confirm_ok").hide();
		}

		}

	function checkpas(val){//當第一個密碼框失去焦點時，觸發checkpas2件
		if(val=='password'){
			var pas1=$("#edit_Confirm_Password_data").val();
			var pas2=$("#edit_Confirm_Password_two_").val();
			//舊密碼
			var pas3=$("#edit_password").val();
		}else{
			var pas1=document.getElementById("sign_password").value;
			var pas2=document.getElementById("Confirm_Password").value;//獲取兩個密碼框的值
			var pas3 = null;
		}
		var reg=/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)])+$).{6,}$/;
		var pass1 = reg.test(pas1)
		var pass2 = reg.test(pas2)
		if( pass1==false || pass2==false){
			$(".tip_most_Validator").show();
			$(".edit_tip_most_Validator").show();
		}else{
			$(".tip_most_Validator").hide();
			$(".edit_tip_most_Validator").hide();
		}
		if(pas1!=pas2){
			$(".tip").show();//當兩個密碼不相等時則顯示錯誤資訊
			$(".tip_most_Confirm_ok").hide();
			$(".edit_tip").show();
			$(".edit_tip_most_Confirm_ok").hide();
			}else{
				$(".tip").hide();
				$(".edit_tip").hide();
		}
		if(pas2.length >=6){
			$(".tip_most_Confirm").hide();
			$(".edit_tip_most_Confirm").hide();
		}
		if(pas2.length >12 || pas2.length <6){
			$(".tip_most_Confirm").show();	
			$(".edit_tip_most_Confirm").show();
		}
		if( (pas1.length <=12 && pas1.length >=6) && (pas2.length <=12 && pas2.length >=6) &&(pas1==pas2) && pass1==true && pass2==true && pas3==null){
			$(".tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_no").hide();
		}else if((pas1.length <=12 && pas1.length >=6) && (pas2.length <=12 && pas2.length >=6) && (pas1==pas2) && pass1==true && pass2==true && pas3==pas2 && pas3==pas1){
			$(".edit_tip_most_Confirm_no").show();
		}else if((pas1.length <=12 && pas1.length >=6) && (pas2.length <=12 && pas2.length >=6) && (pas1==pas2) && pass1==true && pass2==true && pas3!=pas2 && pas3!=pas1){
			$(".tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_ok").show();
			$(".edit_tip_most_Confirm_no").hide();
		}else{
			$(".tip_most_Confirm_ok").hide();
			$(".edit_tip_most_Confirm_ok").hide();
		}

		}
 

//註冊帳號檢查有無重複
$(".tip_account").hide();
$(".tip_account_ok").hide();
	function check_sign_account(){
		var re = /^[0-9a-zA-Z]{0,12}$/;//4-16位元組，允許字母數字下劃線
	    var url = "user/auth/Sign_up_account"
	    var sign_account = $('#sign_account').val();
	    var _token = $('#_token').val();
	    var account_test = 'account';
	    if(!re.test(sign_account))
	    {	
	    	$(".tip_account").show()
	        $(".tip_account_ok").hide();
			alertify
			  .alert("只能输入英文和數字", function(){
			    alertify.message('只能输入英文和數字');	
			    });    	
	    }else if(sign_account!='' ){
	            $.ajax({
	            type: "post",
	            url: url,
	            data:{account_test:account_test,sign_account:sign_account,_token:_token},
	            // dataType: "json",
	            success: function(res) {
	            	if(res=="no"){
	            		$(".tip_account").show()
	            		$(".tip_account_ok").hide();
	            	}else{
	            		$(".tip_account").hide()
	            		$(".tip_account_ok").show();
	  					// window.location.replace("http://mall.com/");
	            	}
	            },
	            error: function(res) {
	            }
	        });
	    }
	}
//EMAIL檢查有無重複
$(".tip_Email").hide();
$(".tip_Email_ok").hide();
	function check_email(){
	    if($('#edit_Email').val()==''){
	    	var sign_Email = $('#sign_Email').val();
	    	// alert("abb")
	    }else{
	    	var sign_Email = $('#edit_Email').val();
	    	// alert("a")
	    }
	    var url = "user/auth/Sign_up_Email"
	    var _token = $('#_token').val();
	    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if( sign_Email == ""){
			Email= false;
		}else if(!regex.test(sign_Email)) {
			Email=  false;
		}else{
			Email=  true;
		}
	    if(Email==false){
	    	$(".tip_Email").show();
	    	$(".tip_Email_ok").hide();
	    }
	    if(Email== true){
	            $.ajax({
	            type: "post",
	            url: url,
	            data:{sign_Email:sign_Email,_token:_token},
	            // dataType: "json",
	            success: function(res) {
	            	if(res=="no"){
	            		$(".tip_Email").show();
	            		$(".tip_Email_ok").hide();   
	            	}else{
	            		$(".tip_Email").hide();
	            		$(".tip_Email_ok").show();    
	            	}
	            },
	            error: function(res) {
	            }
	        });
	    }
	}


//手機號碼檢查有無重複
$(".tip_phone").hide();
$(".tip_phone_ok").hide();
$(".tip_phone_no").hide();
	function check_phone(){
	    var url = "user/auth/Sign_up_phone"
	    if($('#edit_phone').val()==''){
	    	var sign_phone = $('#sign_phone').val();
	    	// alert("abb")
	    }else{
	    	var sign_phone = $('#edit_phone').val();
	    	// alert("a")
	    }
	    var account_test='check_phone';
	    var _token = $('#_token').val();
	    var regex = /^09[0-9]{8}$/;
		if( sign_phone == ""){
			phone= false;
		}else if(!regex.test(sign_phone)) {
			phone=  false;
		}else{
			phone=  true;
		}
	    if(phone==false){
	    	$(".tip_phone").show();
	    	$(".tip_phone_ok").hide();
	    	$(".tip_phone_no").hide();
	    }
	    if(sign_phone!='' && sign_phone.length ==10 && phone==true){
	            $.ajax({
	            type: "post",
	            url: url,
	            data:{account_test:account_test,sign_phone:sign_phone,_token:_token},
	            // dataType: "json",
	            success: function(res) {
	            	if(res=="no"){
	            		$(".tip_phone_no").show();
	            		$(".tip_phone_ok").hide();
	            		$(".tip_phone").hide();
	            	}else{
	            		$(".tip_phone").hide();
	            		$(".tip_phone_ok").show();
	            		$(".tip_phone_no").hide();
	            	}
	            },
	            error: function(res) {
	            }
	        });
	    }
	}


$(function(){
	$("#zipcode,#zipcode2,#zipcode3").twzipcode({
		countySel: "縣市", // 城市預設值, 字串一定要用繁體的 "臺", 否則抓不到資料
		districtSel: "鄉政市區", // 地區預設值
		zipcodeIntoDistrict: true, // 郵遞區號自動顯示在地區
		css: ["city form-control", "town form-control"], // 自訂 "城市"、"地區" class 名稱
		countyName: "city", // 自訂城市 select 標籤的 name 值
		districtName: "town" // 自訂地區 select 標籤的 name 值
	});

})
$(function(){
	$("#zipcode4").twzipcode({
		countySel: "縣市", // 城市預設值, 字串一定要用繁體的 "臺", 否則抓不到資料
		districtSel: "鄉政市區", // 地區預設值
		zipcodeIntoDistrict: true, // 郵遞區號自動顯示在地區
		css: ["city form-control", "town form-control"], // 自訂 "城市"、"地區" class 名稱
		countyName: "receiver_city", // 自訂城市 select 標籤的 name 值
		districtName: "receiver_town" // 自訂地區 select 標籤的 name 值
	});

})

	function checkpas2(){//點選提交按鈕時，觸發checkpas2事件，會進行彈框提醒以防無視錯誤資訊提交
		//取得checkbox當前的狀態(有勾或沒勾)
		tip_Name_ok = $('.tip_Name_ok').is(":visible"); 
		tip_account_ok = $('.tip_account_ok').is(":visible"); 
		tip_most_Confirm_ok = $('.tip_most_Confirm_ok').is(":visible"); 
		tip_Email_ok =$('.tip_Email_ok').is(":visible"); 
		tip_phone_ok =$('.tip_phone_ok').is(":visible"); 
		var deal  = $('#deal').is(':checked');
		var city = $('select[name="city"] :selected').text();
		var town = $('select[name="town"] :selected').text();
		if(deal==true && tip_Name_ok==true && tip_account_ok==true && tip_most_Confirm_ok==true &&tip_Email_ok==true &&tip_phone_ok==true){
			if(city=='縣市'|| town=='鄉鎮市區'){
				alertify
				  .alert("未選擇縣市和鄉鎮市區", function(){
				    alertify.message('未選擇縣市和鄉鎮市區');
				  });
				  return false;
			}
			var url = "user/auth/Sign_up";
			var sign_Name=$('#sign_Name').val();
			var sign_account=$('#sign_account').val();
			var sign_password=$('#sign_password').val();
			var Confirm_Password=$('#Confirm_Password').val();
			var sign_Email=$('#sign_Email').val();
			var sign_phone=$('#sign_phone').val();
			var sign_Address=$('#sign_Address').val();
			sign_Address=city+' 郵遞區號'+town+' '+sign_Address;
			 _token = $('#_token').val();
			if(sign_password==Confirm_Password){
				sign_password=Confirm_Password
			}
			$.ajax({
			    type: "post",
			    url: url,
			    data:{sign_Name:sign_Name,sign_account:sign_account,sign_password:sign_password,sign_Email:sign_Email,sign_phone:sign_phone,sign_Address:sign_Address,deal:deal,_token:_token},
			    // dataType: "json",
			    success: function(res) {
			    	if(res=='ok'){
						alertify
						  .alert("註冊成功,驗證信已寄出,麻煩從註冊信箱驗證", function(){
						    alertify.message('註冊成功 返回首頁');	
						    window.location.replace('http://www.fishing-tackle-mall.com/localhost_mall/');
						    });   
						  
			    	}else{
			    		alert('註冊失敗')   
			    	}
			    },
			    error: function(res) {
			    }
				});
		}else{
			return false;
		}

	}



//修改地址
	$(document).on('click', '#user_address_date_updata', function(){
		$('#user_address_date_updata').attr('id', 'address_date_update_click' );
  		$('#zipcode').show();
  		$('#edit_Address').show();
  		$('#new_edit_address').show();
  		$('#new_edit_address').css('color','#2fdab8');
  		$('#cancel_user_address_date_updata').show();
		$('#address_date_update_click').attr('value', '修改確認' );
		$('#edit_Confirm_Password_data').removeAttr("required");
		$('#edit_Confirm_Password_two_').removeAttr("required");
		$('#edit_Address').attr("required",'');
		$('#edit_Address').val('');

	});

	$(document).on('click', '#cancel_user_address_date_updata', function(){
		$('#address_date_update_click').attr('id', 'user_address_date_updata' );
  		$('#zipcode').hide();
  		$('#edit_Address').hide();
  		$('#new_edit_address').hide();		
  		$('#cancel_user_address_date_updata').hide();  		
		$('#user_address_date_updata').attr('value', '地址修改' );
		$('#edit_Confirm_Password_data').attr("required");
		$('#edit_Confirm_Password_two_').attr("required");
		$('#edit_Address').removeAttr("required");

	});

	$(document).on('click', '#address_date_update_click', function(){
		var url = "user/auth/user_adders_updata";
		var _token = $('#_token').val();
		var account = $('#hidden_account').val().trim();
		var city = $('select[name="edit_city"] :selected').text();
		var town = $('select[name="edit_town"] :selected').text();
		var edit_Address =$('#edit_Address').val();
		edit_Address=city+' 郵遞區號'+town+' '+edit_Address;
		if(city=='縣市' ||town=='鄉鎮市區' ){
			return false;
		}
		$.ajax({
		    type: "post",
		    url: url,
		    data:{city:city,town:town,account:account,edit_Address:edit_Address,_token:_token},
		    // dataType: "json",
		    success: function(res) {
		    	if(res=='ok'){
					$('#address_date_update_click').attr('id', 'user_address_date_updata' );
			  		$('#zipcode').hide();
			  		$('#edit_Address').hide();
			  		$('#new_edit_address').hide();		
			  		$('#cancel_user_address_date_updata').hide();  		
					$('#user_address_date_updata').attr('value', '地址修改' );
					$('#edit_Confirm_Password_data').attr("required");
					$('#edit_Confirm_Password_two_').attr("required");
					$('#edit_Address').removeAttr("required");
					$('#show_Address').html(edit_Address)
					$('#edit_Address').val('');
					alertify.alert()
					  .setting({
					    'label':'確定',
					    'message': '地址修改成功' ,
					    'onok': function(){ alertify.success('地址修改成功');}
					  }).show();

		    	}else{
	            		// $(".tip_phone_no").show();
	            		// $(".tip_phone_ok").hide();
	            		// $(".tip_phone").hide();

		    	}
		    },
		    error: function(res) {
		    }
			});

	});


//修改手機號碼
	$(document).on('click', '#user_phone_date_updata', function(){
		$('#edit_phone').attr('disabled', false );
		$('#user_phone_date_updata').attr('id', 'phone_date_update_click' );
  		$('#cancel_user_phone_date_updata').show();
		$('#phone_date_update_click').attr('value', '修改確認' );
		$('#edit_Address').removeAttr("required");
		$('#edit_Confirm_Password_data').removeAttr("required");
		$('#edit_Confirm_Password_two_').removeAttr("required");

	});

	$(document).on('click', '#cancel_user_phone_date_updata', function(){
		$('#edit_phone').attr('disabled', true );
		$('#edit_phone').val('');
		$('#phone_date_update_click').attr('id', 'user_phone_date_updata' );
  		$('#cancel_user_phone_date_updata').hide();  		
		$('#user_phone_date_updata').attr('value', '手機號碼修改' );
		$('.tip_phone').hide();
		$('.tip_phone_ok').hide();
		$('.tip_phone_no').hide();

	});


	$(document).on('click', '#phone_date_update_click', function(){
		var url = "user/auth/Sign_up_phone";
		var edit_phone=$("#edit_phone").val();
		var _token = $('#_token').val();
		var account = $('#hidden_account').val().trim();
		var account_test = 'phone_update';
		$.ajax({
		    type: "post",
		    url: url,
		    data:{account_test:account_test,account:account,sign_phone:edit_phone,_token:_token},
		    // dataType: "json",
		    success: function(res) {
		    	if(res=='ok'){
			 		$('#edit_phone').attr('disabled', true );
					$('#phone_date_update_click').attr('id', 'user_phone_date_updata' );
			  		$('#cancel_user_phone_date_updata').hide();  		
					$('#user_phone_date_updata').attr('value', '手機號碼修改' );
					$('#edit_phone').val('');
					$(".tip_phone_ok").hide();
			    	edit_phone=edit_phone.substring(0,4);
			    	edit_phone=edit_phone+'******';
			    	$('#show_phone').html(edit_phone)
					alertify.alert()
					  .setting({
					    'label':'確定',
					    'message': '手機號碼修改成功' ,
					    'onok': function(){ alertify.success('手機號碼修改成功');}
					  }).show();
		    	}else{
	            		$(".tip_phone_no").show();
	            		$(".tip_phone_ok").hide();
	            		$(".tip_phone").hide();

		    	}
		    },
		    error: function(res) {
		    }
			});
	});






//開始修改密碼
	$(document).on('click', '#user_password_updata', function(){
		$('#user_password_updata').attr('value', '修改確認' );
		$('#edit_Confirm_Password_data').attr("required",'');
		$('#edit_Confirm_Password_two_').attr("required",'');
		$('#edit_Confirm_Password_').show();
		$('#edit_Confirm_Password_two').show();
		$('#cancel_user_password_updata').show();
		$('#password_id').html('原密碼:')
		$('#edit_password').attr('disabled', false );
		$('#edit_Address').removeAttr("required");
		$('#label_password').css('top','-1.3em');
		$('#label_password').css('color','#2fdab8');
		$('#edit_password').attr('placeholder', "請輸入原密碼" );
		$('#label_password_new').css('top','-1.3em');
		$('#label_password_new').css('color','#2fdab8');
		$('#label_password_new_two').css('top','-1.3em');
		$('#label_password_new_two').css('color','#2fdab8');
		$('#user_password_updata').attr('id', 'user_password_update_click' );

	});

//取消修改密碼
	$(document).on('click', '#cancel_user_password_updata', function(){
		$('#edit_Confirm_Password_data').removeAttr("required");
		$('#edit_Confirm_Password_two_').removeAttr("required");
		$('#edit_Confirm_Password_').hide();
		$('#edit_Confirm_Password_two').hide();
		$(".edit_password_ok").hide();
		$(".edit_tip_most_Confirm_ok").hide();
		$('#edit_password').attr('disabled', true );
		$('#edit_password').val('');
		$('#edit_password').attr('placeholder', "" );
		$('#label_password').css('top','');
		$('#user_password_update_click').attr('id', 'user_password_updata' );
		$('#user_password_updata').attr('value', '密碼修改' );
		$('#label_password').css('color','#626262');
		$("#cancel_user_password_updata").hide();
		$(".edit_tip_most").hide();
		$(".edit_tip_most_Validator").hide();
		$(".edit_tip").hide();
		$(".edit_tip_most_Confirm").hide();
		$(".edit_tip_most_Confirm_no").hide();
		$(".edit_tip_most_Confirm_ok").hide();
		$(".edit_password_no").hide();
		$('#edit_Confirm_Password_data').val('');
		$('#edit_Confirm_Password_two_').val('');
	});
//修改密碼驗證
	function edit_password_click(){
		var url = "user/auth/Sign_up_account"
		var password = $('#edit_password').val();
		var account = $('#hidden_account').val().trim();
		var _token = $('#_token').val();
		var pas1=$("#edit_Confirm_Password_data").val();
		var pas2=$("#edit_Confirm_Password_two_").val();
		var account_test='password';
		// if(password == pas1 && password==pas2){
		// 	$(".edit_password_no").show();  
		//     $(".edit_password_ok").hide();  
		// }

		$.ajax({
		    type: "post",
		    url: url,
		    data:{account_test:account_test,sign_account:account,password:password,_token:_token},
		    // dataType: "json",
		    success: function(res) {
		    	if(res=='password_ok'){
			 		$(".edit_password_ok").show();
			 		$(".edit_password_no").hide();  
		    	}else{
		    		$(".edit_password_no").show();  
		    		$(".edit_password_ok").hide();  

		    	}
		    },
		    error: function(res) {
		    }
			});
	}

//修改密碼
	$(document).on('click', '#user_password_update_click', function(){
		var url = "user/auth/user_updata"
		var _token = $('#_token').val();
	    edit_password_ok = $('.edit_password_ok').is(":visible"); 
		edit_tip_most_Confirm_ok = $('.edit_tip_most_Confirm_ok').is(":visible"); 
		var account = $('#hidden_account').val();
		var password = $('#edit_password').val();
		var pas1 = $('#edit_Confirm_Password_data').val();
		var pas2 = $('#edit_Confirm_Password_two_').val();
		var account_test='password';
		if(edit_password_ok && edit_tip_most_Confirm_ok){
			$.ajax({
			    type: "post",
			    url: url,
			    data:{account_test:account_test,sign_account:account,password:password,pas1:pas1,pas2:pas2,_token:_token},
			    // dataType: "json",
			    success: function(res) {
			    	if(res=='updata_password_ok'){
			    		pas1=pas1.substring(0,2);
			    		pas1=pas1+'******';
						$('#edit_Confirm_Password_').hide();
						$('#edit_Confirm_Password_two').hide();
						$(".edit_password_ok").hide();
			    		$(".edit_tip_most_Confirm_ok").hide();
			    		$('#edit_password').attr('disabled', true );
			    		$('#edit_password').val('');
			    		$('#edit_password').attr('placeholder', "" );
			    		$('#label_password').css('top','');
			    		$('#user_password_update_click').attr('id', 'user_password_updata' );
			    		$('#user_password_updata').attr('value', '密碼修改' );
			    		$('#label_password').css('color','#626262');
			    		$("#cancel_user_password_updata").hide();
			    		$('#show_password').html(pas1)
			    		$('#edit_Confirm_Password_data').val('');
			    		$('#edit_Confirm_Password_two_').val('');
						alertify.alert()
						  .setting({
						    'label':'確定',
						    'message': '密碼修改成功' ,
						    'onok': function(){ alertify.success('密碼修改成功');}
						  }).show();
			    	}else{
			    		$(".edit_password_no").show();
			    		$(".edit_password_ok").hide();
			    	}
			    },
			    error: function(res) {
			    }
				});
		}else{

		}
	});
	    // if($('#edit_Email').val()==''&& $('#select_Email').val()==''){
	    // 	var sign_Email = $('#sign_Email').val();
	    // 	// alert("abb")
	    // }else if($('#sign_Email').val()=='' && $('#select_Email').val()==''){
	    // 	var sign_Email = $('#edit_Email').val();
	    // 	// alert("a")
	    // }else if( $('#sign_Email').val()=='' && $('#edit_Email').val()==''){
	    // 	var sign_Email = $('#select_Email').val();
	    // }
	function forget_account(){
		var url = "user/auth/forget_account"
		var forget_account_Name=$('#forget_account_Name').val();
		var forget_account_password=$('#forget_account_password').val();
		var forget_account_Email=$('#forget_account_Email').val();
		var forget_account='forget_account';
		var _token = $('#_token').val();
	    $.ajax({
		    type: "post",
		    url: url,
		    data:{forget_account:forget_account,forget_account_Name:forget_account_Name,forget_account_Email:forget_account_Email,forget_account_password:forget_account_password,_token:_token},
		    // dataType: "json",
		    success: function(res) {
		    	if(res=="no"){
		    		// $(".tip_account").show()
		    		// $(".tip_account_ok").hide();
		    	}else{
		    		// $(".tip_account").hide()
		    		// $(".tip_account_ok").show();
		  			// window.location.replace("http://mall.com/");
		    	}
		    },
		    error: function(res) {
		    }
	    });
	}

	function forget_password(){
		var url = "user/auth/forget_account"
		var forget_account_Name=$('#forget_password_Name').val();
		var forget_password_account=$('#forget_password_account').val();
		var forget_account_Email=$('#forget_password_Email').val();
		var forget_account='forget_password';
		var _token = $('#_token').val();
	    $.ajax({
		    type: "post",
		    url: url,
		    data:{forget_account:forget_account,forget_account_Name:forget_account_Name,forget_account_Email:forget_account_Email,forget_password_account:forget_password_account,_token:_token},
		    // dataType: "json",
		    success: function(res) {
		    	if(res=="no"){
		    		// $(".tip_account").show()
		    		// $(".tip_account_ok").hide();
		    	}else{
		    		// $(".tip_account").hide()
		    		// $(".tip_account_ok").show();
		  			// window.location.replace("http://mall.com/");
		    	}
		    },
		    error: function(res) {
		    }
	    });
	}

