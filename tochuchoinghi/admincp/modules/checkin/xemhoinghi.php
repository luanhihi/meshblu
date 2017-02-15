<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh sách đăng ký</title>
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
	width:1300px;
	border:1px solid;
	}
</style>
</head>

<body>


<form method="post" action="">
<div class="right">
<p><center><font color='red'>DANH SÁCH ĐĂNG KÝ THAM GIA </font></p></center>

<table width="auto" align="center" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
          <td width="3%">Mã đk</td>
          <td width="3%">Mã ht</td>
          <td width="9%">Chức danh</td>
          <td width="6%">Tên tc</td>
          <td width="9%">Họ đệm</td>
          <td width="5%">Tên</td>
          <td width="9%">Địa chỉ</td>
          <td width="9%">Mô tả</td>
          <td width="7%">Loại vé</td>
          <td width="7%">Gala Dinner</td>
          <td width="11%">Ghi chú</td>
          <td width="12%">Thanh Toán</td>
          <td width="5%">Checkin</td>
          <td width="5%">Chức năng</td>
        </tr>
    </thead>
        <tbody>
          <?php
		   if(isset($_GET['Maht']) && $_GET['Maht'] != null){
             require_once("ketnoi.php");
			 mysql_query("SET NAMES 'UTF8'");
             $sql = "SELECT * FROM dangkyhoithao WHERE Maht ='".$_GET['Maht']."' ORDER BY Madk DESC";
             $query = mysql_query($sql);
             $total = mysql_num_rows($query);
             if($total > 0){
                while($data = mysql_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$data['Madk']."</td>";
					echo "<td>".$data['Maht']."</td>";
                    echo "<td>".$data['chucdanh']."</td>";
                    echo "<td>".$data['tentochuc']."</td>";
					echo "<td>".$data['hodem']."</td>";
					echo "<td>".$data['ten']."</td>";
					echo "<td>".$data['diachi']."</td>";
					echo "<td>".$data['mota']."</td>";
					echo "<td>".$data['loaive']."</td>";
					echo "<td>".$data['galadinner']."</td>";
					echo "<td>".$data['ghichu']."</td>";
					echo "<td>".$data['thanhtoan']."</td>";
					echo "<td>".$data['checkin']."</td>";
					echo "<td><a href='modules/checkin/checkin.php?Madk=".$data['Madk']."'>
                                 Checkin</a></td>";
                      echo "</tr>";
                    }    
                }
		   }
            ?>
            
  </tbody>
</table>
</div>
</form>

</body>
</html>