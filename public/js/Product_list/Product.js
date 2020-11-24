


function Product(p_id){
	var _token =$('#_token').val()
    $.ajax({
	     type: "post",
	     url:  "Product_list",
	     data:{p_id:p_id,_token:_token},
	     dataType: "json",
	     success: function(res) {
	     	// console.log(res)
	     	var html='<li><img class="img-responsive" src="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/'+res[0].file_upload+'" alt=" "/></li>'
	     	$('.rslides').html(html)
	     	var html='<li><img  class="img-responsive"  src="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/'+res[0].file_upload+'" alt=" "/></li>'
	     	$('.imgg').html(html)
	     	var html='<h4>'+res[0].art_title+'<span>'+res[0].art_tag+'</span></h4><p>'+res[0].art_description+'</p>'
	     	$('.imtb').html(html)
	     	var html ='<div class="buy snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">	<a href="Product_list/'+res[0].art_id+'"><input type="submit" name="submit"  value="現在購買" class="button "></a></div>	'
	     	$('.buy').html(html)
	    //  	if(res=="no"){
	    //  		alertify.error('帳號或密碼錯誤');
	    //  	}else if(res=="email_verified_no"){
	    //  		alertify.error('麻煩至註冊信箱,確認驗證信');
	    //  	}
	    //  	else{
	 			// window.location.replace("http://www.fishing-tackle-mall.com/localhost_mall/");
	    //  	}
	     },
	     error: function(res) {
	     	// alertify.error('帳號或密碼錯誤');
	     }
	 });
}