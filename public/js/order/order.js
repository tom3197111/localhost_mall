$(function () {
  //送出訂單
  // $('#checkoutToPay').click(function(){
  //   console.log($('#checkoutPaymentList').find('li .selected'))
  // })
}());

//數量
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
  $('#subtotal').text(TotalPrice)
  $('#TotalPrice').text(TotalPrice+parseInt($('#postageDesc').text()))
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

//刪除購物車內的商品
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

 //  $("#customCheck1").change(function(){
 //    checked=$("#customCheck1").is(':checked');
 //    if(checked == true){
 //      var name = $('#Session_name').text().substr(4).trim()
 //      $('#name').val(name)
 //      var email = $('#Session_Email').text().substr(4).trim()
 //      $('#email').val(email)
 //      var phone = $('#Session_phone').text().substr(5).trim()
 //      $('#phone').val(phone)
 //    }
 // });
 
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