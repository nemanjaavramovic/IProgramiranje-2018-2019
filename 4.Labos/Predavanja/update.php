<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';

		// Getting data from FROM
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$passwordVarify = $_POST['passwordVarify'];

		if($password != $passwordVarify)
			$errMsg = 'Password not matched.';

		if($errMsg == '') {
			try {
		      $sql = "UPDATE pdo SET fullname = :fullname, password = :password, secretpin = :secretpin WHERE username = :username";
		      $stmt = $connect->prepare($sql);
		      $stmt->execute(array(
		        ':fullname' => $fullname,
		        ':secretpin' => $secretpin,
		        ':password' => md5($password),
		        ':username' => $_SESSION['username']
		      ));
				header('Location: update.php?action=updated');
				exit;

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'updated')
		$errMsg = 'Successfully updated. <a href="logout.php">Logout</a> and login to see update.';
?>

<html>
<head><title>Update</title></head>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div><b><?php echo $_SESSION['name'] ?></b></div>
			<div>
				<form action="" method="post">
					Fullname <br>
					<input type="text" name="fullname" value="<?php echo $_SESSION['name']; ?>" autocomplete="off" class="box"/><br /><br />
					Username <br>
					<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" disabled autocomplete="off" class="box"/><br /><br />
					Secret Pin <br>
					<input type="text" name="secretpin" value="<?php echo $_SESSION['secretpin']; ?>" autocomplete="off" class="box"/><br /><br />
					<hr>
					Password <br>
					<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br />
					Vafify Password <br>
					<input type="password" name="passwordVarify" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br />
					<input type="submit" name='update' value="Update" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
