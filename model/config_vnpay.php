<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
*/

$vnp_TmnCode = "H74CC5BS"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "XPMLVPEEUTYQSXRYINOEDXOQIYZIDIVB"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/duan1/index.php?action=cam-on"; 
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));