<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
	if(isset($_GET['taikhoan']) && $_GET['taikhoan'] != null  )
	{
		require_once("ketnoi.php"); 
		mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien"; $query = mysql_query($sql);
		
/*		if(isset($_POST['tentaikhoan']))
			{
				$tentaikhoan=$_POST['tentaikhoan'];
			}
*/		echo '<select onchange="change(this.value)"  name="tentaikhoan">';
		while ($row = mysql_fetch_array($query))
		 {
				 if($row['taikhoan']==$_GET['taikhoan'])
					echo '<option selected="selected"  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
				else 
					echo '<option  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
		}
		$ten=$_GET['taikhoan'];
		echo '</select>';
		if(isset($_POST['dm']))
		{
			?>
						<script>
			function change(id){
				//alert(id);
				var id2=document.getElementById("id2").value();
				//Lấy các giá trị
				window.location="thu2.php?taikhoan="+id+"&ttt="+id2;	
			}
			</script>
            <?php
		echo $ten;
		
		//-----------------------------------------------------------
		$sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten."' "; $query = mysql_query($sql);
		echo '<select  name="matv">';
		while ($row = mysql_fetch_array($query)) {
		   echo '<option value="'.$row['matv'].'">'.$row['matv'].'</option>';
		   
		}
		$matv = $_POST['matv'];
		echo '</select>';
		}
	}
?>
<input  type="submit" name="dm" value="Xem"/>
</form>

</body>
</html>