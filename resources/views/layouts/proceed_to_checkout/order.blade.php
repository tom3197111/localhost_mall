



<!--收货地址body部分开始-->  
<div class="border_top_cart">
	<div class="container">
		<div class="checkout-box">
			<form  id="checkoutForm" action="#" method="post">
				<div class="checkout-box-bd">
					<!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
					<input type="hidden" name="Checkout[addressState]" id="addrState"   value="0">
					<!-- 收货地址 -->
					<div class="xm-box">
						<div class="box-hd ">
							<h2 class="title">訂單資料</h2>
							<!---->
						</div>

						<hr>
						<!-- 收货地址 END-->
						<div id="checkoutPayment">
							<!-- 支付方式 -->
							<div class="xm-box">
								<div class="box-hd ">
									<h2 class="title">支付方式</h2>
								</div>
								<div class="box-bd">
									<ul id="checkoutPaymentList" class="checkout-option-list clearfix J_optionList">
										<li class="item ">
											<input type="radio" name="Checkout[pay_id]" checked="checked" value="1">
											<p>
												線上支付<span></span>
											</p>
										</li>
										<li class="item ">
											<input type="radio" name="Checkout[pay_id]" checked="checked" value="1">
											<p>
												貨到付款                                <span></span>
											</p>
										</li>									
									</ul>
									<br>
									<ul id="checkoutOnlinepayment" class="checkout-option-lis clearfix J_optionList">
										<li class="Place_Order " >											
											<input  type="radio" name="Checkout[pay_id]" checked="checked" value="1" >
											<p>
												<img  src="http://www.fishing-tackle-mall.com/localhost_mall/public/images/pay/logo_pay200x55.png"><span></span>
											</p>
										</li>
									</ul>
								</div>
							</div>
							<!-- 支付方式 END-->
							<hr>
							<div class="xm-box">
								<div class="box-hd ">
									<h2 class="title">配送方式</h2>
								</div>
								<div class="box-bd">
									<ul id="checkoutShipmentList" class="checkout-option-list clearfix J_optionList ">
										<li class="item ">
											<input type="radio" data-price="0" name="Checkout[shipment_id]" checked="checked" value="1">
											<p>
												宅配<span></span>
											</p>
										</li>
										<li class="item ">
											<input type="radio" data-price="0" name="Checkout[shipment_id]" checked="checked" value="1">
											<p>
												到店取貨<span></span>
											</p>
										</li>
									</ul>

									<br>
									<ul id="LogisticsType" class="checkout-option-lis clearfix J_optionList" >
										@foreach($post_fee as $key=>$val )
										@if($val['LogisticsType']!='Black_cat')
										<?php
										$String = $val->logo_img;
										$url='http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/'.$String;
										?>
										<li class="LogisticsType_mark {{$val['LogisticsType']}}">
											<input type="radio" name="Checkout[pay_id]" checked="checked" value="1" >
											<input id="Logistics_tmp" type="hidden" value="{{$val['LogisticsType']}}">
									<!-- 		<p>
												<a onclick="LogisticsType('{{$val['LogisticsType']}}','{{$order[0]->order_id}}')"> <img  src="{{$url}}" style="width: 100PX;height: 100PX"></a><span></span>
											</p>
 -->
<!-- <button type="button"  onclick="window.open('Logistics/map/{{$val['LogisticsType']}}/{{$order[0]->order_id}}', '_blank')">Path</button> -->

												<p>
												<a href="#"> <img  src="{{$url}}" style="width: 100PX;height: 100PX"></a><span></span>
											</p>

										</li>
										@endif
										@endforeach   
									</ul> 

									@if(!empty($Logistics))
									<br>

									<ul id="LogisticsType" class="checkout-option-lis clearfix J_optionList" >
										<li class="LogisticsType_mark ">											
											<div >
												<div style="border-style:double;" class="col-lg-12 col-sm-12 col-xs-12 ">
													<label>選擇店家:</label><br>&emsp; &emsp;<span style="font-size: 5px">
														<input type="hidden" id="LogisticsSubType" value="{{$Logistics['LogisticsSubType']}}">
														@if($logo_img != '')
														<?php
														$url='http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/'. $logo_img['logo_img'];
														?>
														<img src="{{$url}}" style="width: 30PX;height: 30pX"></span><br>
														@endif 
														<label>門市編號:</label><br>&emsp; &emsp;<span id='CVSStoreID' style="font-size: 5px">{{$Logistics['CVSStoreID']}}</span><br>
														<label>門市:</label><br>&emsp; &emsp;<span id='CVSStoreName' style="font-size: 5px">{{$Logistics['CVSStoreName']}}</span><br>
														<label>門市地址:</label><br>&emsp; &emsp;<span id='CVSAddress' style="font-size: 5px">{{$Logistics['CVSAddress']}}</span><br>
														<label>門市電話:</label><br>&emsp; &emsp;<span id='CVSTelephone' style="font-size: 5px">{{$Logistics['CVSTelephone']}}</span><br>
														<label>運費:</label><br>&emsp; &emsp;<span id='post_fee' style="font-size: 5px">{{$logo_img['post_fee']}}</span><br>
													</div>
												</div>
											</li>
										</ul> 
										@endif



										<ul id="LogisticsType" class="checkout-option-liss clearfix J_optionList" >
											<li class="LogisticsType_mark_home">											
												<div class="box-bd">
													<div class="clearfix xm-address-list" id="checkoutAddrList">
														<dl class="item_address item "  >
															<dt>	
																<strong class="itemConsignee">姓名:								
																	@if(session()->has('account'))
																	{{ Session::get('name')}}
																@endif</strong>
																<span class="itemTag tag">預設住址</span>
															</dt>
															<dd>
																<p class="itemRegion">信箱:
																	@if(session()->has('account'))
																	{{ Session::get('Email')}}
																@endif</p>
																<p class="itemStreet">手機號碼:
																	@if(session()->has('account'))
																	{{Session::get('phone')}}
																@endif</p>
																<p class="tel itemTel">地址:
																	@if(session()->has('account'))
																	{{ Session::get('Address')}}
																@endif</p>
															</dd>
														</dl>
														@foreach($user_address as $val)


														<dl class="item_address item "  >
															<button type="button" class="close XX" >x</button>
															<dt>	
																<strong class="itemConsignee">姓名:								
																	{{$val->name}}
																	</strong>
																<span class="itemTag tag">{{$val->tag}}</span>

															</dt>
															<dd>
																<p class="itemRegion">信箱:
																	{{$val->Email}}
																	</p>
																<p class="itemStreet">手機號碼:
																	{{$val->phone}}
																	</p>
																<p class="tel itemTel">地址:
																	{{$val->Address}}
																</p>
															</dd>
														</dl>
														@endforeach




														<dl class="item_address item_address_b  item "  data-toggle="modal" data-target="#xxx" style="height: 155px">
															<dd>
																<img src="{{asset('images/order/add_box-24px.svg')}}" width="100PX"><p>新增收貨人</p>
															</dd>
														</dl>
													</div>                
												</div>
											</li>
										</ul> 								
									</div>
								</div>
								<!-- 配送方式 END-->                    <!-- 配送方式 END-->
							</div>
							<!-- 送货时间 -->
							<hr>
							<div class="xm-box">
								<div class="box-hd">
									<h2 class="title">送貨時間</h2>
								</div>
								<div class="box-bd">
									<ul id="delivery_time" class="checkout-option-list clearfix J_optionList ">

										<li class="item ">
											<input type="radio" checked="checked" name="Checkout[best_time]" value="1"><p>不限送貨時間<span>周一至周日</span></p></li><li class="item ">
												<input type="radio"  name="Checkout[best_time]" value="2"><p>工作天送貨<span>周一至周五</span></p>
											</li>

											<li class="item "><input type="radio"  name="Checkout[best_time]" value="3"><p>周休、國定假日送貨<span>周六至周日</span></p>
											</li>                       
										</ul>
									</div>
								</div>
								<!-- 送货时间 END-->
								<!-- 发票信息 -->
								<hr>
								<div id="checkoutInvoice">
									<div class="xm-box">
										<div class="box-hd">
											<h2 class="title">發票</h2>
										</div>
										<div class="box-bd">
											<ul id="invoice" class="checkout-option-list checkout-option-invoice clearfix J_optionList J_optionInvoice">
												<li class="item ">
													<!--<label><input type="radio"  class="needInvoice" value="0" name="Checkout[invoice]">不开发票</label>-->
													<input type="radio"    checked="checked"  value="4" name="Checkout[invoice]">
													<p>電子發票（非紙質）</p>
												</li>
												<li class="item ">
													<input type="radio"   value="1" name="Checkout[invoice]">
													<p>普通發票（紙質）</p>
												</li>
											</ul>
											<p id="eInvoiceTip" class="e-invoice-tip ">
												電子票證是稅務局認可的有效憑證，可作為售後維權兌換，不隨商品寄送。開票後不可更換紙質票證，如需報銷請選擇普通票。
											</p>
											<div class="invoice-info nvoice-info-1" id="checkoutInvoiceElectronic" style="display:none;">

												<p class="tip">電子發票目前僅對個人用戶開具，不可用於單位報銷，不隨商品寄送</p>
												<p>票務內容：購買商品明細</p>
												<p>機票抬頭：個人</p>
												<p>
													<span class="hide"><input type="radio" value="4" name="Checkout[invoice_type]"   checked="checked"   id="electronicPersonal" class="invoiceType"></span>
												</p>
											</div>
										</div>
									</div>                </div>
									<!-- 发票信息 END-->
								</div>







								<hr>
								<div class="checkout-box-ft">
									<!-- 商品清单 -->
									<div id="checkoutGoodsList" class="checkout-goods-box">
										<div class="xm-box">

											<div class="box-hd">
												<h4 class="title">確認訂單信息</h4> <h5><small>訂單編號:{{$order[0]->order_id}}</small></h5>
											</div>
											<div class="box-bd">
												<input type="hidden" id="order_number" value="{{$order[0]->order_id}}">
												<div class="checkout_details_area mt-50 clearfix">
													<div class="col-12 col-md-12 col-lg-12 ml-lg-auto" style="">
														<div class="order-details-confirmation">

															@if(!empty($order))

															<table class="table table-hover table-responsive" id=""  >

																<tr>
																	<th >商品</th>
																	<th >品名</th>
																	<th >單價</th>
																	<th >數量</th>
																	<th >總價</th>
																	<th ></th>
																</tr>
																@foreach($order as $k =>$order_list)
																<tr class="tableHorizontalBottomLine"  data-price="{{$order_list->price}}" data-key="id" data-id="{{$order_list->id}}" >
																	<td data-key="image" data-img="{{$order_list->image}}" >
																		<img width="50px"  src="{{$order_list->image}}"/>
																	</td>
																	<td data-key="name" data-name="{{$order_list->name}}">{{$order_list->name}}</td>

																	<td data-key="price" data-price="{{$order_list->price}}" title="Unit Price" id="price" >{{$order_list->price}}</td>
																	<td data-key="quantity" data-quantity="{{$order_list->quantity}}"  title="Quantity"><input type="number" min="1" style="width: 70px;" class="quantity" value="{{$order_list->quantity}}"/></td> 
																	<td data-key="total" data-total="{{$order_list->total_fee}}" title="Total" class=" my-product-total">{{$order_list->total_fee}}</td>
																	<td title="Remove from Cart" style="width: 30px;"><a href="javascript:void(0);" class="btn btn-xs btn-danger remove">X</a></td>   
																</tr>
																@endforeach
																<tr><td></td><td></td><td></td><td><span>小計:</span></td><td id="subtotal"> </td></td><td></tr>
																	@foreach($post_fee as $key=>$val )
																	@if($val['LogisticsType']=='Black_cat')
																	<tr id='bcm' style="display: none"><td></td><td></td><td></td><td><span>運費:</span></td><td id="bcm_p_f"> {{$val->post_fee}}</td></td><td></tr>
																		@endif
																		@endforeach 
																		@if($logo_img != '')
																		<tr id='ccm'><td></td><td></td><td></td><td><span>運費:</span></td><td > {{$logo_img['post_fee']}}</td></td><td></tr>
																			@endif
																			<tr><td></td><td></td><td></td><td><span>總價:</span></td><td id="TotalPrice"></td></td><td></tr>
																			</table>
																			@endif

																			<!--     <a href="#" ><img  id="Place_Order" src="http://www.fishing-tackle-mall.com/localhost_mall/public/images/pay/logo_pay200x55.png"></a> -->
																		</div>
																	</div>
																</div>
																<div class="checkout-count clearfix">
																	<div class="checkout-count-extend xm-add-buy">
																		<h3 class="title">會員留言</h3></br>
																		<textarea cols="50" rows="5"></textarea>
																	</div>
																	<!-- checkout-count-extend -->
																	<div class="checkout-price">
																		<ul>

																			<li>
																				訂單總額：<span>244元</span>
																			</li>
																			<li>
																				運費：<span id="postageDesc">0元</span>
																			</li>
																		</ul>
																		<p class="checkout-total">應付總額：<span><strong id="totalPrice">244</strong>元</span></p>
																	</div>
																	<!--  -->
																</div>
															</div>
														</div>    

													</div>
													<!-- 商品清单 END -->
													<input type="hidden"  id="couponType" name="Checkout[couponsType]">
													<input type="hidden" id="couponValue" name="Checkout[couponsValue]">
													<div class="checkout-confirm">

														<a href="#" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
														<input type="submit" class="btn btn-primary" value="應付總額" id="checkoutToPay" />
													</div>
												</div>
											</form>
											</div>



										</div>
									</div>


