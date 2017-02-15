<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thông Tin Đăng Ký</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<img src="img/image.png" width="1366" />
</div>
<div id="menu"></div>
<div id="menur"></div>
<div id="content">

<center><form action="thanhtoan.php" method="post">
<p>&nbsp;  </p>
<p>
  <?php

			session_start();

		  if(isset($_GET['Madk']) && $_GET['Madk'] != null){
				
                require_once("ketnoi.php");
				mysql_query("SET NAMES 'UTF8'");
                $sql = "SELECT * FROM dangkyhoithao WHERE Madk ='".$_GET['Madk']."'";
                $query = mysql_query($sql);
                 $data = mysql_fetch_array($query);
                
                
               
               
            }
        ?>

					
					


</p>
<p>&nbsp;</p>
<p><strong><font size="20" color="#FF0000" > Thông Tin Đăng Ký</strong></p></font>
<p>&nbsp;</p>
<table width="468" border="1">
  <tr>
    <td width="168"><div align="center"><strong>Type</strong></div></td>
    <td width="284"><div align="center"><strong>Content</strong></div></td>
  </tr>
  <tr>
    <td><strong>Chức Danh:</strong></td>
    <td><label for="chucdanh"></label>
      <div align="center">
        <input type="text" readonly="readonly" name="chucdanh" id="chucdanh" value="<?php echo $data['chucdanh']; ?>"/>
      </div></td>
  </tr>
  <tr>
    <td><strong>Tên tổ chức:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="tentc" id="tentc" value="<?php echo $data['tentochuc']; ?>" />
    </div></td>
  </tr>
  <tr>
    <td><strong>Tên:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="ten" id="ten" value="<?php echo $data['ten']; ?>" />
    </div></td>
  </tr>
  <tr>
    <td><strong>Họ đệm:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="hodem" id="hodem" value="<?php echo $data['hodem']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Địa chỉ:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="diachi" id="diachi" value="<?php echo $data['diachi']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Mô tả bản thân:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="mota" id="mota" value="<?php echo $data['mota']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Ghi chú thêm:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="ghichu" id="ghichu" value="<?php echo $data['ghichu']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Loại vé:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="loaive" id="loaive" value="<?php echo $data['loaive'];?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Gala Dinner:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="gala" id="gala" value="<?php echo $data['galadinner']; ?>" />
    </div></td>
  </tr>
  <tr>
    <td><strong>Thanh toán:</strong></td>
    <td><div align="center">
      <input type="text" readonly="readonly" name="tongtien" id="tongtien" value="<?php echo $data['thanhtoan']; ?>" />
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>

</form></center>
<center><input type="submit" value="      Trang chủ      " style="color:yellow;background:green" size="50" maxlength="16" onClick="window.location='index.php';"/></center>
</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>