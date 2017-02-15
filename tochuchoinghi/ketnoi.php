<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
	
<body>
	<?php
	$db_host = "localhost";
	$db_name = "doan";
	$db_usename = "root";
	$db_pass = "";
	$connect_db = mysql_connect($db_host,$db_usename,$db_pass) or die ("Không thể kết nối đến database");
	$select_db = mysql_select_db($db_name) or die ("Không thể chọn database");
	?>
</body>
</html>