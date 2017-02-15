<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>
	  <?php
	  if(isset($_POST['submit'])){
			session_start();
			
			require_once("ketnoi.php");
  			mysql_query("SET NAMES 'UTF8'"); 
			  if(isset($_POST['submit']))
				{
					//mã hóa tài khoản mật khẩu
					$mahoinghi=$_POST['mahoinghi'];
					$chucdanh = addslashes($_POST['chucdanh']);
					$tentc = addslashes($_POST['tentc']);
					$ten = addslashes($_POST['ten']);
					$hodem = addslashes($_POST['hodem']);
					$diachi = addslashes($_POST['dc']);
					$mota = addslashes($_POST['mota']);
					$ghichu = $_POST['ghichu'];
					$loaive = $_POST['rd'];
					$gala = $_POST['gala'];
					$thanhtoan = $_POST['thanhtoan'];
					if ( !$mahoinghi || ! $chucdanh || ! $tentc || !$ten || !$hodem || !$diachi || !$mota || !$ghichu || ! $loaive || !$gala || ! $thanhtoan )
				{
			print "Xin vui lòng nhập đầy đủ các thông tin. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
			exit;
				}

					//Tạo tài khoản vào database
				 $b=mysql_query("INSERT INTO dangkyhoithao (Maht,chucdanh, tentochuc, ten, hodem, diachi,mota,loaive,galadinner,ghichu,thanhtoan)  	   	               VALUES   ('$mahoinghi','$chucdanh', '$tentc', '$ten','$hodem', '$diachi','$mota', '$loaive' ,'$gala', '$ghichu','$thanhtoan') ");
				
					
					
			}
	  }
						
  	?>
</p>
<div class="left">
<form name="maudk" action="" method="post">
  <p><strong>Mã Hội Nghị:</strong>
     <select name="mahoinghi" >
          <option value="1">1</option>
          <option value="2">2</option>
    </select>
</p>
  <p>&nbsp;</p>
  <table border="1" width="268" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0">
			
			<tr>
				<td width="108"><strong>Chức Danh:</strong></td>
				<td width="147"><input type="text" name="chucdanh" value=""></td>
			</tr>
			
			<tr>
				<td><strong>Tên tổ chức:</strong></td>
				<td><input type="text" name="tentc" value=""></td>
			</tr>
			<tr>
				<td><strong>Tên:</strong></td>
				<td><input type="text" name="ten" value=""></td>
			</tr>
			<tr>
				<td><strong>Họ đệm:</strong></td>
				<td><input type="text" name="hodem" value=""></td>
			</tr>
            <tr>
				<td><strong>Địa chỉ:</strong></td>
				<td><input type="text" name="dc" value=""></td>
			</tr>
            
				<td><strong>Mô tả bản thân:</strong></td>
				<td><input name="mota" type="text" value="" size="24" /></td>
			
			
		</table>
  <p>
    <strong>Mời lựa chọn loại vé </strong>
  </p>

<table width="280" height="141" border="1">
  <tr>
    <td height="23"><strong>Tên loại vé</strong></td>
    <td>Giá vé</td>
  </tr>
  <tr>
    <td width="120"><input type="radio" name="rd" value="VeDaiBieu" checked="checked"/>      
    Vé cho đại biểu</td>
    <td width="144"><input type="text" name="giadb" value="750.000" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="rd" value="VeSinhVien" />
      Vé cho sinh viên</td>
    <td><input name="giasv" type="text" value="500.000" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="rd" value="Veditheo" />
      Người đi theo</td>
    <td><input name="giaditheo" type="text" value="250.000" /></td>
  </tr>
</table>
<table width="280" border="1">
  <tr>
    <td width="125" height="61">Gala Dinner: 1.000.000</td>
    <td width="139"><p>
      <label>
      <input type="radio" name="gala" value="Co" id="gala_0" />
      Có</label>
      <br />
      <label>
      <input type="radio" name="gala" value="Khong" id="gala_1" checked="checked" />
      Không</label>
      <br />
    </p></td>
  </tr>
</table>
<p>
  <strong>
  <label for="ghichu">Ghi chú thêm</label>
  </strong>
  <label for="ghichu"><br />
  </label>
  <textarea name="ghichu" id="ghichu" cols="30" rows="2"></textarea>
</p>
<p><strong>Thanh toán:</strong>
<select name="thanhtoan" >
          <option value="Đã thanh toán">Đã thanh toán</option>
          <option value="Chưa thanh toán">Chưa thanh toán</option>
    </select>
<br />
</p>
<p>
  <input type="submit" name="submit" value="Đăng ký" />
</p>


  
</form>
</div>

</body>
</html>