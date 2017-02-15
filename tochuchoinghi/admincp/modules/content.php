<div id="content">
<?php
	if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
		}
	else {$tam = "";}
	
	if($tam == "thanhvien")
		{
			include("modules/thanhvien/main.php");
			
			}
			
	else if($tam == "hoinghi")
		{
			include("modules/hoinghi/main.php");
			}
	else if($tam == "daibieu")
		{
			include("modules/daibieu/main.php");
			}
	else
	{
			include("modules/checkin/main.php");
			}
	
?>
</div>