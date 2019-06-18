<?php
	require 'config.php';
	if($_SESSION['name'])
		header('Location: dashboard.php');
?>

<html>
<head><title>PDO MySQL</title></head>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div><span>Simple login app</span></div>
			<div>
				Welcome guest !
				<br>
				<a href="login.php">Login</a> <br>
				<a href="register.php">Register</a> <br>
				<a href="forgot.php">Forgot Password</a>
			</div>
		</div>
	</div>
</body>
</html>
