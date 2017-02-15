<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
<script language="JavaScript">
    function checkinput(){
        username=document.myform.username;
        password=document.myform.password;
        if(username.value==""){
            alert("Hãy chọn tên đăng nhập");
            username.focus();
            return false;
        }
        if(password.value==""){
            alert("Chưa nhập mật khẩu");
            password.focus();
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
<center><form name="myform" method="post" action="" onSubmit="return checkinput();">
  <p>&nbsp;</p>
    <p>&nbsp;</p>
        <table align="center">
          <p><strong><center><font color="#FF0000">Đăng Nhập Tài Khoản</font></strong></center>
          </p>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <p></p>
          <tr>
            <td><b>Tên đăng nhập:</b></td>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td><b>Mật khẩu:</b></td>
            <td><input type="password" name="password" /></td>
          </tr>
          <p align="center"> </p>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align="center">
            <input type="submit" name="submit" value="Đăng Nhập" style="color:yellow;background:green">
            
    </p>
      </form></center>
      
<p>&nbsp;  </p>
<p>&nbsp;</p>
<p>
  <?php
session_start();

// Tạo kết nối
require_once("ketnoi.php");
if(isset($_POST['submit']))
{
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
   	 	
		$username = addslashes( $_POST['username'] );
		$password = md5( addslashes( $_POST['password'] ) );
		
    // Lấy thông tin của username đã nhập trong table members
    $sql_query = mysql_query("SELECT matv, taikhoan, matkhau, quyenhan FROM thanhvien WHERE taikhoan='{$username}'");
    $member = @mysql_fetch_array( $sql_query );
    // Nếu username này không tồn tại thì....
    if ( @mysql_num_rows( $sql_query ) <= 0 )
    {
        print "<center><b>Tên truy nhập không tồn tại!!!</b></center>";
        exit;
    }
    // Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
    if ( $password != $member['matkhau'] )
    {
        print "<center><b>Nhập sai mật khẩu!!!</b></center>";
        exit;
    }
    // Khởi động phiên làm việc (session)
    $_SESSION['user_id'] = $member['matv'];
	$_SESSION['username'] = $member['taikhoan'];
	$_SESSION['quyenhan'] = $member['quyenhan'];
   
    // Thông báo đăng nhập thành công
	if($member['quyenhan'] == 'Member')
	{
	
    header("Location: index.php");
	}
	else { 
			header("Location: admincp/index.php?quanly=thanhvien&ac=them");
	 	}
}
?>
</p>
<p>&nbsp; </p>
      
</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>