<?php
	$ac = $_GET['ac'];
	if($ac == "them")
	{
		include("modules/daibieu/themdangky.php");
		}
	else
	{
		include("modules/daibieu/suadangky.php");
		}
	include("modules/daibieu/danhsachdangky.php");
	
?>