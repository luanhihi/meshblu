<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Virtual Payment Client Example</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
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

.shade {
	height: 25px;
	background-color: #CED7EF
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



.background-image {
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	width: 100%;
	text-align: left;
	border-collapse: collapse;
	background: url("...") 330px 59px no-repeat;
	margin: 0px;
}

.background-image th {
	font-weight: normal;
	font-size: 14px;
	color: #339;
	padding: 12px;
}

.background-image td {
	color: #669;
	border-top: 1px solid #fff;
	padding: 9px 12px;
}

.background-image tfoot td {
	font-size: 11px;
}

.background-image tbody td {
	background: url("./back.png");
}

* html 
.background-image tbody td {
	filter: progid : DXImageTransform.Microsoft.AlphaImageLoader ( src =
		'table-images/back.png', sizingMethod = 'crop' );
	background: none;
}

.background-image tbody tr:hover td {
	color: #339;
	background: none;
}

.background-image .tb_title{
	font-family: Verdana, Arial, sans-serif;
	color: #08185A;
	background-color: #CED7EF;
	font-size: 14px;
	color: #339;
	padding: 12px;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="banner">
<img src="img/image.png" width="1366" />
</div>
<div id="menu"></div>
<div id="menur"></div>
<div id="content">
<?php
    date_default_timezone_set('Asia/Krasnoyarsk');
?>
<center><form action="do.php" method="post">
  <p>
    <?php 
session_start();
?>
    <input type="hidden" name="Title" value="VPC 3-Party" />
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><strong><font size="15" color="#FF0000" > Thông Tin Giao Dịch</strong></p></font>
  <p>&nbsp;</p>
  <table width="381" border="1">
    <tr>
      <td> <div align="center"><strong>Name</strong></div></td>
      <td><p align="center"><strong>Input</strong></p></td>
    </tr>
    <input type="hidden" name="vpc_Merchant" value="ONEPAY" size="20"
				maxlength="16" />
     <input type="hidden" name="vpc_AccessCode" value="D67342C2"
				size="20" maxlength="8" />
    <tr>
      <td><strong><em>Mã Giao Dịch</em></strong></td>
      <td><div align="center">
        <input type="text" name="vpc_MerchTxnRef"
				value="<?php
				echo date ( 'YmdHis' ) . rand ();
				?>" size="20"
				maxlength="40" />
      </div></td>
    </tr>
    <tr>
      <td><strong><em>Mã Hóa Đơn</em></strong></td>
      <td><div align="center">
        <input type="text" name="vpc_OrderInfo" value="<?php echo $_POST['loaive'];?>"
				size="20" maxlength="34" />
      </div></td>
    </tr>
    <tr>
      <td><strong><em>Số Tiền Thanh Toán</em></strong></td>
      <td><div align="center">
        <input type="text" name="vpc_Amount" value="<?php echo $_SESSION['tien']; ?>" size="20"
				maxlength="10" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>
    <input type="hidden" name="vpc_ReturnURL" size="45"
				value="http://localhost/tochuchoinghi/dr.php"
				maxlength="250" />
    </p>
    <input type="hidden" name="vpc_Version" value="2" size="20"
				maxlength="8" />
    
  <input type="hidden" name="vpc_Command" value="pay" size="20"
				maxlength="16" />
    
    <input type="hidden" name="vpc_Locale" value="vn" size="20"
				maxlength="5" />
    
    <input type="hidden" name="vpc_Currency" value="VND" size="20"
				maxlength="5" />
    <input type="hidden" name="vpc_TicketNo" maxlength="15"
				value="<?php
			echo $_SERVER ['REMOTE_ADDR'];
			?>" />
    
    <input type="submit"	value="    Thanh Toán    " size="50" maxlength="16" style="color:yellow;background:green" />
    
    </p>
    
    <input type="hidden" name="virtualPaymentClientURL"
			size="63" value="https://mtf.onepay.vn/onecomm-pay/vpc.op"
			maxlength="250" />
  </p>
            
	</tr>
</table>



</form></form> 
<center><input type="submit" value="          Hủy          " style="color:yellow;background:green" size="50" maxlength="16" onClick="window.location='index.php';"/></center>
</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>
