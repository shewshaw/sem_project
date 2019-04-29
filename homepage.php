<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href ="css/style.css">
</head>
<body style = "background-color: #7fBcBd">
	<div id = "main-wrapper">
		<center>
			<h2>Student Portal</h2>
			<img src="images/ju.png" class ="avatar">
			<h3>Welcome :
				<?php echo $_SESSION['FullName']; ?>
			</h3>
			<h3>Roll No :
				<?php echo $_SESSION['RollNo']; ?>
			</h3>
			<h3>Department :
				<?php echo $_SESSION['Department']; ?>
			</h3>
		</center>
		<form class ="myform action ="homepage.php" method ="post">
			<input name = "logout" type="submit" id ="logout_btn" value="Log Out"/><br>
		</form>
		<?php
			if(isset($_POST['logout'])){
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
</body>
</html>