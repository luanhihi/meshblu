<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh sách hội nghị</title>
<style>
    a{
        text-decoration: none;
        color: blue;
    }
	thead td{
		background:#f1f1f1;
		text-align:center;
		padding:0px; margin:0px;
		border:1px solid #fbfbfb;
	}
	tbody td{
		background:#fbfbfb;	
		border:1px solid;
		border:1px solid #f1f1f1;
	}
    
    .pagination{
        text-align:center;
    }
    .pagination a{
        padding:5px;
    }
	#news {
	float:left;
	}
	#newdetail{
	float:left;
	height:500px;
	width:1200px;
	border:1px solid;
	}
</style>
</head>

<body>


<form method="post" action="">

<p><center><font color='red'>DANH SÁCH HỘI NGHỊ </font></p></center>
<div class="right">
<center><table width="auto" align="center" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
          <td width="8%">Mã hội nghị</td>
          <td width="30%">Tên</td>
          <td width="13%">Thời gian bắt đầu</td>
          <td width="15%">Thời gian kết thúc</td>
          <td width="9%">Sửa</td>
          <td width="10%">Xóa</td>
          
          
        </tr>
    </thead>
        <tbody>
          <?php
             $db_host = "localhost";
	$db_name = "doan";
	$db_usename = "root";
	$db_pass = "";
	$connect_db = mysql_connect($db_host,$db_usename,$db_pass) or die ("Không thể kết nối đến database");
	$select_db = mysql_select_db($db_name) or die ("Không thể chọn database");
			 mysql_query("SET NAMES 'UTF8'");
             $sql = "SELECT * FROM danhsachhoithao";
             $query = mysql_query($sql);
             $total = mysql_num_rows($query);
             if($total > 0){
                while($data = mysql_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$data['Maht']."</td>";
                    echo "<td>".$data['tenhoithao']."</td>";
                    echo "<td>".$data['thoigianbatdau']."</td>";
					echo "<td>".$data['thoigianketthuc']."</td>";
					
                      echo "<td><a href='index.php?quanly=hoinghi&ac=sua&Maht=".$data['Maht']."'>
                                 Edit</a></td>";
                      echo "<td><a href='modules/hoinghi/xoahoinghi.php?Maht=".$data['Maht']."'>
                                 Delete</a></td>";
					  
                      echo "</tr>";
                    }    
                }
            ?>
            
  </tbody>
</table></center>
</div>
</form>

</body>
</html>