<?php
	session_start();
	include_once('ketnoi.php');

	$error = NULL;
	if(isset($_POST['submit'])){
		if($_POST['username']==""){
			$error = "Enter username and password";
		}else{
			$username = $_POST['username'];
		}

		if($_POST['password']==""){
			$error = "Enter username and password";
		}else{
			$password = $_POST['password'];
		}

		if(isset($username) && isset($password)){
			$sql = "SELECT * FROM thanhvien WHERE user_name='$username' AND pass_word = '$password'";
			$query = mysql_query($sql);
			$rows = mysql_num_rows($query);
			if($rows<=0){
				$error = 'Username and password are incorrect!';
			}else{
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('location:quantri.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8" />
	<title>ITEC Mobile Shop - Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
	<?php
		if(!isset($_SESSION['tk'])){


	?>
	<form method="post">
	<div id="form-login">
		<h2>Login successful!</h2>
		<center><span style="color:red;"><?php echo $error;?></span></center>
	    <ul>
	        <li><label>username</label><input type="text" name="un" /></li>
	        <li><label>password</label><input type="password" name="pw" /></li>
	        <li><label>memorize</label><input type="checkbox" name="check" checked="checked" /></li>
	        <li><input type="submit" name="submit" value="Login" /> <input type="reset" name="reset" value="Reset" /></li>
	    </ul>
	</div>
	</form>
	<?php
}else{
	header('location:adminitration.php');
}

	?>
</body>
</html>
