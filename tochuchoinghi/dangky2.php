<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Ký Hội Nghị</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
    function checkinput(){
        chucdanh=document.myform.chucdanh;
        tentc=document.myform.tẻntc;
        ten= document.myform.tẻn;
		hodem= document.myform.hodem;
		dc= document.myform.dc;
		
        if(chucdanh.value==""){
            alert("Bạn chưa nhập Chức danh");
            chucdanh.focus();
            return false;
        }
        if(tentc.value==""){
            alert("Bạn chưa nhập Tên Tổ Chức");
            tentc.focus();
            return false;
        }
		if(ten.value==""){
            alert("Bạn chưa nhập Tên");
            ten.focus();
            return false;
        }
		if(hodem.value==""){
            alert("Bạn chưa nhập Họ Đệm");
            hodem.focus();
            return false;
        }
		if(dc.value==""){
            alert("Bạn chưa nhập Địa Chỉ");
            dc.focus();
            return false;
        }
        return true;
    }
</script>

</head>

<body>
<div id="banner">
<img src="img/image.png" width="1366" />
</div>
<div id="menu"></div>
<div id="menur"></div>
<div id="content">
<p>
	  <?php
	  if(isset($_GET['Maht']) && $_GET['Maht'] != null){
			session_start();
			
			require_once("ketnoi.php");
  			mysql_query("SET NAMES 'UTF8'"); 
			  if(isset($_POST['submit']))
				{
					//mã hóa tài khoản mật khẩu
					$chucdanh = addslashes($_POST['chucdanh']);
					$tentc = addslashes($_POST['tentc']);
					$ten = addslashes($_POST['ten']);
					$hodem = addslashes($_POST['hodem']);
					$diachi = addslashes($_POST['dc']);
					$mota = addslashes($_POST['mota']);
					$ghichu = $_POST['ghichu'];
					$loaive = $_POST['rd'];
					$gala = $_POST['gala'];
					
					//Tạo tài khoản vào database
				// $b=mysql_query("INSERT INTO thongtin (chucdanh, tentochuc, ten, hodem, diachi,mota,loaive,galadinner,ghichu)  	VALUES   ('$chucdanh', '$tentc', '$ten','$hodem', '$diachi','$mota', '$loaive' ,'$gala', '$ghichu') ");
				/*if ($b)
					{
					print " Bạn đã Đăng ký thành công <a href='dangky4.php'>Nhấp vào đây để xem thông tin đăng ký của bạn</a><br/>";
					}
				else
					{
						print "Có lỗi ";
					}*/
					$_SESSION['Maht']= $_GET['Maht'];
					$_SESSION['chucdanh']= $chucdanh;
					$_SESSION['tentc']= $tentc;
					$_SESSION['ten']= $ten;
					$_SESSION['hodem']= $hodem;
					$_SESSION['diachi']= $diachi;
					$_SESSION['mota']= $mota;
					$_SESSION['ghichu']= $ghichu;
					$_SESSION['loaive']= $loaive;
					$_SESSION['gala']= $gala;
					$tienve=0;
					$tong =0;
					$gala =0;
					if('VeDaiBieu' == $loaive)
					{
						$tienve = 750000;
						
						}
					elseif('VeSinhVien' == $loaive)
						{
							$tienve = 500000;
						}
					else
							{
								$tienve = 250000;
						
							}
							
					if('Co' == $_POST['gala'])
					{
						$gala =1000000;
						}
					else
					{
						$gala =0;
						}
					//echo $tienve;
					//echo $gala;
					
					$tong= $tong + $tienve + $gala;
					
					$_SESSION['tien'] = $tong;
					//echo $_SESSION['tien'];
					header("Location:dangky4.php ");
					
			}
	  }
  	?>
</p>
<center><form name="myform" action="" method="post" onSubmit="return checkinput();" >
  <p>&nbsp;</p>
  <table border="0" width="400" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0">
			
			<tr>
				<td><strong>Chức Danh : (*)</strong></td>
				<td><input type="text" name="chucdanh" value=""></td>
			</tr>
			
			<tr>
				<td><strong>Tên tổ chức: (*)</strong></td>
				<td><input type="text" name="tentc" value=""></td>
			</tr>
			<tr>
				<td><strong>Tên: (*)</strong></td>
				<td><input type="text" name="ten" value=""></td>
			</tr>
			<tr>
				<td><strong>Họ đệm: (*)</strong></td>
				<td><input type="text" name="hodem" value=""></td>
			</tr>
            <tr>
				<td><strong>Địa chỉ: (*)</strong></td>
				<td><input type="text" name="dc" value=""></td>
			</tr>
            
				<td><strong>Mô tả bản thân:</strong></td>
				<td><textarea name="mota" cols="22" rows="2"></textarea></td>
			
			
  </table>
  <p><br />
    <strong>Mời lựa chọn loại vé </strong><br />
  </p>

<table width="500" height="141" border="1">
  <tr>
    <td height="23"><div align="center"><strong>Tên loại vé</strong></div></td>
    <td><div align="center"><strong>Giá vé</strong></div></td>
  </tr>
  <tr>
    <td width="318"><strong>
      <input type="radio" name="rd" value="VeDaiBieu" checked="checked"/>      
    Vé cho đại biểu</strong></td>
    <td width="166"><div align="center">
      <input type="text" name="giadb" value="750.000" />
    </div></td>
  </tr>
  <tr>
    <td><strong>
      <input type="radio" name="rd" value="VeSinhVien" />
      Vé cho sinh viên</strong></td>
    <td><div align="center">
      <input name="giasv" type="text" value="500.000" />
    </div></td>
  </tr>
  <tr>
    <td><strong>
      <input type="radio" name="rd" value="Veditheo" />
      Người đi theo</strong></td>
    <td><div align="center">
      <input name="giaditheo" type="text" value="250.000" />
    </div></td>
  </tr>
</table>
<table width="501" border="1">
  <tr>
    <td width="318" height="61"><strong>Gala Dinner: 1.000.000</strong></td>
    <td width="167"><p>
      <label>
      <input type="radio" name="gala" value="Co" id="gala_0" />
      Có</label>
      <br />
      <label>
      <input type="radio" name="gala" value="Khong" id="gala_1" checked="checked"/>
      Không</label>
      <br />
    </p></td>
  </tr>
</table>
<p>
  <strong>
  <label for="ghichu">Ghi chú thêm</label>
  <textarea name="ghichu" id="ghichu" cols="45" rows="2"></textarea>
  :</strong><br />
</p>
<p>
  <input type="submit" name="submit" value="       Đăng ký      " style="color:yellow;background:green" /><input type="submit" value="       Trở Lại       " style="color:yellow;background:green" size="50" maxlength="16" onclick="history.back(-1)"/></p>


  
</form>

</center>

</div>
<div class="xoa"></div>
<div id="footer">
<img src="img/footer8.png" width="1362" />
</div>
</body>
</html>