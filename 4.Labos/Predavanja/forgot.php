<?php
	require 'config.php';

	if(isset($_POST['forgotpass'])) {
		$errMsg = '';

		// Getting data from FROM
		$secretpin = $_POST['secretpin'];

		if(empty($secretpin))
			$errMsg = 'Please enter your secret pin to view your password.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT password, secretpin FROM pdo WHERE secretpin = :secretpin');
				$stmt->execute(array(
					':secretpin' => $secretpin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($secretpin == $data['secretpin']) {
					$data['password'] = '123123';
					$viewpass = 'Your password is reseted: ' . $data['password'] . '<br><a href="login.php">Login Now</a>';

					$sql = "UPDATE pdo SET password = :password";
		      		$stmt = $connect->prepare($sql);
					$stmt->execute(array(
						':password' => md5($data['password'])
					));
				}
				else {
					$errMsg = 'Sercet pin not matched.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Forgot Password</title></head>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div><b>Forgot Password</b></div>
			<?php
				if(isset($viewpass)){
					echo '<div>'.$viewpass.'</div>';
				}
			?>
			<div>
				<form action="" method="post">
					<input type="text" name="secretpin" placeholder="Secret Pin" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='forgotpass' value="Check" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
