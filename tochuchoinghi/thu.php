<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>thử</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
<p>
  <?php
require_once("ketnoi.php"); 
mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien"; $query = mysql_query($sql);

if(isset($_POST['tentaikhoan'])){
$tentaikhoan=$_POST['tentaikhoan'];
}
echo '<select onchange="this.form.submit()" name="tentaikhoan">';
$selet ="";
while ($row = mysql_fetch_array($query))
 {
	 	 if($row['taikhoan']==$tentaikhoan)
		 	echo '<option selected="selected"  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
		else 	 	echo '<option  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
}
$ten= $_POST['tentaikhoan'];
echo '</select>';
echo $ten;
?>
  
  <?php


require_once("ketnoi.php"); mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten."' "; $query = mysql_query($sql);
echo '<select  name="matv">';
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['matv'].'">'.$row['matv'].'</option>';
   
}
$matv = $_POST['matv'];
echo '</select>';

require_once("ketnoi.php"); mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten."' "; $query = mysql_query($sql);
echo '<select  name="gioitinh">';
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['gioitinh'].'">'.$row['gioitinh'].'</option>';
}
$gioitinh = $_POST['gioitinh'];
echo '</select>';

 
?>
  <input type="submit" name="xem" value="Xem" />
</p>
<p>
  <?php 
  error_reporting(E_ALL & ~ E_NOTICE); 
if(isset($_POST['xem']  ) || $_POST['tentaikhoan1'] ){
	
	require_once("ketnoi.php"); 
			mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien"; $query = mysql_query($sql);
			
			if(isset($_POST['tentaikhoan1'])){
			$tentaikhoan1=$_POST['tentaikhoan1'];
			}
			echo '<select onchange="this.form.submit()" name="tentaikhoan1">';
			$selet ="";
			while ($row = mysql_fetch_array($query))
			 {
					 if($row['taikhoan']==$tentaikhoan1)
						echo '<option selected="selected"  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
					else 	 	echo '<option  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
			}
			$ten1= $_POST['tentaikhoan1'];
			echo '</select>';
			echo $ten1;
		
			if(isset($_POST['tentaikhoan1'])){
				
								require_once("ketnoi.php"); mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten1."' "; $query = mysql_query($sql);
				echo '<select  name="matv">';
				while ($row = mysql_fetch_array($query)) {
				   echo '<option value="'.$row['matv'].'">'.$row['matv'].'</option>';
				   
				}
				$matv1 = $_POST['matv'];
				echo '</select>';
				
				require_once("ketnoi.php"); mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten1."' "; $query = mysql_query($sql);
				echo '<select  name="gioitinh">';
				while ($row = mysql_fetch_array($query)) {
				   echo '<option value="'.$row['gioitinh'].'">'.$row['gioitinh'].'</option>';
				}
				$gioitinh1 = $_POST['gioitinh'];
				echo '</select>';
			}
			?>
              <input type="submit" name="xem2" value="Xem" />
              <?php
}


////////////////////////////////////////////////////////////



?>

</p>
<p>
<?php 
error_reporting(E_ALL & ~ E_NOTICE); 
if(isset($_POST['xem2']  ) || $_POST['tentaikhoan2'] ){
	
	require_once("ketnoi.php"); 
			mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien"; $query = mysql_query($sql);
			
			if(isset($_POST['tentaikhoan2'])){
			$tentaikhoan2=$_POST['tentaikhoan2'];
			}
			echo '<select onchange="this.form.submit()" name="tentaikhoan2">';
			$selet ="";
			while ($row = mysql_fetch_array($query))
			 {
					 if($row['taikhoan']==$tentaikhoan2)
						echo '<option selected="selected"  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
					else 	 	echo '<option  value="'.$row['taikhoan'].'"  >'.$row['taikhoan'].'</option>';
			}
			$ten2= $_POST['tentaikhoan2'];
			echo '</select>';
			echo $ten2;
		
			if(isset($_POST['tentaikhoan2'])){
				
								require_once("ketnoi.php"); mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten2."' "; $query = mysql_query($sql);
				echo '<select  name="matv">';
				while ($row = mysql_fetch_array($query)) {
				   echo '<option value="'.$row['matv'].'">'.$row['matv'].'</option>';
				   
				}
				$matv2 = $_POST['matv'];
				echo '</select>';
				
				require_once("ketnoi.php"); mysql_query("SET NAMES 'UTF8'"); $sql = "SELECT * FROM thanhvien WHERE taikhoan = '".$ten2."' "; $query = mysql_query($sql);
				echo '<select  name="gioitinh">';
				while ($row = mysql_fetch_array($query)) {
				   echo '<option value="'.$row['gioitinh'].'">'.$row['gioitinh'].'</option>';
				}
				$gioitinh2 = $_POST['gioitinh'];
				echo '</select>';
			}
}
?>
</p>
<p><input type="submit" name="luu"  value="Lưu"/></p>
<?php 
if(isset($_POST['luu']))
{
	$a=mysql_query("INSERT INTO nhap (ten, ma, gioitinh) VALUES ('$ten','$matv', '$gioitinh') ");
	if(isset($_POST['xem']  ) || $_POST['tentaikhoan1'] )
	{
		$b=mysql_query("INSERT INTO nhap (ten, ma, gioitinh) VALUES ('$ten1','$matv1', '$gioitinh1') ");
		}
	}
?>

</form>
</body>
</html>