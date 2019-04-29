<?php
	session_start();
	require 'Dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href ="css/style.css">
</head>
<body style = "background-color: #7fBcBd">
	<div id = "main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="images/ju.png" class ="avatar">
		</center>
		<form class ="myform action ="index.php" method ="post">
			<label><b>Roll No:</b></label><br>
			<input name = username type = "text" class ="inputvalues" placeholder="Type your Roll No" required="" /><br>
			<label><b>Password:</b></label><br>
			<input name = password type = "password" class ="inputvalues" placeholder="Type your password" required="" /><br>
			<input name = login type="submit" id ="login_btn" value="Login"/><br>
			<a href="register.php"><input type="button" id ="register_btn" value="Register"/><br></a>
		</form>
		<?php
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query = " select *from student where RollNo = '$username' and password = '$password' ";
				$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run) > 0){
					$row = mysqli_fetch_assoc($query_run);
					$_SESSION['FullName'] = $row['FullName'];
					$_SESSION['RollNo'] = $row['RollNo'];
					$_SESSION['Department'] = $row['Department'];
					header('location:homepage.php');

				}else{
					echo '<script type = "text/javascript"> alert("Invalid Credentials...") </script>';
				}
			}
		?>
	</div>
</body>
</html>