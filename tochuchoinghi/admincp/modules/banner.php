<style>
.black_overlay{
    display: none;
    position: absolute;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 100%;
    background-color: black;
    z-index:1001;
    -moz-opacity: 0.8;
    opacity:.80;
    filter: alpha(opacity=80);
}
 
.white_content {
    display: none;
    position: absolute;
    top: 25%;
    left: 25%;
    width: 35%;
    height: 35%;
    padding: 16px;
    border: 16px solid #039;
    background-color: white;
    z-index:1002;
    overflow: auto;
}
</style>
<div id="banner">
<center><p><font size="15" color="#FF0000" >Trang Quản Trị - Administrator</font></p></center>
<form action="" method="post">
  <p>&nbsp;</p>
  <?php 
//session_start();
if (isset($_SESSION['username']) && $_SESSION['username']){
           echo '<b>Xin Chào: </b>'.$_SESSION['username'];
		   echo '<a href="logout.php">&nbsp;Logout</a>'; 
		   }
       else{
           echo "Bạn chưa đăng nhập! <a href='dangnhap.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='dangky.php'>Nhấp vào đây để đăng ký</a>";
       }
?> Thông báo: <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><?php require_once("ketnoi.php");
$sql = "SELECT * FROM dangkyhoithao";
 $query = mysql_query($sql);
 $sobanghi=0;
 $total = mysql_num_rows($query);
             if($total > 0){
                while($data = mysql_fetch_assoc($query))
				{
					if($data['status'] == '1')
						{
							$sobanghi = $sobanghi +1;
							}
					}
					
			 }
			 echo $sobanghi."&nbsp"; ?></a>
       <a  href="../index.php">Trang Chủ</a>   
</form>
<div id="light" class="white_content">Có thêm: <?php require_once("ketnoi.php");
$sql = "SELECT * FROM dangkyhoithao";
 $query = mysql_query($sql);
 $sobanghi=0;
 $total = mysql_num_rows($query);
             if($total > 0){
                while($data = mysql_fetch_assoc($query))
				{
					if($data['status'] == '1')
						{
							$sobanghi = $sobanghi +1;
							}
					}
					
			 }
			 echo $sobanghi; ?> thành viên đăng ký
             <p><?php
require_once("ketnoi.php");
mysql_query("SET NAMES 'UTF8'");
$sql = "SELECT * FROM dangkyhoithao";
 $query = mysql_query($sql);
 $sobanghi=0;
 $total = mysql_num_rows($query);
             if($total > 0){
                while($data = mysql_fetch_assoc($query))
				{
					if($data['status'] == '1')
						{
							echo "<center>Ông/bà: "."<b>".$data['ten']."</b>"." vừa đăng ký hội nghị: "."<b>".$data['Maht']."</b>"."<br/></center>";
							
							}
					}
					
			 }
			 
?></p>
<form action="" method="post">
<input type="submit" name="ok" value="Cập Nhật" />
</form>

<?php
 if(isset($_POST['ok'])){
		require_once("ketnoi.php");
		mysql_query("SET NAMES 'UTF8'");

 		$sql = "UPDATE dangkyhoithao SET
			 							
										status='0'
										
                                       where status = '1'
                                ";
                    
                        
                    mysql_query($sql);
			
}
			 
?>

<center><p><a href = "index.php?quanly=thanhvien&ac=them" >CLOSE</a></p></center>
</div>
<div id="fade" class="black_overlay"></div>
</div>