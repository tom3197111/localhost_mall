$(function () {
	//第一層 選中時
	$('#checkoutAddrList .item').click(function(){
		$('#checkoutAddrList .item').removeClass("selected")
		$(this).addClass("selected")

	})
	//第一層 線上支付選中時
	$('#checkoutPaymentList .item').click(function(){
		$('#checkoutPaymentList .item').removeClass("selected")
		var item=$(this).addClass("selected")
		if(item.text().trim()=='線上支付'){
			$.session.remove('Delivery');
			$('.Place_Order').show()
		}else{
			$('.Place_Order').hide()
			$.session.set('Delivery', 'selected_Delivery')
			$.session.remove('ecpay');
			console.log($.session.get('Delivery'));
		}
	})
	//第二層 線上支付的第三方支付廠商
	$('#checkoutOnlinepayment .Place_Order').click(function(){
		$('#checkoutOnlinepayment .Place_Order').removeClass("selected")
		$(this).addClass("selected")
		$.session.set('ecpay', 'selected_ecpay')
		$.session.remove('Delivery');
		console.log($.session.get('ecpay'));
	})

	//第一層 送貨方式
	$('#checkoutShipmentList .item').click(function(){
		$('#checkoutShipmentList .item').removeClass("selected")
		var item = $(this).addClass("selected")
		if(item.text().trim()=='到店取貨'){
			$('.LogisticsType_mark').show()
			$('.LogisticsType_mark_home').hide()

		}else{
			$.session.remove('store');
			$('.LogisticsType_mark').hide()
			$('.LogisticsType_mark_home').show()

		}
	})
	//第一種 選擇宅配
	$('#LogisticsType .LogisticsType_mark_home').click(function(){
		$('#LogisticsType .LogisticsType_mark').removeClass("selected")
		var item = $(this).addClass("selected")
		if($(this).children('#Logistics_tmp').val()=='UNIMART'){
			$.session.set('store', 'selected_UNIMART')
		}else if($(this).children('#Logistics_tmp').val()=='FAMI'){
			$.session.set('store', 'selected_FAMI')
		}else if($(this).children('#Logistics_tmp').val()=='HILIFE'){
			$.session.set('store', 'selected_HILIFE')
		}

	})
	//第二種 選到店取貨店家
	$('#LogisticsType .LogisticsType_mark').click(function(){
		$('#LogisticsType .LogisticsType_mark').removeClass("selected")
		var item = $(this).addClass("selected")
		if($(this).children('#Logistics_tmp').val()=='UNIMART'){
			$.session.set('store', 'selected_UNIMART')
		}else if($(this).children('#Logistics_tmp').val()=='FAMI'){
			$.session.set('store', 'selected_FAMI')
		}else if($(this).children('#Logistics_tmp').val()=='HILIFE'){
			$.session.set('store', 'selected_HILIFE')
		}

	})

	$('#delivery_time .item').click(function(){
		$('#delivery_time .item').removeClass("selected")
		$(this).addClass("selected")
	})  
	$('#invoice .item').click(function(){
		$('#invoice .item').removeClass("selected")
		$(this).addClass("selected")
	})  


	//新增收貨人驗證
	$('#receiver_data').click(function(){
		var city = $('select[name="receiver_city"] :selected').text();
		var town = $('select[name="receiver_town"] :selected').text();
		if(city=='縣市'|| town=='鄉鎮市區'){
			alertify
			.alert("未選擇縣市和鄉鎮市區", function(){
				alertify.message('未選擇縣市和鄉鎮市區');
			});
			return false;
		} 
	})
	//選好支付方式後會將sessuon取出 在重整後會顯示在畫面上
	if($.session.get('ecpay')=='selected_ecpay'){
		console.log($.session.get('ecpay'))
		$("#checkoutPaymentList :nth-child(1)").addClass('selected')
		$('.Place_Order').addClass('selected')
		$('.Place_Order').show()
	}else if($.session.get('Delivery')=='selected_Delivery'){
		$("#checkoutPaymentList :nth-child(2)").addClass('selected')
	}


	//選好配送方式後會將sessuon取出 在重整後會顯示在畫面上
	if($.session.get('store')!=undefined){
		console.log($.session.get('store'))
		$("#checkoutShipmentList :nth-child(2)").addClass('selected')
		$('.LogisticsType_mark').show()
		if($.session.get('store')=='selected_UNIMART'){
			$('.UNIMART').addClass('selected')
		}else if($.session.get('store')=='selected_FAMI'){
			$('.FAMI').addClass('selected')
		}else if($.session.get('store')=='selected_HILIFE'){
			$('.HILIFE').addClass('selected')
		}
	}

	$('.XX').click(function(){
		var _token = $('$_token').val()
		var _this = $(this)
		alertify.confirm("Message", function(e) {
			var name = $(_this).parent().find('strong').text().replace('姓名:','').trim()
			var tag = $(_this).parent().find('span').text()
			var Email = $(_this).parent().find('.itemRegion').text().replace('信箱:','').trim()
			var phone = $(_this).parent().find('.itemStreet').text().replace('手機號碼:','').trim()
			var Address = $(_this).parent().find('.itemTel').text().replace('地址:','').trim()
			console.log(name,tag,Email,phone,Address)
		$.ajax({
	        type: "post",
	        url: "/localhost_mall/delete_users_address",
	        data:{name:name,tag:tag,Email:Email,phone:phone,Address:Address,_token:_token},
	        // dataType: "json",
	        success: function(res) {
	        	$(_this).parent().remove()
	        },
	        error: function(res) {
	        }
	    });
			

		})
	});

		
})




