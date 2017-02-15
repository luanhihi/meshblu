<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
  if(isset($_GET['matv']) && $_GET['matv'] != null ) {
      require_once("ketnoi.php");
      $sql = "DELETE FROM thanhvien WHERE matv ='".$_GET['matv']."'";
      mysql_query($sql);
	  //header("location:danhsachthanhvien.php"); 
	  header("location: ../../index.php?quanly=thanhvien&ac=them"); 
  }
?>
</body>
</html>