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
            if(isset($_GET['matv']) && $_GET['matv'] != null){
				
                require_once("ketnoi.php");
				mysql_query("SET NAMES 'UTF8'");
                $sql = "SELECT * FROM thanhvien WHERE matv ='".$_GET['matv']."'";
                $query = mysql_query($sql);
                $infoUser = mysql_fetch_assoc($query);
                
                
                // Xu ly check form update
            if(isset($_POST['ok'])){
               $username = addslashes( $_POST['username'] );
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
    	
			//Kiểm tra email có đúng định dạng hay không
   		 if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
   			 {
        		echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
       			 exit;
    		}
               if($username && $level && $email && $gioitinh){
				  // 
			 
                    $sqlCheck = "SELECT * FROM thanhvien where email='".$email."' and matv!= '".$_GET['matv']."'";
                    $queryCheck = mysql_query($sqlCheck);
                    $totalCheck = mysql_num_rows($queryCheck);
                    if($totalCheck > 0){
                        echo "<p>Email này đã có người sử dụng rồi</p>";
                    }else{
                        if($pass == false){
                        $sql = "UPDATE thanhvien SET
                                        taikhoan='".$username."',
                                        email='".$email."',
										gioitinh = '".$gioitinh."',
                                        quyenhan='".$level."' 
                                        WHERE matv='".$_GET['matv']."'
                                ";
                    }else{
                        $sql = "UPDATE thanhvien SET
                                        taikhoan='".$username."',
										password='".md5($pass)."',
                                        email='".$email."',
										gioitinh = '".$gioitinh."',
                                        quyenhan='".$level."' 
                                        
                                        WHERE matv='".$_GET['matv']."'
                                ";
                    }
                    mysql_query($sql);
                    header("location:danhsachthanhvien.php");   
                }
               }
            }
        }
        ?>
        <?php /*
        <div>
        <a href="">Chào bạn:</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="logout.php">Đăng xuất</a>
        </div>*/ ?>
        <h3>
            Sửa thành viên
        </h3>
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
        	<label>Tên thành viên</label><input type="text" name="username" value="" size="25" />
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
            <input type="submit" name="ok" value="Sửa" />&nbsp;&nbsp;
            <input type="submit" name="ok" value="Làm Lại" />
            </form>
            </div>
</body>
</html>
