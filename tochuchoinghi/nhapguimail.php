<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$to = 'luanntl1994@yahoo.com.vn';  //khai báo địa chỉ mail người nhận
$subject = 'Test email'; // chủ đề của mail
// Đây là nội dung mail cần gửi. Để xuống dòng , chèn \n vào cuối dòng
$message = "Hello World!\n\nThis is my first mail.";
// Khai báo thông tin mail người gửi. Cách dòng bằng \r\n
$headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com";
 //Gửi mail
$mail_sent = @mail( $to, $subject, $message, $headers );
// Nếu thành công thì xuất dòng thông báo "Mail sent", ngược lại thì xuất  "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
</body>
</html>