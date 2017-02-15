<?php
	$ac = $_GET['ac'];
	if($ac == "them")
	{
		include("modules/hoinghi/taohoinghi.php");
		}
	else if($ac == "sua")
	{
		include("modules/hoinghi/suahoinghi.php");
		}
	else
	{
		include("modules/hoinghi/xemhoinghi.php");
		}
	include("modules/hoinghi/danhsachhoinghi.php");
	
?>