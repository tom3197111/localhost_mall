@foreach($baneer as $k => $v)
	@if($v->banner_tag==15)
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">登入 <span></span></h3>

						<form action="#" onsubmit="return false">
							<div class="styled-input agile-styled-input-top">
								<input maxlength="12" id="Sign_in_account" type="text" name="account" required="">
								<label>帳號</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input maxlength="12" id="Sign_in_password" type="password" name="password" required="">
								<label>密碼</label>
								<span></span>
							</div>
							<input type="submit" value="Sign In" onclick="acs()">

 							<input id="_token" type="hidden" name="_token" value="{{csrf_token()}}">
						</form>

			{{-- 			  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter">
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul> --}}
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > 還沒有帳號?</a>  &emsp;
															<a href="#" data-toggle="modal" data-target="#select_account" > 忘記帳號?</a>  &emsp;
															<a href="#" data-toggle="modal" data-target="#select_password" > 忘記密碼?</a><p>


						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							
							<img src="{{$v->banner_url}}" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
	@endif
@endforeach
@foreach($baneer as $k => $v)
	@if($v->banner_tag==16)
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">註冊帳號 <span></span></h3>
						 <form action="#" onsubmit="return false">

							<div class="styled-input agile-styled-input-top">
								<input type="text" id="sign_Name" name="sign_Name" required="" oninput="check_sign_Name();">
								<label>姓名</label>
								<span></span>
							</div>
							<div><span class="tip_Name" style="color: red;">姓名不能為空</span></div>
							<div><span class="tip_Name_ok" style="color: red;">姓名可以使用</span></div>
							<div>
							<div class="styled-input">
								<input maxlength="12" type="text" id="sign_account" name="sign_account" required="" oninput="check_sign_account();">
								<label>帳號</label>
								<span></span>

							</div><span class="tip_account" style="color: red;">該帳號無法使用</span></div>
							<div><span class="tip_account_ok" style="color: red;">帳號可以使用</span></div>
							<div class="styled-input">
								<input maxlength="12" type="password" id="sign_password" name="sign_password" required="" oninput="checkpas1();" >
								<label>密碼</label>
								<span></span>
							</div>
							<span class="tip_most" style="color: red;">密碼為六位到12位數</span>
							<div class="styled-input">
								<input maxlength="12" type="password" id="Confirm_Password" name="Confirm_Password" required="" oninput="checkpas();">
								<label>確認密碼</label>
								<span></span>
							</div>
							<div>
								<div>
								<span class="tip_most_Validator" style="color: red;"><font style="font-size:15px;">密碼包含大小寫英文字母特殊符號和數字</font></span></div>
								<span class="tip" style="color: red;">兩次輸入的密碼不一致</span></div>
								<span class="tip_most_Confirm" style="color: red;">密碼為六位到12位數</span>
								<span class="tip_most_Confirm_ok" style="color: red;">密碼可以使用</span>
							<div class="styled-input">
								<input type="text" id="sign_Email" name="sign_Email" required="" oninput="check_email();" >
								<label>Email</label>
								<span></span>
							</div>
							<div><span class="tip_Email" style="color: red;">該Email無法使用</span></div>
							<div><span class="tip_Email_ok" style="color: red;">Email可以使用</span></div>
							<div class="styled-input">
								<input maxlength="10" type="text" id="sign_phone" name="sign_phone" required="" oninput="check_phone();">
								<label>手機號碼</label>
								<span></span>
							</div>
							<div><span class="tip_phone" style="color: red;">該手機號碼無法使用</span></div>
							<div><span class="tip_phone_ok" style="color: red;">手機號碼可以使用</span></div>
							<div class="styled-input">
								<label>地址(送貨地址)</label>
								<div><input type="text" required="" disabled="disabled"></div>
								<div id="zipcode2"></div>
								<input type="text" id="sign_Address" name="sign_Address" required="" placeholder="請輸入地址">
								<span></span>
							</div>
							<div>
							<input type="checkbox" id="deal" required="" placeholder="請輸入地址">
							<label>我已閱讀並會遵守條款</label>
							</div><br>
							<div>
							<input type="submit" value="註冊" onclick="checkpas2();">
							</div>
						</form>
	

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="{{$v->banner_url}}" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
	@endif
@endforeach

<!-- Modal1 -->
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">會員資料 <span></span></h3>

						<form action="#" onsubmit="return false">
							<div class="styled-input">
								<input maxlength="12" type="text" id="edit_account" name="edit_account" required="" oninput="check_sign_account();" disabled="disabled">
								<input type="hidden" id="hidden_account" value="@if(session()->has('account')){{ Session::get('account')}}@endif">
								<label>帳號:
									@if(session()->has('account'))
										{{ Session::get('account')}}
									@endif	
								</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input class="edit_password" maxlength="12" type="password" id="edit_password" name="edit_password" required="" oninput="edit_password_click();" disabled="disabled">
								<label id='label_password'><span id="password_id">密碼:</span>
									@if(session()->has('account'))
										<span id="show_password">{{ Session::get('password')}}</span>
									@endif
								</label>
								<span></span>								
							</div>
								<div><span class="edit_password_ok" style="color: red;">密碼正確</span></div>
								<div><span class="edit_password_no" style="color: red;">密碼錯誤</span></div>
							<div id="edit_Confirm_Password_" style="display: none;">
							<div class="styled-input">
								<input placeholder="請輸入新密碼" maxlength="12" type="password" id="edit_Confirm_Password_data" name="edit_Confirm_Password_data" required="" oninput="checkpas1('password');">
								<label id="label_password_new">新密碼:

								</label>
								<span></span>
							</div>
							</div>
							<div id="edit_Confirm_Password_two" style="display: none;">
							<span class="edit_tip_most" style="color: red;">密碼為六位到12位數</span>
							<div class="styled-input">
								<input placeholder="新密碼第二次輸入" maxlength="12" type="password" id="edit_Confirm_Password_two_" name="edit_Confirm_Password_two_" required="" oninput="checkpas('password');">
								<label id="label_password_new_two">新密碼第二次輸入:

								</label>
								<span></span>
							</div>
							</div>
							<div>
								<div>
								<span class="edit_tip_most_Validator" style="color: red;"><font style="font-size:15px;">密碼包含大小寫英文字母特殊符號</font></span></div>
								<span class="edit_tip" style="color: red;">兩次輸入的密碼不一致</span></div>
								<span class="edit_tip_most_Confirm" style="color: red;">密碼為六位到12位數</span>
								<span class="edit_tip_most_Confirm_no" style="color: red;">不能與舊密碼一樣</span>
								<span class="edit_tip_most_Confirm_ok" style="color: red;">密碼可以使用</span>
								<P>
								<input id="user_password_updata" type="submit" value="密碼修改" > &emsp;
								<input  id="cancel_user_password_updata" type="submit" style="display: none;" value="取修修改" >
							<div class="styled-input">
								<input type="text" id="edit_name" name="edit_name" required="" oninput="check_sign_Name();" disabled="disabled">
								<label id="Session_name">姓名:
									@if(session()->has('account'))
										{{ Session::get('name')}}
									@endif
								</label>
								<span></span>
							</div>
							<div><span class="tip_Name" style="color: red;">姓名不能為空</span></div>
							<div><span class="tip_Name_ok" style="color: red;">姓名可以使用</span></div>


							<div class="styled-input">
								<input  type="text" id="edit_Email" name="edit_Email" required="" oninput="check_email();" disabled="disabled">
								<label id="Session_Email">信箱:
									@if(session()->has('account'))
										{{ Session::get('Email')}}
									@endif
								</label>
								<span></span>
							<div><span class="tip_Email" style="color: red;">該Email無法使用</span></div>
							<div><span class="tip_Email_ok" style="color: red;">Email可以使用</span></div>								
							</div>
							<div class="styled-input">
								<input maxlength="10" type="text" id="edit_phone" name="edit_phone" required="" oninput="check_phone();"disabled="disabled">
								<label id="Session_phone">手機號碼:
									@if(session()->has('account'))
										<span id="show_phone">{{ Session::get('phone')}}</span>
									@endif								
								</label>
								<span></span>

							</div>
							<div><span class="tip_phone" style="color: red;">該手機號碼無法使用</span></div>
							<div><span class="tip_phone_ok" style="color: red;">手機號碼可以使用</span></div>
							<div><span class="tip_phone_no" style="color: red;">該手機號碼已被使用</span></div>
							<input id="user_phone_date_updata" type="submit" value="手機號碼修改" >&emsp;
							<input style="display: none;" id="cancel_user_phone_date_updata" type="submit" value="取消修改" >
							<div class="styled-input">
								<input style="border:none;" type="text" name="" required="" disabled="disabled">
								<label>地址:
									@if(session()->has('account'))
										<span id="show_Address">{{ Session::get('Address')}}</span>
									@endif
								</label>
								<div id="new_edit_address" style="display: none;">新地址(送貨地址):</div>
								<div id="zipcode" style="display: none;" ></div>
								<input type="text" style="display: none;" id="edit_Address" name="edit_Address" required="" placeholder="請輸入地址">
								<span></span>
							</div>
							<input id="user_address_date_updata" type="submit" value="地址修改" > &emsp;
							<input style="display: none;" id="cancel_user_address_date_updata" type="submit" value="取消修改" >
						</form>
						<div class="clearfix"></div>
						</div>
			<!-- 			<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="/images/log_pic.jpg" alt=" "/>
						</div> -->
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->

<!-- Modal1 -->
		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">會員資料 <span></span></h3>



														<div class="clearfix"></div>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="{{$v->banner_url}}" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->

@foreach($baneer as $k => $v)
	@if($v->banner_tag==17)
<!-- Modal2 -->
		<div class="modal fade" id="select_account" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">忘記帳號 <span></span></h3>
						 <form action="#" onsubmit="return false">
							<div class="styled-input agile-styled-input-top">
								<input type="text" id="forget_account_Name" name="forget_account_Name" required="">
								<label>請輸入您的姓名</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" id="forget_account_password" name="forget_account_password" required="" >
								<label>請輸入您的密碼</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" id="forget_account_Email" name="forget_account_Email" required="" >
								<label>請輸入您的Email</label>
								<span></span>
							</div>

							<br>
							<div>
							<input type="submit" value="確認" onclick="forget_account();">
							</div>
						</form>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="{{$v->banner_url}}" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
	@endif
@endforeach
@foreach($baneer as $k => $v)
	@if($v->banner_tag==18)
<!-- Modal2 -->
		<div class="modal fade" id="select_password" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">忘記密碼 <span></span></h3>
						 <form action="#" onsubmit="return false">
							<div class="styled-input agile-styled-input-top">
								<input type="text" id="forget_password_Name" name="forget_password_Name" required="">
								<label>請輸入您的姓名</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" id="forget_password_account" name="forget_password_account" required="">
								<label>請輸入您的帳號</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" id="forget_password_Email" name="forget_password_Email" required="" >
								<label>請輸入您的Email</label>
								<span></span>
							</div>
							<br>
							<div>
							<input type="submit" value="確認" onclick="forget_password();">
							</div>
						</form> 
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="{{$v->banner_url}}" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
	@endif
@endforeach