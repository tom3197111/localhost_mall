$(function () {

	$(document).on('click','#checkoutAddrList .item', function(){
		$('#checkoutAddrList .item').removeClass("selected")
		$(this).addClass("selected")
	});
	//第一層 線上支付選中時
	$('#checkoutPaymentList .item').click(function(){
		$('#checkoutPaymentList .item').removeClass("selected")
		var item=$(this).addClass("selected")
		if(item.text().trim()=='線上支付'){
			$.session.remove('Delivery');
			$('.Place_Order').show()
			$.session.set('payment_method', '線上支付')
		}else{
			$('.Place_Order').hide()
			$('.Place_Order').removeClass('selected')
			$.session.set('Delivery', 'selected_Delivery')
			$.session.remove('ecpay');
			// console.log($.session.get('Delivery'));
			$.session.set('payment_method', '貨到付款')
		}
	})
	//第二層 線上支付的第三方支付廠商
	$('#checkoutOnlinepayment .Place_Order').click(function(){
		$('#checkoutOnlinepayment .Place_Order').removeClass("selected")
		$(this).addClass("selected")
		$.session.set('ecpay', 'selected_ecpay')
		$.session.remove('Delivery');
		$.session.set('payment', 'ecpay')
		// console.log($.session.get('ecpay'));
	})
	//第一層 送貨方式
	$('#checkoutShipmentList .item').click(function(){
		$('#checkoutShipmentList .item').removeClass("selected")
		var item = $(this).addClass("selected")
		if(item.text().trim()=='到店取貨'){
			$('.LogisticsType_mark').show()
			$('.LogisticsType_mark_home,#LogisticsType .LogisticsType_home_mark_data,.LogisticsType_home_mark').hide()
			$('.item_address,.LogisticsType_home_mark,#LogisticsType .LogisticsType_home_mark_data ').removeClass("selected")
			$.session.remove('item_address');
			$.session.remove('LogisticsType');
			$.session.remove('mark_home');
			$.session.set('Pickup_method', '到店取貨')
		}else if(item.text().trim()=='宅配'){
			// $('#CVSpost_fee').text('')
			$.session.remove('store');
			$('.LogisticsType_mark,.LogisticsType_mark_data').hide()
			$('.LogisticsType_home_mark').show()
			$('.LogisticsType_mark_data,.LogisticsType_mark').removeClass("selected")
			$.session.set('Pickup_method', '宅配')
			$('.LogisticsType_store_store').hide()
			//未完成 沒有辦法分辨選擇的住家地址
		}
	})
	//選擇宅配廠商
	$('#LogisticsType .LogisticsType_home_mark').click(function(){
		var item = $(this).addClass("selected")
		$('.LogisticsType_home_mark_data').show()
		if($(this).children('#Logistics_tmp').val()=='Black_cat'){
			$.session.set('mark_home', 'selected_Black_cat')
		}
	})
	//選擇宅配廠商
	$('#LogisticsType .LogisticsType_home_mark_data').click(function(){
		var item = $(this).addClass("selected")
		var post_fee = $(this).find('#post_fee').text()
		$('#postageDesc').text(post_fee)
		$('.LogisticsType_mark_home').show()
		$('#TotalPrice').text(TotalPrice+parseInt($('#postageDesc').text()))
		$.session.set('LogisticsSubType', 'Black_cat')
	})

	//選擇宅配地址
	$('#LogisticsType .LogisticsType_mark_home .item_address').click(function(){
		$('#LogisticsType .LogisticsType_mark ').removeClass("selected")
		var item = $(this).addClass("selected")
		$.session.set('receiver_address_num', $("li dl").index(this))
		$.session.set('receiver_name', $(this).find('.itemConsignee').text().replace('姓名:','').trim())
		$.session.set('receiver_email', $(this).find('.itemRegion').text().replace('信箱:','').trim())
		$.session.set('receiver_mobile', $(this).find('.itemStreet').text().replace('手機號碼:','').trim())
		$.session.set('receiver_address', $(this).find('.itemTel').text().replace('地址:','').trim())
		$.session.set('Factory', 'Black_cat')

	})
	//選擇到店取貨地址
	$('#LogisticsType .LogisticsType_store_store .item_address').click(function(){
		$('#LogisticsType .LogisticsType_mark ').removeClass("selected")
		var item = $(this).addClass("selected")
		$.session.set('receiver_address_num', $("li dl").index(this))
		$.session.set('receiver_name', $(this).find('.itemConsignee').text().replace('姓名:','').trim())
		$.session.set('receiver_email', $(this).find('.itemRegion').text().replace('信箱:','').trim())
		$.session.set('receiver_mobile', $(this).find('.itemStreet').text().replace('手機號碼:','').trim())


	})	
	//第二種 選到店取貨店家
	$('#LogisticsType .LogisticsType_mark').click(function(){
		$('#LogisticsType .LogisticsType_mark').removeClass("selected")
		var item = $(this).addClass("selected")
		if($(this).children('#Logistics_tmp').val()=='UNIMART'){
			$.session.set('store', 'selected_UNIMART')
			$.session.set('Factory', 'UNIMART')
		}else if($(this).children('#Logistics_tmp').val()=='FAMI'){
			$.session.set('store', 'selected_FAMI')
			$.session.set('Factory', 'FAMI')
		}else if($(this).children('#Logistics_tmp').val()=='HILIFE'){
			$.session.set('store', 'selected_HILIFE')
			$.session.set('Factory', 'HILIFE')
		}
	})

	//選好配送方式後會將sessuon取出 在重整後會顯示在畫面上
	if($.session.get('store')!=undefined){
		// console.log($.session.get('store'))
		$("#checkoutShipmentList :nth-child(2)").addClass('selected')
		$('.LogisticsType_mark').show()
		$('.LogisticsType_mark_data').show()
		$('.LogisticsType_mark_data').addClass('selected')
		$('#LogisticsType .LogisticsType_store_store').show()
		if($.session.get('store')=='selected_UNIMART'){
			$('.UNIMART').addClass('selected')
		}else if($.session.get('store')=='selected_FAMI'){
			$('.FAMI').addClass('selected')
		}else if($.session.get('store')=='selected_HILIFE'){
			$('.HILIFE').addClass('selected')
		}
		if($('#CVSpost_fee').text()!=''){
			$('#postageDesc').text($('#CVSpost_fee').text())
		}
	}else if($.session.get('mark_home')=='selected_Black_cat'){
		$("#checkoutShipmentList :nth-child(1)").addClass('selected')
		$('.LogisticsType_home_mark').show()
		$('.LogisticsType_home_mark').addClass('selected')
		$('.LogisticsType_home_mark_data').show()
		if($.session.get('Factory')=='Black_cat'){
			$('.LogisticsType_home_mark_data').addClass('selected')
			$('.LogisticsType_mark_home').show()
			$('#postageDesc').text($('#LogisticsType .LogisticsType_home_mark_data').find('#post_fee').text())
			if($.session.get('receiver_address_num')!=''){
				$( "#LogisticsType .LogisticsType_mark_home dl" ).eq($.session.get('receiver_address_num')).addClass('selected')
			}
		}
	}
	
	//送貨時間
	$('#delivery_time .item').click(function(){
		$('#delivery_time .item').removeClass("selected")
		$(this).addClass("selected")
		var first = $(this).children(":first").val()
		if(first =='1'){
			$.session.set('delivery_time', '1')
		}else if(first =='2'){
			$.session.set('delivery_time', '2')
		}else if(first =='3'){
			$.session.set('delivery_time', '3')
		}
		// console.log($.session.get('delivery_time'))
	})  
	var delivery_time = $.session.get('delivery_time')
	if(delivery_time == '1'){
		$('#delivery_time .item:nth-child(1)').addClass('selected')
	}else if(delivery_time == '2'){
		$('#delivery_time .item:nth-child(2)').addClass('selected')
	}else if(delivery_time == '3'){
		$('#delivery_time .item:nth-child(3)').addClass('selected')
	}
	//發票
	$('#invoice .item').click(function(){
		$('#invoice .item').removeClass("selected")
		$(this).addClass("selected")
		var first = $(this).children(":first").val()
		if(first =='1'){
			$.session.set('invoice', '1')
		}else if(first =='2'){
			$.session.set('invoice', '2')
		}
	})  
	var invoice = $.session.get('invoice')
	if(invoice == '1'){
		$('#invoice .item:nth-child(1)').addClass('selected')
	}else if(invoice == '2'){
		$('#invoice .item:nth-child(2)').addClass('selected')
	}

	//新增收貨人驗證(宅配)
	$('#receiver_data').click(function(){
		var store = 0
		var city = $('select[name="receiver_city"] :selected').text();
		var town = $('select[name="receiver_town"] :selected').text();
		if(city=='縣市'|| town=='鄉鎮市區' || town==''||city==''){
			alertify
			.alert("未選擇縣市和鄉鎮市區", function(){
				alertify.message('未選擇縣市和鄉鎮市區');
			});
			return false;
		}else{
			var _token = $('#_token').val()
			data=$('#form_adderss').serialize();
			$.ajax({
				type: "post",
				url: "/localhost_mall/users_address",
				dataType: 'json',
				data:{data:data,_token:_token,store:store},
	        // dataType: "json",
	        success: function(res) {
	        	$('.insertadd').remove()
	        	$.each(res,function(name,value) {
	        		$('.item_address_b').before('<dl class="item_address item insertadd ">'+
	        			'<button type="button" class="close XX" data-id='+value.id+
	        			'>x</button> <dt> <strong class="itemConsignee">姓名:'+value.name+
	        			'</strong> <span class="itemTag tag">'+value.tag+
	        			'</span> </dt> <dd> <p class="itemRegion">信箱: '+value.Email+
	        			' </p> <p class="itemStreet">手機號碼:'+value.phone+
	        			'</p> <p class="tel itemTel">地址:'+value.Address+
	        			'</p> </dd> </dl>') 
	        		$('#xxx').modal('hide')
	        		location.reload([true])  
	        	});
	        },
	        error: function(res) {
	        }
	    });
		}
	})



	//新增收貨人驗證(到店取貨)
	$('#receiver_data_store').click(function(){
		var store = 1
		var _token = $('#_token').val()
		data=$('#form_adderss_store').serialize();
		$.ajax({
			type: "post",
			url: "/localhost_mall/users_address",
			dataType: 'json',
			data:{data:data,_token:_token,store:store},
	        // dataType: "json",
	        success: function(res) {
	        	$('.insertadd').remove()
	        	$.each(res,function(name,value) {
	        		$('.item_address_b').before('<dl class="item_address item insertadd ">'+
	        			'<button type="button" class="close XX" data-id='+value.id+
	        			'>x</button> <dt> <strong class="itemConsignee">姓名:'+value.name+
	        			'</strong> <span class="itemTag tag">'+value.tag+
	        			'</span> </dt> <dd> <p class="itemRegion">信箱: '+value.Email+
	        			' </p> <p class="itemStreet">手機號碼:'+value.phone+'</p> </dd> </dl>') 

	        		$('#zzz').modal('hide')
	        		location.reload([true])  
	        	});
	        },
	        error: function(res) {
	        }
	    });
		
	})


	//選好支付方式後會將session取出 在重整後會顯示在畫面上
	if($.session.get('ecpay')=='selected_ecpay'){
		$("#checkoutPaymentList :nth-child(1)").addClass('selected')
		$('.Place_Order').addClass('selected')
		$('.Place_Order').show()
	}else if($.session.get('Delivery')=='selected_Delivery'){
		$("#checkoutPaymentList :nth-child(2)").addClass('selected')
	}



	$(document).on('click', '.XX', function(){
		var _token = $('#_token').val()
		var _this = $(this)
		var id = _this.data('id')
		alertify.confirm("確定要刪除嗎?", function(e) {
			$.ajax({
				type: "post",
				url: "/localhost_mall/delete_users_address",
				data:{id:id,_token:_token},
	        // dataType: "json",
	        success: function(res) {
	        	$(_this).parent().remove()
	        },
	        error: function(res) {
	        }
	    });
			

		})
	});

	var tr_length = $('.table .tableHorizontalBottomLine').length; //tr 長度
	var TotalPrice = 0
	var post_fee = 0
	var bcm_p_f = 0
	if($('#post_fee').text()!=0 || $('#bcm_p_f').text()!=0){
		post_fee=$('#post_fee').text()
		bcm_p_f=$('#bcm_p_f').text()
	}
	for(var i=0; i < tr_length; i++){
		Price=$('.table .tableHorizontalBottomLine:eq('+i+') td:eq(4)').text();
		TotalPrice=TotalPrice+parseInt(Price)
	}
	$('#subtotal').text(TotalPrice)
	$('#TotalPrice').text(TotalPrice+parseInt($('#postageDesc').text()))
  	// if($('#TotalPrice').text()== 'NaN'){
  	// 	$('#TotalPrice').text('請選擇配送方式')
  	// 	$("#checkoutToPay").attr("disabled","false");
  	// }


    // var tr_length = $('.table .tableHorizontalBottomLine').length; //tr 長度
    // var TotalPrice = 0
    // var post_fee = 0
    // var bcm_p_f=0
    // if($('#post_fee').text()!=0 || $('#bcm_p_f').text()!=0){
    // 	post_fee=$('#post_fee').text()
    // 	bcm_p_f=$('#bcm_p_f').text()
    // }
    // for(var i=0; i < tr_length; i++){
    // 	Price=$('.table .tableHorizontalBottomLine:eq('+i+') td:eq(4)').text();
    // 	TotalPrice=TotalPrice+parseInt(Price)
    // }
    // //小計
    // $('#subtotal').text(TotalPrice)

    // post_fee=TotalPrice+parseInt(post_fee)
    // bcm_p_f=TotalPrice+parseInt(bcm_p_f)

    // if($('#checkoutShipmentList').find('.selected').text().trim()=='宅配'){
    // 	// home_price=$('#home_price').val()
    // 	$('#TotalPrice').text(bcm_p_f)
    // 	$('#bcm').show()
    // }else{
    // 	$('#bcm').hide()
    // 	$('#TotalPrice').text(post_fee)
    // }

})


$("#checkoutToPay").click(function(){
	if(!$('.Place_Order ').hasClass('selected')){
		alertify.alert("請選擇付款方式", function(){
			alertify.message('請選擇付款方式');  
		}); 
		return false
	}
	
	var account = $('#hidden_account').val();
	var receiver_name = $.session.get('receiver_name');
	var receiver_mobile = $.session.get('receiver_mobile');
	var receiver_email = $.session.get('receiver_email');
	var buy_message = $('#buy_message').val();    
	var Delivery=$.session.get('Pickup_method')
	var post_fee = $('#postageDesc').text()
	var _token =$('#_token').val()
	if(Delivery=='到店取貨'){
		var type = 'store'
		var CVSStoreID = $('#CVSStoreID').text()
		var CVSStoreName = $('#CVSStoreName').text()
		var CVSAddress = $('#CVSAddress').text()
		var CVSTelephone = $('#CVSTelephone').text()
		var LogisticsSubType = $('#LogisticsSubType').val()
		var LogisticsType='CVS'
		if(typeof(LogisticsSubType)!= "undefined" &&receiver_name!=''&&receiver_mobile!=''){
			$.ajax({
				type: "post",
				url: "/localhost_mall/checkout/Ecpay",
              // async:false,
              data:{
              	account:account,
              	receiver_name:receiver_name,
              	receiver_mobile:receiver_mobile,
              	receiver_email:receiver_email,
              	buy_message:buy_message,
              	CVSStoreID:CVSStoreID,
              	CVSStoreName:CVSStoreName,
              	CVSAddress:CVSAddress,
              	CVSTelephone:CVSTelephone,
              	LogisticsSubType:LogisticsSubType,
              	post_fee:post_fee,
              	LogisticsType:LogisticsType,
              	_token: _token
              },
              // dataType: "HTML",
              success: function(res) {
              	$("#test").html(res);
              },
              error: function(res) {
              }
          });        
		}else if(typeof(LogisticsSubType)== "undefined"){
			alertify.alert("請選擇店家", function(){
				alertify.message('請選擇店家');  
			});     
		}else if(receiver_name==''&&receiver_mobile==''){
			alertify.alert("取貨人姓名或取貨人電話沒有填寫", function(){
				alertify.message('取貨人姓名或取貨人電話沒有填寫');  
			});              
		}

	}else if(Delivery=='宅配'){
		var type = 'Home'
		receiver_address=$.session.get('receiver_address')
		if($.session.get('LogisticsSubType')=='Black_cat'){
			LogisticsSubType ='Black_cat'
		}

		LogisticsSubType = '貨運'
		var LogisticsType='Home'
		var _token = $('#_token').val();
		$.ajax({
			type: "post",
			url: "/localhost_mall/checkout/Ecpay",
              // async:false,
              data:{account:account,post_fee:post_fee,receiver_email:receiver_email,receiver_name:receiver_name,receiver_mobile:receiver_mobile,buy_message:buy_message,receiver_address:receiver_address,_token:_token,LogisticsType:LogisticsType,LogisticsSubType:LogisticsSubType,type:type},
              // dataType: "HTML",
              success: function(res) {
              	$("#test").html(res);
              },
              error: function(res) {
              }
          });
	}      


});

