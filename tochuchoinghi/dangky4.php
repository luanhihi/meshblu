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
        <input type="text" name="chucdanh" id="chucdanh" value="<?php echo $_SESSION['chucdanh']; ?>"/>
      </div></td>
  </tr>
  <tr>
    <td><strong>Tên tổ chức:</strong></td>
    <td><div align="center">
      <input type="text" name="tentc" id="tentc" value="<?php echo $_SESSION['tentc']; ?>" />
    </div></td>
  </tr>
  <tr>
    <td><strong>Tên:</strong></td>
    <td><div align="center">
      <input type="text" name="ten" id="ten" value="<?php echo $_SESSION['ten']; ?>" />
    </div></td>
  </tr>
  <tr>
    <td><strong>Họ đệm:</strong></td>
    <td><div align="center">
      <input type="text" name="hodem" id="hodem" value="<?php echo $_SESSION['hodem']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Địa chỉ:</strong></td>
    <td><div align="center">
      <input type="text" name="diachi" id="diachi" value="<?php echo $_SESSION['diachi']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Mô tả bản thân:</strong></td>
    <td><div align="center">
      <input type="text" name="mota" id="mota" value="<?php echo $_SESSION['mota']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Ghi chú thêm:</strong></td>
    <td><div align="center">
      <input type="text" name="ghichu" id="ghichu" value="<?php echo $_SESSION['ghichu']; ?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Loại vé:</strong></td>
    <td><div align="center">
      <input type="text" name="loaive" id="loaive" value="<?php echo $_SESSION['loaive'];?>"/>
    </div></td>
  </tr>
  <tr>
    <td><strong>Gala Dinner:</strong></td>
    <td><div align="center">
      <input type="text" name="gala" id="gala" value="<?php echo $_SESSION['gala']; ?>" />
    </div></td>
  </tr>
  <tr>
    <td><strong>Tổng Tiền:</strong></td>
    <td><div align="center">
      <input type="text" name="tongtien" id="tongtien" value="<?php echo $_SESSION['tien']; ?>" />
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <input  type="submit" name="thahtoan" value="Thanh Toán" style="color:yellow;background:green"/ >
</p> 
</form></center>
<center><input type="submit" value="       Hủy       " style="color:yellow;background:green" size="50" maxlength="16" onClick="window.location='index.php';"/></center>
</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>