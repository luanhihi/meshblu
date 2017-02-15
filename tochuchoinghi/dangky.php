<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Ký</title>
<script language="JavaScript">
    function checkinput(){
        username=document.myform.username;
        password=document.myform.password;
        password1=document.myform.password1;
        email=document.myform.email;
        gioitinh=document.myform.gioitinh;
        reg1=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
        testmail=reg1.test(email.value);
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
        if(password1.value==""||password1.value!==password.value){
            alert("Mật khẩu lần 2 chưa khớp");
            password1.focus();
            return false;
        }
      if(gioitinh.value==""){
            alert("Chưa nhập địa chỉ");
            diachi.focus();
            return false;
        }
        if(!testmail){
            alert("Địa chỉ email không hợp lệ");
            email.focus();
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
          <p><strong><center><font color="#FF0000">Đăng ký thành viên</font></strong></center>
          </p>
          <tr>
            <td>Xin vui lòng nhập đúng<br />
              các thông tin cá nhân</td>
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
          <tr>
            <td><b>Nhập lại Mật khẩu:</b></td>
            <td><input type="password" name="password1" /></td>
          </tr>
          <tr>
            <td><b>Email:</b></td>
            <td><input type="text" size="30" name="email" /></td>
          </tr>
          <tr>
            <td><b>Giới Tính:</b></td>
            <td><select name="gioitinh" id="gioitinh">
          <option value="Nam">Nam       </option>
          <option value="Nữ">Nữ         </option>
        </select></td>
          </tr>
          <p align="center"> </p>
    </table>
        <p align="center">
            <input type="submit" name="submit" value="Đăng ký" style="color:yellow;background:green">
            <input type="reset" value="Làm lại" style="color:yellow;background:green">
        </p>
  </form></center>
  
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?php
	//gọi kết nối
	require_once("ketnoi.php");
	mysql_query("SET NAMES 'UTF8'");
	if(isset($_POST['submit']))
	{
			//mã hóa tài khoản mật khẩu
			$username = addslashes( $_POST['username'] );
			$password = md5( addslashes( $_POST['password'] ) );
			$verify_password = md5( addslashes( $_POST['password1'] ) );
			$email = addslashes( $_POST['email'] );
			$gioitinh = $_POST['gioitinh'];
			
			 //Kiểm tra tên đăng nhập này đã có người dùng chưa
    	if (mysql_num_rows(mysql_query("SELECT taikhoan FROM thanhvien WHERE taikhoan='$username'")) > 0){
        	echo "<center><b>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác</b></center>";
        	exit;
   			}
		//Kiểm tra email đã có người dùng chưa
  		  if (mysql_num_rows(mysql_query("SELECT email FROM thanhvien WHERE email='$email'")) > 0)
   		   {
       		  echo "<center><b>Email này đã có người dùng. Vui lòng chọn Email khác</b></center>";
       		  exit;
   		   }
			//Tạo tài khoản vào database
		 $a=mysql_query("INSERT INTO thanhvien (taikhoan, matkhau, email, gioitinh,quyenhan) VALUES ('$username', '$password', 			   '$email','$gioitinh','Member') ");
		 
		
			// Thông báo hoàn tất việc tạo tài khoản
			if ($a)
				print "<center><b>Tài khoản đã được tạo. <a href='dangnhap.php'>Nhấp vào đây để đăng nhập</a><br/></b></center>";
			else
				print "<center><b>Có lỗi trong quá trình đăng kí, Vui lòng liên hệ BQT</b></center>";
				
				//Gửi Mail thông báo thành công
				/*include "class.phpmailer.php"; 
				include "class.smtp.php"; 
				$mail = new PHPMailer();
				$mail->IsSMTP();  
				$mail->SMTPDebug = 1;
				$mail->Host = "smtp.mail.yahoo.com"; 
				$mail->Port = 465;   
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'ssl';
				$mail->Username = "luanntl1994@yahoo.com.vn";  
				$mail->Password = "Luankk02101994";  
				$mail->AltBody = "Liên hệ từ Admin"; 
				$mail->From = 'luanntl1994@yahoo.com.vn';
				$mail->FromName = 'Luân'; 
				$mail->AddAddress("$email","Bộ phận chăm sóc khách hàng của Tổ Chức Hội Nghị");
				$mail->AddReplyTo('luanntl1994@yahoo.com.vn','Nguyễn Thành Luân');	
				$mail->WordWrap = 50;  
				$mail->IsHTML(true);  
				$mail->Subject = 'Email liên hệ từ website';
				$mail->Body = 'Xin chào: '.$username.' bạn vừa đăng ký tài khoản thành công';
				if(!$mail->Send())
					echo("<center><b>Có lỗi khi gửi email, bạn vui lòng liên hệ với BQT để được hỗ trợ, xin cảm ơn!</b></center>");*/
			
	}

?>
  
</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>

</body>
</html>