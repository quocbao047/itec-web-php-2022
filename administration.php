<?php
    session_start();
    include_once('connection.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ITEC Mobile Shop - Home</title>
<link rel="stylesheet" type="text/css" href="css/quantri.css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="navbar">
        	<ul>
            	<li id="admin-home"><a href="quantri.php">admin home page</a></li>
                <li><a href="quantri.php?page_layout=thanhvien">member</a></li>
                <li><a href="quantri.php?page_layout=danhmucsp">product category</a></li>
                <li><a href="quantri.php?page_layout=danhsachsp">product</a></li>
                <li><a target="_blank" href="#">website</a></li>
            </ul>
            <div id="user-info">
            	<p>Hello <span><?php echo $_SESSION['tk'];?></span> Login successful! </p>
                <p><a href="dangxuat.php">logout</a></p>
            </div>
        </div>
        <div id="banner">
        	<div id="logo"><a href="#"><img src="anh/logo.png" /></a></div>
        </div>
    </div>
    <div id="body">
       <?php
      if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
           case 'add': include_once('add.php');break;
           case 'edit': include_once('edit.php');break;
           case 'list': include_once('list.php');break;
        }
    }else{
        include_once('introduction.php');
    }
       ?>	
    
    </div>
    <div id="footer">
    	<div id="footer-info">
        	<h4>The web technology ITEC center</h4>
            <p><span>Address 1:</span> 11th floor, I Building, 227 Nguyen Van Cu - Ward 4 - District 5 - HCMC | <span>Phone</span> (+84) 902 437 7697</p>
            <p><span>Address 2:</span> 10th floor, I Building, 227 Nguyen Van Cu - Ward 4 - District 5 - HCMC | <span>Hotline</span> 0902 517 155</p>
            <p>Copyright by ITEC Education</p>
        </div>
    </div>
</div>
</body>
</html>
