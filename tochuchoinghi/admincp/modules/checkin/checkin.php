
<?php 
if(isset($_GET['Madk']) && $_GET['Madk'] != null){
			session_start();
			
			require_once("ketnoi.php");
  			mysql_query("SET NAMES 'UTF8'"); 
			 $sql = "UPDATE dangkyhoithao SET
			 							
										checkin='1'
										
                                        WHERE Madk='".$_GET['Madk']."'
                                ";
                    
                        
                    mysql_query($sql);
			header("Location: ../../index.php?quanly=checkin&ac=them");
			
			
}

?>