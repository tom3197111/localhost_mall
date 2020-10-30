



    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">




                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h4>訂單資料</h4>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div></div>
                                <div  class="col-md-12 mb-3">
                                    <label for="name">取貨人姓名<span>*</span></label>
                                    <input type="text" class="form-control" id="name" value="" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="phone_number">取貨人電話<span>*</span></label>
                                    <input type="phone" class="form-control" id="phone" min="0" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="EMAIL">取貨人EMAIL<span>*</span></label>
                                    <input type="EMAIL" class="form-control" id="email" min="0" value="" required>
                                </div>

<div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">資料與註冊資料一樣</label>
                                    </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">送貨地址 <span>*</span></label>
                                <div class="nav">
                                    <ul class="nav nav-tabs">
                                         <li @if(empty($Logistics))class="active"@endif ><a data-toggle="tab" id="Home">宅配</a></li>
                                         <li @if(!empty($Logistics))class="active"@endif ><a data-toggle="tab" id="Logistics">到店取貨</a></li>
                                    </ul>
                                </div>

                                <div id="Home_div"  @if(empty($Logistics))style="display: block;"@else style="display: none;"@endif>
                                @foreach($post_fee as $key=>$val )
                                    @if($val['LogisticsType']=='Black_cat')
                                        <?php
                                            $String = $val->logo_img;
                                            $url=str_replace("public\\",'https://34.80.230.232/MALL_BACKEND/public/', $String);
                                        ?>
                                            <div class="col-lg-4 col-sm-4 col-xs-4 ">
                                               <img class="Eleven" id="Eleven" src="{{$url}}" style="width: 100PX;height: 100pX">
                                                  <div style="border-style:double;width: 100px"> 運費:{{$val->post_fee}}</div> 
                                                  <input type="hidden" id='home_price' value="{{$val->post_fee}}">
                                            </div>
                                            <br><br><br><br><br><br><br>
                                    @endif
                                @endforeach 
                                    <div id="zipcode3"></div>
                                    <input type="text" class="form-control" id="address" value="" >
                                </div>
<input type="hidden" id='_token' name="_token" value="{{ csrf_token() }}">
<div id="Logistics_div"  @if(!empty($Logistics))style="display: block;"@else style="display: none;"@endif>
    <br>

                @foreach($post_fee as $key=>$val )
                    @if($val['LogisticsType']!='Black_cat')
                        <?php
                            $String = $val->logo_img;
                            $url=str_replace("public\\",'https://34.80.230.232/MALL_BACKEND/public/', $String);
                        ?>
                            <div class="col-lg-4 col-sm-4 col-xs-4 ">
                               <a href="Logistics/map/{{$val['LogisticsType']}}/{{$order[0]->order_id}}"> <img class="Eleven" id="Eleven" src="{{$url}}"
                                  style="width: 100PX;height: 100pX"></a>&emsp;&emsp;
                                  <br> <br>    
                                  <div style="border-style:double;width: 100px"> 運費:{{$val->post_fee}}</div> 
                                  <br>
                            </div>
                    @endif
                @endforeach    
@if(!empty($Logistics))
<br> <br> <br> <br> <br>  <br> <br>        
        <div >




            <div style="border-style:double;" class="col-lg-12 col-sm-12 col-xs-12 ">
                <label>選擇店家:</label><br>&emsp; &emsp;<span style="font-size: 5px">
                    <input type="hidden" id="LogisticsSubType" value="{{$Logistics['LogisticsSubType']}}">
           @if($logo_img != '')
                <?php
                    $url=str_replace("public\\",'https://34.80.230.232/MALL_BACKEND/public/', $logo_img['logo_img']);
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
        <br><br><br><br><br><br><br><br><br><br><br><br>
@endif
</div>
              <div id="test"></div>
</div>      

                                
           <!--                          <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                    </div> -->
                                </div>
                                <br>
                                <div class="col-12">
                                    <label for="">買家留言</label>
                                    <textarea class="form-control" cols="50" rows="5" id='buy_message'></textarea>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


<input type="hidden" id="order_number" value="{{$order[0]->order_id}}">





                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto" style="">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>訂單編號:{{$order[0]->order_id}}</h5>
                        </div>
<!--                         <ul class="order-details-form mb-4">
                            <li><span>品項</span>
                                <span>單價</span>
                                <span>數量</span>
                                <span>價錢</span>
                            </li>
                        @foreach($order as $k =>$order_list)
                            <li><span>{{$order_list->name}}</span> 
                                <span>{{$order_list->total_fee}}</span>
                                <span>{{$order_list->quantity}}</span>
                                <span>${{$order_list->price}}</span>
                            </li>
                        @endforeach

                            <li><span>小計</span> <span>$59.90</span></li>
                            <li><span>運費</span> <span>Free</span></li>
                            <li><span>總額</span> <span>$59.90</span></li>
                        </ul> -->
                        @if(!empty($order))

                            <table class="table table-hover table-responsive" id="">
                                
                                        <tr><th colspan="1">商品</th>
                                            <th colspan="1">品名</th>
                                            <th colspan="1">單價</th>
                                            <th colspan="1">數量</th>
                                            <th colspan="1">總價</th>
                                             <th colspan="1"></th>
                                        </tr>
                                @foreach($order as $k =>$order_list)
                                      <tr class="tableHorizontalBottomLine"  data-price="{{$order_list->price}}" data-key="id" data-id="{{$order_list->id}}" >

                                      <td class="text-center"  data-key="image" data-img="{{$order_list->image}}" style="width: 30px;">
                                        <img width="30px" height="30px" src="{{$order_list->image}}"/>
                                      </td>
                                      <td data-key="name" data-name="{{$order_list->name}}">{{$order_list->name}}</td>

                                      <td data-key="price" data-price="{{$order_list->price}}" title="Unit Price" id="price" class="text-right">{{$order_list->price}}<br></td>
                                      <td data-key="quantity" data-quantity="{{$order_list->quantity}}"  title="Quantity"><input type="number" min="1" style="width: 70px;" class="quantity" value="{{$order_list->quantity}}"/></td> 
                                      <td data-key="total" data-total="{{$order_list->total_fee}}" title="Total" class="text-right my-product-total">{{$order_list->total_fee}}<br></td>
                                      <td title="Remove from Cart" class="text-center" style="width: 30px;"><a href="javascript:void(0);" class="btn btn-xs btn-danger remove">X</a></td>   
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

                        <a href="#" ><img  id="Place_Order" src="/images/pay/logo_pay200x55.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


