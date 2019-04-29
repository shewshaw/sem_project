<?php
	require 'Dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" href ="css/style.css">
</head>
<body style = "background-color: #7fBcBd">
	<div id = "main-wrapper">
		<center>
			<h2>Register Form</h2>
			<img src="images/ju.png" class ="avatar">
		</center>
		<form class ="myform" action ="register.php" method ="post">
			<label><b>Full Name:</b></label><br>
			<input name = "FullName" type = "text" class ="inputvalues" placeholder="Type your Full Name" required="" /><br>
			<label><b>Roll No:</b></label><br>
			<input name = "username" type = "text" class ="inputvalues" placeholder="Type your Roll No" required="" /><br>
			<label><b>Department:</b></label>
			<select class="Department" name="Department">
				<option value="CSE">CSE</option>
				<option value="ETCE">ETCE</option>
				<option value="IT">IT</option>
				<option value="MECH">MECH</option>
				<option value="CIVIL">CIVIL</option>
				<option value="EE">EE</option>
			</select><br>
			<label><b>Password:</b></label><br>
			<input name = "password" type = "password" class ="inputvalues" placeholder="Type your password" required="" /><br>
			<label><b>Confirm Password:</b></label><br>
			<input name = "cpassword" type = "password" class ="inputvalues" placeholder="Confirm Password" required="" /><br>
			<input name = "submit_btn" type="submit" id ="signup_btn" value="Sign Up"/><br>
			<a href = "index.php"><input type="button" id ="back_btn" value="Back"/><br></a>
		</form>

		<?php
			if(isset($_POST['submit_btn'])){
				//echo '<script type = "text/javascript"> alert("Sign up button clicked") </script>';
				$FullName = $_POST['FullName'];
				$username = $_POST['username'];
				$Department = $_POST['Department'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];

				if($password == $cpassword){
					$query = "select * from student where RollNo = '$username' ";
					$query_run = mysqli_query($con,$query);
					if(mysqli_num_rows($query_run) > 0){
						echo '<script type = "text/javascript"> alert("Student already registered.... Go to login page..") </script>';
					}else{
						$query = "insert into student values('$FullName','$username','$Department','$password')";
						$query_run = mysqli_query($con,$query);
						if($query_run){
							echo '<script type = "text/javascript"> alert("User registered..... Go to login Page...") </script>';
						}else{
							echo '<script type = "text/javascript"> alert("Error!!!") </script>';
						}
					}

				}else{
					echo '<script type = "text/javascript"> alert("Password and Confirm password does not match...") </script>';
				}
			}
		?>
	</div>
</body>
</html>