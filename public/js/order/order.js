$(function () {

     
    var tr_length = $('.table .tableHorizontalBottomLine').length; //tr 長度
    var TotalPrice = 0
    var post_fee = 0
    var bcm_p_f=0
    if($('#post_fee').text()!=0 || $('#bcm_p_f').text()!=0){
      post_fee=$('#post_fee').text()
      bcm_p_f=$('#bcm_p_f').text()
    }
    for(var i=0; i < tr_length; i++){ 
        Price=$('.table .tableHorizontalBottomLine:eq('+i+') td:eq(4)').text();
        TotalPrice=TotalPrice+parseInt(Price)
    }

    $('#subtotal').text(TotalPrice)


    post_fee=TotalPrice+parseInt(post_fee) 
    bcm_p_f=TotalPrice+parseInt(bcm_p_f) 

    if($('.nav').find('li.active').text()=='宅配'){
      home_price=$('#home_price').val()
      $('#TotalPrice').text(bcm_p_f)
      $('#bcm').show()
    }else if($('.nav').find('li.active').text()=='到店取貨' && isNaN(post_fee)){
      $('#TotalPrice').text('請選擇取貨店家')

    }else{
      $('#bcm').hide()
      $('#TotalPrice').text(post_fee)
    }

//選項卡
$('#Home').click(function(){
  $('#Home_div').show()
  $('#Logistics_div').hide()
  $('#bcm').show()
  $('#ccm').hide()
  $('#TotalPrice').text(bcm_p_f)
})

$('#Logistics').click(function(){
  $('#Home_div').hide()
  $('#Logistics_div').show()
  $('#bcm').hide()
  $('#ccm').show()
  if(isNaN(post_fee)){
      $('#TotalPrice').text('請選擇取貨店家')
    }else{
      $('#TotalPrice').text(post_fee)
    }
  
}) 




  }());

$(".quantity").click(function(){
  var price = $(this).closest("tr").data("price");
  var id = $(this).closest("tr").data("id");
  var quantity = $(this).val();
  var account = $('#hidden_account').val();
  var _token = $('#_token').val();
  var tr_length = $('.table .tableHorizontalBottomLine').length; //tr 長度
  total_fee=quantity*price
  var TotalPrice = 0
  $(this).parent().next().text(total_fee)
    for(var i=0; i < tr_length; i++){ 
        Price=$('.table .tableHorizontalBottomLine:eq('+i+') td:eq(4)').text();
        TotalPrice=TotalPrice+parseInt(Price)
        
    }
    $('#TotalPrice').text(TotalPrice)
    // console.log(TotalPrice)
    $.ajax({
        type: "post",
        url: "/localhost_mall/update_Shopping_cart",
        data:{total_fee:total_fee,quantity:quantity,id:id,account:account,_token:_token},
        // dataType: "json",
        success: function(res) {

        },
        error: function(res) {
        }
    });
});


$(".remove").click(function(){
  var id = $(this).closest("tr").data("id");
  //選取當前行的TR 然後尋找TD 的第四個
  var total = $(this).closest("tr").find("td").eq(4).text()
  var account = $('#hidden_account').val();
  var _token = $('#_token').val();
  var TotalPrice = $('#TotalPrice').text()
  $('#TotalPrice').text(TotalPrice-total)
  $(this).closest('.tableHorizontalBottomLine').remove()
    $.ajax({
        type: "post",
        url: "/localhost_mall/delete_Shopping_cart",
        data:{id:id,account:account,_token:_token},
        // dataType: "json",
        success: function(res) {

        },
        error: function(res) {
        }
    });
            
});

  $("#customCheck1").change(function(){
    checked=$("#customCheck1").is(':checked');
    if(checked == true){
      var name = $('#Session_name').text().substr(4).trim()
      $('#name').val(name)
      var email = $('#Session_Email').text().substr(4).trim()
      $('#email').val(email)
      var phone = $('#Session_phone').text().substr(5).trim()
      $('#phone').val(phone)
    }
 });
// $("#Place_Order").click(function(){
//     var Tbdata = {}; 
//     var tr_length = $('.table .tableHorizontalBottomLine').length; //tr 長度
//     for(var i=0; i < tr_length; i++){ 
//         Tbdata[i] = {};
//         Tbdata[i]['commodity_name'] = $('.table .tableHorizontalBottomLine:eq('+i+') td:eq(1)').text().trim();
//         Tbdata[i]['price'] = $('.table .tableHorizontalBottomLine:eq('+i+') td:eq(2)').text().trim();
//         Tbdata[i]['quantity'] = $('.table .tableHorizontalBottomLine:eq('+i+') input:eq(0)').val()
//         Tbdata[i]['total_fee'] = $('.table .tableHorizontalBottomLine:eq('+i+') td:eq(4)').text().trim();
//         Tbdata[i]['id'] = $('.tableHorizontalBottomLine:eq('+i+')').data("id");
//     }
//     var account = $('#hidden_account').val();
//     var _token = $('#_token').val();
//       $.ajax({
//           type: "post",
//           url: "/checkout/Ecpay",
//           // async:false,
//           data:{Tbdata:Tbdata,account:account,_token:_token},
//           // dataType: "HTML",
//           success: function(res) {
//             $("#test").html(res);
//           },
//           error: function(res) {
//           }
//       });
            
// });
  $("#Place_Order").click(function(){
      var account = $('#hidden_account').val();
      var receiver_name = $('#name').val();
      var receiver_mobile = $('#phone').val();
      var receiver_email = $('#email').val();
      var buy_message = $('#buy_message').val();    
      var Delivery=$('.nav').find('li.active').text()
      var _token =$('#_token').val()
      if(Delivery=='到店取貨'){
          var CVSStoreID = $('#CVSStoreID').text()
          var CVSStoreName = $('#CVSStoreName').text()
          var CVSAddress = $('#CVSAddress').text()
          var CVSTelephone = $('#CVSTelephone').text()
          var LogisticsSubType = $('#LogisticsSubType').val()
          var post_fee = $('#post_fee').text()
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

        var city = $('select[name="city"] :selected').text();
        var town = $('select[name="town"] :selected').text();
        var address = $('#address').val(); 
        receiver_address=city+town+address
        var LogisticsType='Home'
        var _token = $('#_token').val();
          $.ajax({
              type: "post",
              url: "/localhost_mall/checkout/Ecpay",
              // async:false,
              data:{account:account,receiver_name:receiver_name,receiver_mobile:receiver_mobile,buy_message:buy_message,receiver_address:receiver_address,_token:_token},
              // dataType: "HTML",
              success: function(res) {
                $("#test").html(res);
              },
              error: function(res) {
              }
          });
      }      


  });


// //物流checkbox
// $('#Logistics_div div input').click(function(){
//   if($(this).prop('checked')){
//     $('#Logistics_div div input:checkbox').prop('checked',false);
//     $(this).prop('checked',true);
//   }
// });


// function map(object){
//   var id=object.id
//   var order_number=$('#order_number').val()
//   // alert(order_number)
//       $.ajax({
//         type: "get",
//         url: "/Logistics/map/"+id+'/'+order_number,
//         data:{_token: "{{ csrf_token() }}"},
//         // dataType: "json",
//         success: function(res) {
//           console.log(res);
//           $('#asd').html(res)
//           // window.open(html(res),"_blank");
//         },
//         error: function(res) {
//         }
//     });
// }