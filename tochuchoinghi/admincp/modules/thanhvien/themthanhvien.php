
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Thành Viên</title>
<style>
	
	label{
		width:120px;
		float:left;
	}
    
	input,select{
		margin-bottom:5px;	
	}
    
    
    a{
        text-decoration: none;
        color: blue;
    }
    font{
        padding-left: 120px;
    }
</style>
</head>
<body>
        <?php
		require_once("ketnoi.php");
		mysql_query("SET NAMES 'UTF8'");
            if(isset($_POST['them'])) {
               //mã hóa tài khoản mật khẩu
			$username = addslashes( $_POST['taikhoan'] );
			$password = md5( addslashes( $_POST['password'] ) );
			$verify_password = md5( addslashes( $_POST['verify_password'] ) );
			$email = addslashes( $_POST['email'] );
			$level=$_POST['level'];
			$gioitinh = $_POST['gioitinh'];
			if ( ! $username || ! $password || ! $verify_password || ! $email || ! $gioitinh || ! $level)
				{
			print "Xin vui lòng nhập đầy đủ các thông tin. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
			exit;
				}
			// Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
		if ( $password != $verify_password )
			{
				print "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay 		trở lại</a>";
				exit;
			}
			 //Kiểm tra tên đăng nhập này đã có người dùng chưa
    	if (mysql_num_rows(mysql_query("SELECT taikhoan FROM thanhvien WHERE taikhoan='$username'")) > 0){
        	echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        	exit;
   			}
			//Kiểm tra email có đúng định dạng hay không
   		 if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
   			 {
        		echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
       			 exit;
    		}
		//Kiểm tra email đã có người dùng chưa
  		  if (mysql_num_rows(mysql_query("SELECT email FROM thanhvien WHERE email='$email'")) > 0)
   		   {
       		  echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
       		  exit;
   		   }
               $a=mysql_query("INSERT INTO thanhvien (taikhoan, matkhau, email, gioitinh,quyenhan) VALUES ('$username', '$password', 			   '$email','$gioitinh','$level') ");
			   mysql_query($a);
			   if ($a)
				print "Tài khoản đã được tạo thành công<br/>";
			else
				print "Có lỗi trong quá trình thêm thành viên";
            }
			////////////////////////////////////////////////////////////////
			if(isset($_POST['lamlai']))
			{$username = "";
			$password= "";
			$verify_password ="";
			$email="";
			$level=""; $gioitinh="";
			}
        ?>
        

<?php /*        
<div>
  <a href="">Chào bạn: <?php echo $_SESSION['username']; ?> </a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="logout.php">Đăng xuất</a>
</div>
*/
?>
<h3>Thêm mới thành viên </h3>
        <br />
<div class="left">
		<form action="" method="post" name="" enctype="multipart/form-data">
        	<label>Quyền hạn</label>
            		<select name="level">
                    	<option value="" selected="selected">Chọn quyền hạn</option>
                    	<option value="Administrator">Administrator</option>
                        <option value="Member">Member</option>
                    </select>
                    <?php
                        echo isset($errorLevel) && $errorLevel != "" ? $errorLevel: "";
                    ?>
                    <br />
        	<label>Tên thành viên</label><input type="text" name="taikhoan" value="" size="25" />
                    <?php
                        echo isset($errorName) && $errorName != "" ? $errorName: "";
                    ?>
            <br />
            <label>Mật khẩu</label><input type="password" name="password" value="" size="25" />
                    <?php
                        echo isset($errorPass) && $errorPass != "" ? $errorPass: "";
                    ?>
            <br />
            <label>Mật khẩu nhập lại</label><input type="password" name="verify_password" value="" size="25" /><br />
            <label>Giới Tính</label><select name="gioitinh" id="gioitinh">
          <option value="Nam">Nam       </option>
          <option value="Nữ">Nữ         </option>
        </select><br />
        	<label>Địa Chỉ Email</label><input type="text" name="email" value="" size="25" />
                <?php
                    echo isset($errorEmail) && $errorEmail != "" ? $errorEmail: "";
                ?>
            <br />                        
            <label>&nbsp;</label>
            <input type="submit" name="them" value="Thêm" />&nbsp;&nbsp;
            <input type="submit" name="lamlai" value="Làm lại" />
        </form>
        </div>
</body>
</html>
