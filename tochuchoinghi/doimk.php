<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="JavaScript">
    function checkinput(){
        password_old=document.myform.password_old;
		password_new=document.myform.password_new;
		password_renew=document.myform.password_renew;
		mkcu= document.myform.password_mkcu;
		if(password_old.value==""){
            alert("Chưa nhập mật khẩu cũ");
            password_old.focus();
            return false;
        }
        if(password_new.value==""){
            alert("Chưa nhập mật khẩu mới");
            password_new.focus();
            return false;
        }
		
        if(password_renew.value==""){
            alert("Nhập lại mật khẩu mới một lần nữa");
            password_renew.focus();
            return false;
        }
        return true;
    }
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<img src="img/image.png" width="1366" />
</div>
<div id="menu"></div>
<div id="menur"></div>
<div id="content">
<?php
session_start();
require_once("ketnoi.php");

	mysql_query("SET NAMES 'UTF8'");
	$tk = $_SESSION['username'];
	$sql = "SELECT * FROM thanhvien WHERE taikhoan ='".$tk."'";
             $query = mysql_query($sql);
			 $data = mysql_fetch_assoc($query);
			 $mkcu= $data['matkhau'];
			 

?>
<center><form name="myform" method="post" action="" onSubmit="return checkinput();">
  <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center">
          <p><strong><center><font color="#FF0000">Đổi mật khẩu</font></strong></center>
          </p>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <p></p>
          <tr>
            <td><b>Tên đăng nhập:</b></td>
            <td><input readonly="readonly" type="text" name="username" value="<?php echo $tk ?>"/></td>
          </tr>
          <tr>
            <td><b>Mật khẩu cũ:</b></td>
            <td><input type="password" name="password_old" /></td>
          </tr>
          <tr>
            <td><b>Mật khẩu mới:</b></td>
            <td><input type="password" name="password_new" /></td>
          </tr>
      <tr>
            <td><b>Nhập lại mật khẩu:</b></td>
            <td><input type="password" name="password_renew" /></td>
          </tr>
          <p align="center"> </p>
        </table>
    <p align="center">
        <input type="submit" name="submit" value="     Đổi mật khẩu    " style="color:yellow;background:green">
            
    </p>
    <p align="center">&nbsp;</p>
    <?php
	if(isset($_POST['submit']))
			 {
				  $password_old = md5( addslashes( $_POST['password_old'] ) );
			 $password_new = md5( addslashes( $_POST['password_new'] ) );
			 $password_renew = md5( addslashes( $_POST['password_renew'] ) );
			 if ( $password_old != $mkcu )
			{
				echo "<b>Mật khẩu cũ không đúng</b>";
				
			}
			 if ( $password_new != $password_renew )
			{
				echo "<b>Mật khẩu mới không khớp</b>";
				
			}
			 $a = "UPDATE thanhvien SET matkhau='".$password_new."' WHERE taikhoan ='".$tk."'"; 
              mysql_query($a);
			  if ($a)
				print "<p>Đổi mật khẩu thành công. <a href='index.php'>Trở về trang trủ</a><br/></p>";
			else
				print "Có lỗi trong quá trình đăng kí, Vui lòng liên hệ BQT";
				 }
	?>
      </form></center>
      </div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>