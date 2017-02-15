<?php
    session_start();
?>
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
		  if(isset($_GET['Maht']) && $_GET['Maht'] != null){
				
                require_once("ketnoi.php");
				mysql_query("SET NAMES 'UTF8'");
                $sql = "SELECT * FROM danhsachhoithao WHERE Maht ='".$_GET['Maht']."'";
                $query = mysql_query($sql);
                $infoUser = mysql_fetch_assoc($query);
                
                
                // Xu ly check form update
            if(isset($_POST['them'])){
               $tenhoithao = addslashes( $_POST['tenhoithao'] );
			$thoigianbd = $_POST['thoigianbd'];
			$thoigiankt = $_POST['thoigiankt'];
			if ( ! $tenhoithao || ! $thoigianbd || !$thoigiankt )
				{
			print "Xin vui lòng nhập đầy đủ các thông tin. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
			exit;
				}
              
			 $sql = "UPDATE danhsachhoithao SET
                                        tenhoithao='".$tenhoithao."',
                                        thoigianbatdau='".$thoigianbd."',
										thoigianketthuc= '".$thoigiankt."'
                                        
                                        WHERE Maht='".$_GET['Maht']."'
                                ";
                    
                        
                    mysql_query($sql);
                    header("location:danhsachhoinghi.php");   
                
               }
            }
        if(isset($_POST['lamlai']))
			{header("Location: suahoinghi.php");}
        ?>
        
<div class="left">        
<h3>
            Sửa thông tin hội nghị</h3>
        <br />
<form action="" method="post" name="" enctype="multipart/form-data">
  
                    <br />
        	<label>Tên hội nghị</label>
        	<input type="text" name="tenhoithao" value="" size="25" />
                    <?php
                        echo isset($errorName) && $errorName != "" ? $errorName: "";
                    ?>
            <br />
            <label>Thời Gian bắt đầu</label><input type="text" name="thoigianbd"  size="25" />
                    <?php
                        echo isset($errorPass) && $errorPass != "" ? $errorPass: "";
                    ?>
            <br />
            <label>Thời gian kết thúc</label><input type="text" name="thoigiankt"  size="25" /><br />
            
            <br />                        
            <label>&nbsp;</label>
            <input type="submit" name="them" value="Sửa" />&nbsp;&nbsp;
            <input type="submit" name="lamlai" value="Làm lại" />
</form>
</div>
</body>
</html>
