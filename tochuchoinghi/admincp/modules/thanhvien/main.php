<?php
	$ac = $_GET['ac'];
	if($ac == "them")
	{
		include("modules/thanhvien/themthanhvien.php");
		}
	else
	{
		include("modules/thanhvien/suathanhvien.php");
		}
	include("modules/thanhvien/danhsachthanhvien.php");
	
?>