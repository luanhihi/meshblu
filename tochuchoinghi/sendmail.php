<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
		include "class.phpmailer.php"; 
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
		$mail->AltBody = "liên hệ qua web"; 
		$mail->From = 'luanntl1994@yahoo.com.vn';
		$mail->FromName = 'Luân'; 
		$mail->AddAddress("luanntl1994@gmail.com","Bộ phận chăm sóc khách hàng của Tổ Chức Hội Nghị");
		$mail->AddReplyTo('luanntl1994@yahoo.com.vn','Nguyễn Thành Luân');	
		$mail->WordWrap = 50;  
		$mail->IsHTML(true);  
		$mail->Subject = 'Email liên hệ từ website';
		$mail->Body = 'Xin chào, bạn vừa đăng ký tài khoản thành công';
		if(!$mail->Send())
			echo("Có lỗi khi gửi email, bạn vui lòng liên hệ với www.thuonghieuweb.com để được hỗ trợ, xin cảm ơn!");
		else 
			echo ('Gửi mail thành công');
?>
</body>
</html>




