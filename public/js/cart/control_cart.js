$(function () {
    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
      return true;
    }
    var cartItems =null 
    var  account = $('#hidden_account').val();
    var _token = $('#_token').val();
    if(account !=''){
            $.ajax({
            type: "post",
            url: '/select_Shopping_cart',
            data:{account:account,_token:_token},
            dataType: "json",
            async:false,
            success: function(res) {
              cartItems =res
            },
            error: function(res) {              
              cartItems =''
            }
        });
    }else if(account ==''){
             cartItems =''
             
    }
    $('.my-cart-btn').myCart({
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: cartItems
      ,
      clickOnAddToCart: function($addTocart){
         goToCartIcon($addTocart);
      },

      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
        var check_Cart = new Array();
        $.each(products, function(){
          // check_Cart[]
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
        });

      },
      getDiscountPrice: function(products, totalPrice, totalQuantity) {

        return totalPrice * 1;
      }
    });

  }());

        
 