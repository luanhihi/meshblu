<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh sách thành viên</title>
<style>
    a{
        text-decoration: none;
        color: blue;
    }
	thead td{
		background:#f1f1f1;
		text-align:center;
		
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
	
	}
</style>
</head>

<body>


<form method="post" action="">

<p><center><font color='red'>DANH SÁCH THÀNH VIÊN </font></p></center>
<div class="right">
<table width="auto" align="center" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
          <td width="9%"><strong>Mã TV</strong></td>
          <td width="20%"><strong>Họ Tên</strong></td>
          <td width="31%"><strong>Email</strong></td>
          <td width="20%"><strong> Quyền Hạn</strong></td>
          <td width="11%"><strong>Sửa</strong></td>
          <td width="9%"><strong>Xóa</strong></td>
        </tr>
    </thead>
        <tbody>
          <?php
             require_once("ketnoi.php");
			 mysql_query("SET NAMES 'UTF8'");
             $sql = "SELECT * FROM thanhvien ORDER BY matv DESC";
             $query = mysql_query($sql);
             $total = mysql_num_rows($query);
             if($total > 0){
                while($data = mysql_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>".$data['matv']."</td>";
                    echo "<td>".$data['taikhoan']."</td>";
                    echo "<td>".$data['email']."</td>";
                    if($data['quyenhan'] == 'Administrator'){
                      echo "<td><font color='red'>Administrator</a></td>";   
                    }else{
                      echo "<td><font color='#000'>Member</a></td>";
                    }
                      echo "<td><a href='index.php?quanly=thanhvien&ac=sua&matv=".$data['matv']."'>
                                 Edit</a></td>";
                      echo "<td><a href='modules/thanhvien/xoathanhvien.php?matv=".$data['matv']."'>
                                 Delete</a></td>";
                      echo "</tr>";
                    }    
                }
            ?>
            <tr>
      
      </td>
     </tr>    
  </tbody>
</table>
</div>
</form>


</body>
</html>