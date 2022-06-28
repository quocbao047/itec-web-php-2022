<?php
    include_once('connection.php');
     if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $rowsPerPage = 10;
        $perRow = $page*$rowsPerPage-$rowsPerPage;
    $sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm LIMIT $perRow, $rowsPerPage";
    $query = mysql_query($sql);
?>
<link rel="stylesheet" type="text/css" href="css/listproduct.css" />
<h2>Product Management</h2>
<div id="main">
	<p id="add-prd"><a href="administration.php?page_layout=themsp"><span>Add new products</span></a></p>
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="40%">Product name</td>
            <td width="15%">Price</td>
            <td width="20%">Supplier</td>
            <td width="10%">Description photo</td>
            <td width="5%">Fix</td>
            <td width="5%">Delete</td>
        </tr>
        <?php
            while($row = mysql_fetch_array($query)){
        ?>
        <tr>
        	<td><span><?php echo $row['id_sp'];?></span></td>
            <td class="l5"><a href="#"><?php echo $row['ten_sp'];?></a></td>
            <td class="l5"><span class="price"><?php echo $row['gia_sp'];?></span></td>
            <td class="l5"><?php echo $row['ten_dm']?></td>
            <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_sp'];?>" /></span></td>
            <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><span>Sửa</span></a></td>
            <td><a href="xoasp.php?id_sp=<?php echo  $row['id_sp'];?>"><span>Xóa</span></a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
       $totalRows = mysql_num_rows(mysql_query("SELECT * FROM sanpham"));
       $totalPage = ceil($totalRows/$rowsPerPage);
       $listPage = '';
       for($i=1;$i<=$totalPage;$i++){
            if($i==$page){
                $listPage .= " <span>".$i."</span> ";
            }else{
                $listPage .= ' <a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&page='.$i.'">'.$i.'</a> ';
            }
       }
    ?>
    <p id="pagination"><?php echo $listPage;?></p>
</div>