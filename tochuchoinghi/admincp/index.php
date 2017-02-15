<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Quản Trị</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	session_start();
	if (isset($_SESSION['username']) && $_SESSION['username']){
		require_once("ketnoi.php");
		mysql_query("SET NAMES 'UTF8'");
		$l = "SELECT quyenhan FROM thanhvien WHERE taikhoan='".$_SESSION['username']."'";
		$query = mysql_query($l);
		$data = mysql_fetch_assoc($query);
		if($data['quyenhan'] == 'Administrator')
		{
			
			include("modules/banner.php");
			include("modules/menu.php");
			include("modules/content.php");
			include("modules/footer.php");
			
		
		}
		else { 
				header("Location: ../index.php");
			}
	}
	else
	{
		header("Location: ../index.php");
		}
	
	
	
?>
</body>
</html>