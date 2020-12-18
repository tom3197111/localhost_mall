<!-- 註冊時提供的資料 -->
<div class="modal fade" id="ooo" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<h3 class="agileinfo_sign">收貨人資料 <span></span></h3>							
					<div class="styled-input">
						<input type="text"  name="edit_name" required=""  disabled="disabled">
						<label id="Session_name">收貨人姓名:
							@if(session()->has('account'))
							{{ Session::get('name')}}
							@endif
						</label>
						<span></span>
					</div>


					<div class="styled-input">
						<input  type="text"  name="edit_Email" required=""  disabled="disabled">
						<label id="Session_Email">收貨人信箱:
							@if(session()->has('account'))
							{{ Session::get('Email')}}
							@endif
						</label>
						<span></span>
					</div>

					<div class="styled-input">
						<input maxlength="10" type="text"  name="edit_phone" required="" disabled="disabled">
						<label id="Session_phone">收貨人手機號碼:
							@if(session()->has('account'))
							<span id="show_phone">{{Session::get('phone')}}</span>
							@endif
						</label>
						<span></span>
					</div>
					<div class="styled-input">
						<input style="border:none;" type="text" name="" required="" disabled="disabled">
						<label>地址:
							@if(session()->has('account'))
							<span id="show_Address">{{ Session::get('Address')}}</span>
							@endif
						</label>
						<span></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>
<!-- //Modal1 -->
<!-- 新增收貨資料! -->
<div class="modal fade" id="xxx" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-8 modal_body_left modal_body_left1">
					<h3 class="agileinfo_sign">新增收貨人資料 <span></span></h3>
					<form id="form_adderss" onsubmit="return false;">
						<div class="styled-input agile-styled-input-top">
							<input type="text"  name="name" required="">
							<label>收貨人姓名:</label>
							<span></span>
						</div>
						<div>
							<div class="styled-input">
								<input type="text" name="Email" required="" >
								<label>收貨人信箱:</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input maxlength="10" type="text" name="phone" required="" >
								<label>手機號碼</label>
								<span></span>
							</div>
							<div class="styled-input">
								<label>收貨地址</label>
								<div><input type="text" required="" disabled="disabled"></div>
								<div id="zipcode4"></div>
								<input type="text" name="Address" required="" placeholder="請輸入地址">
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="tag">
								<label>標籤:</label>
								<span></span>
							</div>
							<div>
								<input id="receiver_data" type="submit" value="新增收貨資料"> 
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
<!-- //Modal2 -->
</div>

<!-- 新增收貨資料(到店取貨) -->
<div class="modal fade" id="zzz" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-8 modal_body_left modal_body_left1">
					<h3 class="agileinfo_sign">新增收貨人資料 <span></span></h3>
					<form id="form_adderss_store" onsubmit="return false;">
						<div class="styled-input agile-styled-input-top">
							<input type="text"  name="name" required="">
							<label>收貨人姓名:</label>
							<span></span>
						</div>
						<div>
							<div class="styled-input">
								<input type="text" name="Email" required="" >
								<label>收貨人信箱:</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input maxlength="10" type="text" name="phone" required="" >
								<label>手機號碼</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="tag">
								<label>標籤:</label>
								<span></span>
							</div>
							<div>
								<input id="receiver_data_store" type="submit" value="新增收貨資料"> 
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
<!-- //Modal2 -->
</div>