<?php
	require 'config.php';

	if(isset($_POST['removeuser'])) {
		$errMsg = '';
		// Get username from FORM
		$usernameid = $_POST['usernameid'];

		if($usernameid == '')
			$errMsg = 'Enter username/ id to remove';

		if($errMsg == '') {
			try{
				$stmt = $connect->prepare('DELETE FROM pdo WHERE id = :id OR username = :username LIMIT 1');
				$stmt->execute(array(
					':id' => $usernameid,
					':username' => $usernameid
					));

				$errMsg = 'User ' . $usernameid . ' successfully removed.';

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Remove User</title></head>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo '<div>'.$errMsg.'</div>';
				}
			?>
			<div><b>Remove User</b></div>
			<div>
				<form action="" method="post">
				Enter Username / ID <br>
					<input type="text" name="usernameid" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='removeuser' value="Remove" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
