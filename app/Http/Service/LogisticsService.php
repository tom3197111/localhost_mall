<?php

namespace App\Http\Service;

use App\Http\Repository\LogisticsRepository;
use App\Http\Repository\OrderRepository;
use App\Http\Repository\IndexRepository;
use EcpayLogistics;
use EcpayLogisticsType;
// use EcpayLogisticsSubType;
use EcpayIsCollection;
// use EcpayDevice;
class LogisticsService
{
    protected $LogisticsRepository;
    protected $OrderRepository;

    public function __construct()
    {
        $this->LogisticsRepository = new LogisticsRepository();
        $this->OrderRepository = new OrderRepository();
        $this->IndexRepository = new IndexRepository();
    }

    public function Logistics_Service($payment_number){

    //取得物流相關資料
    $Logistics_data = $this->OrderRepository->select_order_shipping_payment_number($payment_number);
    //取得訂單資料
    $Order_data = $this->OrderRepository->select_order_cartRepository($payment_number);
    //取得寄件者(公司)資料
    $Sender_data =$this->IndexRepository->get();
    //取得收件者資料
    $Receiver_data=$this->OrderRepository->select_order_shipping_payment_number($payment_number);
    // 超商取貨物流訂單幕後建立
    define('HOME_URL', 'http://www.sample.com.tw/logistics_dev');
    // require('Ecpay.Logistic.Integration.php');
    try {
        $AL = new EcpayLogistics();
        $AL->HashKey = '5294y06JbISpM5x9';
        $AL->HashIV = 'v77hoKGq4kWxNNIS';
        $AL->Send = array(
            'MerchantID' => '2000132',
            'MerchantTradeNo' => $payment_number,
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'LogisticsType' => $Logistics_data[0]['LogisticsType'],
            'LogisticsSubType' => $Logistics_data[0]['LogisticsSubType'],
            'GoodsAmount' => (int)$Order_data['payment'],
            'CollectionAmount' => 10,
            'IsCollection' => EcpayIsCollection::NO,
            'GoodsName' => '商品',
            'SenderName' => $Sender_data[0]['Company_name'],
            'SenderPhone' => $Sender_data[0]['Company_phone'],
            'SenderCellPhone' => '',
            'ReceiverName' => $Receiver_data[0]['receiver_name'],
            'ReceiverPhone' => '',
            'ReceiverCellPhone' => $Receiver_data[0]['receiver_mobile'],
            'ReceiverEmail' => $Receiver_data[0]['receiver_email'],
            'TradeDesc' => $Order_data['buy_message'],
            'ServerReplyURL' => HOME_URL . '/ServerReplyURL.php',
            'LogisticsC2CReplyURL' => HOME_URL . '/LogisticsC2CReplyURL.php',
            'Remark' => '測試備註',
            'PlatformID' => '',
        );

        $AL->SendExtend = array(
            'ReceiverStoreID' => '991182',
            'ReturnStoreID' => '991182'
        );
        // BGCreateShippingOrder()
        $Result = $AL->BGCreateShippingOrder();
        echo '<pre>' . print_r($Result, true) . '</pre>';
    } catch(Exception $e) {
        echo $e->getMessage();
    }
    }


}
