<?php
    include_once('connection.php');
    $error = NULL;
    if(isset($_POST['submit'])){
        // Trap error leaving data field blank in Form
        // Name of product
        if($_POST['name_product'] == ''){
            $error_name_product = '<span style="color:red;">(*)<span>';
        }
        else{
            $name_product = $_POST['name_product'];
        }
        // Price
        if($_POST['price_product'] == ''){
            $error_price_product = '<span style="color:red;">(*)<span>';
        }
        else{
            $price_product = $_POST['price_product'];
        }
        // insurance
        if($_POST['bao_hanh'] == ''){
            $error_bao_hanh = '<span style="color:red;">(*)<span>';
        }
        else{
            $bao_hanh = $_POST['bao_hanh'];
        }
        // Accessory
        if($_POST['phu_kien'] == ''){
            $error_phu_kien = '<span style="color:red;">(*)<span>';
        }
        else{
            $phu_kien = $_POST['phu_kien'];
        }
        // Status
        if($_POST['tinh_trang'] == ''){
            $error_tinh_trang = '<span style="color:red;">(*)<span>';
        }
        else{
            $tinh_trang = $_POST['tinh_trang'];
        }
        // Promotion
        if($_POST['khuyen_mai'] == ''){
            $error_khuyen_mai = '<span style="color:red;">(*)<span>';
        }
        else{
            $khuyen_mai = $_POST['khuyen_mai'];
        }
        // Condition
        if($_POST['trang_thai'] == ''){
            $error_trang_thai = '<span style="color:red;">(*)<span>';
        }
        else{
            $trang_thai = $_POST['trang_thai'];
        }
        // Product Details
        if($_POST['product_detail'] == ''){
            $error_chi_tiet_sp = '<span style="color:red;">(*)<span>';
        }
        else{
            $chi_tiet_sp = $_POST['product_detail'];
        }
        // Product description photo
        if($_FILES['photo_product']['name'] == ''){
            $error_photo_product = '<span style="color:red;">(*)<span>';
        }
        else{
            $photo_product = $_FILES['photo_product']['name'];
            $tmp = $_FILES['photo_product']['tmp_name'];
        }
        // Product portfolio
        if($_POST['id_dm'] == 'unselect'){
            $error_id_dm = '<span style="color:red;">(*)<span>';
        }
        else{
            $id_dm = $_POST['id_dm'];
        }
        // Special product
        $dac_biet = $_POST['dac_biet'];

        if(isset($ten_sp) && isset($gia_sp) && isset($bao_hanh) && isset($phu_kien) && isset($tinh_trang) && isset($khuyen_mai) && isset($trang_thai) && isset($chi_tiet_sp) && isset($anh_sp) && isset($id_dm) && isset($dac_biet)){

            move_uploaded_file($tmp, 'anh/'.$anh_sp);
            $sql = "INSERT INTO sanpham (ten_sp,gia_sp,bao_hanh,phu_kien,tinh_trang,khuyen_mai,trang_thai,chi_tiet_sp,anh_sp,id_dm,dac_biet) VALUES ('$ten_sp','$gia_sp','$bao_hanh','$phu_kien','$tinh_trang','$khuyen_mai','$trang_thai','$chi_tiet_sp','$anh_sp','$id_dm','$dac_biet')";
            $query = mysql_query($sql);
            header('location:quantri.php?page_layout=danhsachsp');
        }
    }
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Add Product</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Product's name</label><br /><input type="text" name="name_product" /><?php if(isset($error_name_product)){echo $error_name_product;}?></td>
        </tr>
        <tr>
        	<td><label>description photo</label><br /><input type="file" name="photo_product" /><?php if(isset($error_photo_product)){echo $error_photo_product;}?></td>
        </tr>
        <tr>
        	<td><label>Supplier</label><br />
            	<select name="id_dm">
                	<option value="unselect" selected="selected">Supplier selection</option>
                    <option value=1>Iphone</option>
                    <option value=2>Samsung</option>
                    <option value=3>Sony Ericson</option>
                    <option value=4>LG</option>
                    <option value=5>HTC</option>
                </select>
                <?php if(isset($error_id_dm)){echo $error_id_dm;}?>
            </td>
        </tr>
        <tr>
        	<td><label>Price</label><br /><input type="text" name="price_product" /> VNĐ <?php if(isset($error_gia_sp)){echo $error_gia_sp;}?></td>
        </tr>
        <tr>
        	<td><label>Insurance</label><br /><input type="text" name="bao_hanh" value="12 Tháng" /><?php if(isset($error_bao_hanh)){echo $error_bao_hanh;}?></td>
        </tr>
        <tr>
        	<td><label>Accessory</label><br /><input type="text" name="phu_kien" value="Box, Book, Charger, Charger cable, Headphone" /><?php if(isset($error_phu_kien)){echo $error_phu_kien;}?></td>
        </tr>
        <tr>
        	<td><label>Condition</label><br /><input type="text" name="tinh_trang" value="New 100%" /><?php if(isset($error_tinh_trang)){echo $error_tinh_trang;}?></td>
        </tr>
        <tr>
        	<td><label>Sale</label><br /><input type="text" name="khuyen_mai" value="Tempered glass" /><?php if(isset($error_khuyen_mai)){echo $error_khuyen_mai;}?></td>
        </tr>
        <tr>
        	<td><label>Stocking</label><br /><input type="text" name="trang_thai" value="Stocking" /><?php if(isset($error_trang_thai)){echo $error_trang_thai;}?></td>
        </tr>
        <tr>
        	<td><label>Special product</label><br />Có <input type="radio" name="dac_biet" value=1 /> Không <input checked="checked" type="radio" name="dac_biet" value=0 /></td>
        </tr>
        <tr>
        	<td><label>The detail information of product</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"></textarea><?php if(isset($error_chi_tiet_sp)){echo $error_chi_tiet_sp;}?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>