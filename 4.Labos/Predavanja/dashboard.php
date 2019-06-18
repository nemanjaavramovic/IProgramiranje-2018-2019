<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<html>
<head><title>Dashboard</title></head>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div>
				<h4>Welcome <?php echo $_SESSION['name']; ?></h4>
				<a href="update.php">Update</a> <br>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</div>
</body>
</html>
