
<?php

/* -----------------------------------------------------------------------------

 Version 2.0

--------------------------------------------------------------------------------

 @author OnePAy JSC

------------------------------------------------------------------------------*/

// *********************
// START OF MAIN PROGRAM
// *********************


// Define Constants
// ----------------
// This is secret for encoding the MD5 hash
// This secret will vary from merchant to merchant
// To not create a secure hash, let SECURE_SECRET be an empty string - ""
// $SECURE_SECRET = "secure-hash-secret";
$SECURE_SECRET = "A3EFDFABA8653DF2342E8DAC29B51AF0";

// If there has been a merchant secret set then sort and loop through all the
// data in the Virtual Payment Client response. While we have the data, we can
// append all the fields that contain values (except the secure hash) so that
// we can create a hash and validate it against the secure hash in the Virtual
// Payment Client response.


// NOTE: If the vpc_TxnResponseCode in not a single character then
// there was a Virtual Payment Client error and we cannot accurately validate
// the incoming data from the secure hash. */

// get and remove the vpc_TxnResponseCode code from the response fields as we
// do not want to include this field in the hash calculation
$vpc_Txn_Secure_Hash = $_GET ["vpc_SecureHash"];
unset ( $_GET ["vpc_SecureHash"] );

// set a flag to indicate if hash has been validated
$errorExists = false;

ksort ($_GET);

if (strlen ( $SECURE_SECRET ) > 0 && $_GET ["vpc_TxnResponseCode"] != "7" && $_GET ["vpc_TxnResponseCode"] != "No Value Returned") {
	
    //$stringHashData = $SECURE_SECRET;
    //*****************************khởi tạo chuỗi mã hóa rỗng*****************************
    $stringHashData = "";
	
	// sort all the incoming vpc response fields and leave out any with no value
	foreach ( $_GET as $key => $value ) {
//        if ($key != "vpc_SecureHash" or strlen($value) > 0) {
//            $stringHashData .= $value;
//        }
//      *****************************chỉ lấy các tham số bắt đầu bằng "vpc_" hoặc "user_" và khác trống và không phải chuỗi hash code trả về*****************************
        if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
		    $stringHashData .= $key . "=" . $value . "&";
		}
	}
//  *****************************Xóa dấu & thừa cuối chuỗi dữ liệu*****************************
    $stringHashData = rtrim($stringHashData, "&");	
	
	
//    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper ( md5 ( $stringHashData ) )) {
//    *****************************Thay hàm tạo chuỗi mã hóa*****************************
	if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)))) {
		// Secure Hash validation succeeded, add a data field to be displayed
		// later.
		$hashValidated = "CORRECT";
	} else {
		// Secure Hash validation failed, add a data field to be displayed
		// later.
		$hashValidated = "INVALID HASH";
	}
} else {
	// Secure Hash was not validated, add a data field to be displayed later.
	$hashValidated = "INVALID HASH";
}

// Define Variables
// ----------------
// Extract the available receipt fields from the VPC Response
// If not present then let the value be equal to 'No Value Returned'
// Standard Receipt Data
$amount = null2unknown ( $_GET ["vpc_Amount"] );
$locale = null2unknown ( $_GET ["vpc_Locale"] );
//$batchNo = null2unknown ( $_GET ["vpc_BatchNo"] );
$command = null2unknown ( $_GET ["vpc_Command"] );
//$message = null2unknown ( $_GET ["vpc_Message"] );
$version = null2unknown ( $_GET ["vpc_Version"] );
//$cardType = null2unknown ( $_GET ["vpc_Card"] );
$orderInfo = null2unknown ( $_GET ["vpc_OrderInfo"] );
//$receiptNo = null2unknown ( $_GET ["vpc_ReceiptNo"] );
$merchantID = null2unknown ( $_GET ["vpc_Merchant"] );
//$authorizeID = null2unknown ( $_GET ["vpc_AuthorizeId"] );
$merchTxnRef = null2unknown ( $_GET ["vpc_MerchTxnRef"] );
$transactionNo = null2unknown ( $_GET ["vpc_TransactionNo"] );
//$acqResponseCode = null2unknown ( $_GET ["vpc_AcqResponseCode"] );
$txnResponseCode = null2unknown ( $_GET ["vpc_TxnResponseCode"] );

// This is the display title for 'Receipt' page 
//$title = $_GET ["Title"];


// This method uses the QSI Response code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code
//
// @param $responseCode String containing the QSI Response Code
//
// @return String containing the appropriate description
//
function getResponseDescription($responseCode) {
	
	switch ($responseCode) {
		case "0" :
			$result = "Giao dịch thành công - Approved";
			break;
		case "1" :
			$result = "Ngân hàng từ chối giao dịch - Bank Declined";
			break;
		case "3" :
			$result = "Mã đơn vị không tồn tại - Merchant not exist";
			break;
		case "4" :
			$result = "Không đúng access code - Invalid access code";
			break;
		case "5" :
			$result = "Số tiền không hợp lệ - Invalid amount";
			break;
		case "6" :
			$result = "Mã tiền tệ không tồn tại - Invalid currency code";
			break;
		case "7" :
			$result = "Lỗi không xác định - Unspecified Failure ";
			break;
		case "8" :
			$result = "Số thẻ không đúng - Invalid card Number";
			break;
		case "9" :
			$result = "Tên chủ thẻ không đúng - Invalid card name";
			break;
		case "10" :
			$result = "Thẻ hết hạn/Thẻ bị khóa - Expired Card";
			break;
		case "11" :
			$result = "Thẻ chưa đăng ký sử dụng dịch vụ - Card Not Registed Service(internet banking)";
			break;
		case "12" :
			$result = "Ngày phát hành/Hết hạn không đúng - Invalid card date";
			break;
		case "13" :
			$result = "Vượt quá hạn mức thanh toán - Exist Amount";
			break;
		case "21" :
			$result = "Số tiền không đủ để thanh toán - Insufficient fund";
			break;
		case "99" :
			$result = "Người sủ dụng hủy giao dịch - User cancel";
			break;
		default :
			$result = "Giao dịch thất bại - Failured";
	}
	return $result;
}

//  -----------------------------------------------------------------------------
// If input is null, returns string "No Value Returned", else returns input
function null2unknown($data) {
	if ($data == "") {
		return "No Value Returned";
	} else {
		return $data;
	}
}
//  ----------------------------------------------------------------------------
$thanhtoan = "";
$transStatus = "";
if($hashValidated=="CORRECT" && $txnResponseCode=="0"){
	$transStatus = "Giao dịch thành công";
	
	$thanhtoan = 'Đã thanh toán';
	
	
	
}elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
	
}else {
	$transStatus = "Giao dịch thất bại";
	$thanhtoan = 'Chưa thanh toán';
}
//chèn dữ liệu vừa đăng ký vào bảng
		require_once("ketnoi.php");
		mysql_query("SET NAMES 'UTF8'"); 
		session_start();
		$Maht = $_SESSION['Maht'];
		$chucdanh1= $_SESSION['chucdanh'] ;
		$tentc1= $_SESSION['tentc']  ;
		$ten1= $_SESSION['ten'] ;
		$hodem1= $_SESSION['hodem']  ;
		$diachi1= $_SESSION['diachi'];
		$mota1= $_SESSION['mota'] ;
		 $loaive1= $_SESSION['loaive'] ;
		$gala1= $_SESSION['gala'] ;
		$ghichu1 = $_SESSION['ghichu'];
		$b=mysql_query("INSERT INTO dangkyhoithao (Maht,chucdanh, tentochuc, ten, hodem, diachi,mota,loaive,galadinner,ghichu,thanhtoan,status)  	VALUES   ('$Maht','$chucdanh1', '$tentc1', '$ten1','$hodem1', '$diachi1','$mota1', '$loaive1' ,'$gala1', '$ghichu1','$thanhtoan','1') ");
		
		mysql_query($b);




?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php $title;?></title>
<meta http-equiv="Content-Type" content="text/html, charset=utf8">
<style type="text/css">
<!--
h1 {
	font-family: Arial, sans-serif;
	font-size: 24pt;
	color: #08185A;
	font-weight: 100
}

h2.co {
	font-family: Arial, sans-serif;
	font-size: 24pt;
	color: #08185A;
	margin-top: 0.1em;
	margin-bottom: 0.1em;
	font-weight: 100
}

h3.co {
	font-family: Arial, sans-serif;
	font-size: 16pt;
	color: #000000;
	margin-top: 0.1em;
	margin-bottom: 0.1em;
	font-weight: 100
}

body {
	font-family: Verdana, Arial, sans-serif;
	font-size: 10pt;
	color: #08185A background-color : #FFFFFF
}

a:link {
	font-family: Verdana, Arial, sans-serif;
	font-size: 8pt;
	color: #08185A
}

a:visited {
	font-family: Verdana, Arial, sans-serif;
	font-size: 8pt;
	color: #08185A
}

a:hover {
	font-family: Verdana, Arial, sans-serif;
	font-size: 8pt;
	color: #FF0000
}

a:active {
	font-family: Verdana, Arial, sans-serif;
	font-size: 8pt;
	color: #FF0000
}


tr.title {
	height: 25px;
	background-color: #0074C4
}

td {
	font-family: Verdana, Arial, sans-serif;
	font-size: 8pt;
	color: #08185A
}

th {
	font-family: Verdana, Arial, sans-serif;
	font-size: 10pt;
	color: #08185A;
	font-weight: bold;
	background-color: #CED7EF;
	padding-top: 0.5em;
	padding-bottom: 0.5em
}

input {
	font-family: Verdana, Arial, sans-serif;
	font-size: 8pt;
	color: #08185A;
	background-color: #CED7EF;
	font-weight: bold
}



#background-image {
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	width: 80%;
	text-align: left;
	border-collapse: collapse;
	background: url("...") 330px 59px no-repeat;
	margin: 20px;
}

#background-image th {
	font-weight: normal;
	font-size: 14px;
	color: #339;
	padding: 12px;
}

#background-image td {
	color: #669;
	border-top: 1px solid #fff;
	padding: 9px 12px;
}

#background-image tfoot td {
	font-size: 11px;
}

#background-image tbody td {
	background: url("./back.png");
}

* html 
#background-image tbody td {
	filter: progid : DXImageTransform.Microsoft.AlphaImageLoader ( src =
		'table-images/back.png', sizingMethod = 'crop' );
	background: none;
}

#background-image tbody tr:hover td {
	color: #339;
	background: none;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<div id="banner">
<img src="img/image.png" width="1366" />
</div>
<div id="menu"></div>
<div id="menur"></div>
<div id="content">
<body>


<!-- start branding table --><!-- end branding table -->
<!-- End Branding Table -->
<center>
	<h1><?php echo $transStatus;?></h1>
</center>



<center>
<table width="74%" id="background-image" summary="Meeting Results">
	<thead>
		<tr>
			<th width="54%" scope="col"><div align="center"><strong>Name</strong></div></th>
			<th width="46%" scope="col"><div align="center"><strong>Value</strong></div></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td align="center" colspan="4"></td>
		</tr>
	</tfoot>
	<tbody>
		
		<tr>
			<td><strong><i>Mã Giao Dịch</i></strong></td>
			<td><?php
			echo $merchTxnRef;
			?></td>
		</tr>
		<tr>
			<td><strong><i>Mã Hóa Đơn</i></strong></td>
			<td><?php
			echo $orderInfo;
			?></td>
		</tr>
		<tr>
			<td><strong><i>Số Tiền Thanh Toán</i></strong></td>
			<td><?php
			echo $amount;
			?></td>
		</tr>
		
		
		
<?php
// only display the following fields if not an error condition
if ($txnResponseCode != "7" && $txnResponseCode != "No Value Returned") {
	?>
            <tr>
			<td><strong><i>Transaction Number</i></strong></td>
			<td><?php
	echo $transactionNo;
	?></td>
        </tr>
		
<?php
}
?>    
	</tbody>
</table>
<form method="post" action="">
<p><input type="submit" name="trangchu" value="Trang Chủ" ></p></form>
<?php 
if(isset($_POST['trangchu'])){
	header("Location:index.php ");
}
?>
</center>
</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>