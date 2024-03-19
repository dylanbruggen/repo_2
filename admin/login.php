<?php
$message = '';

$username = 'admin';
$password = 'admin123';


// Check if username and password are correct
if (isset($_POST['username'])) {
	
	if ($_POST['username'] == $username && $_POST['password'] == $password) {
		session_start();
		$_SESSION["is_logged_in"] = "yes";
		header('Location: index.php');
	}
	else {
		$message = 'Gebruikersnaam en/of wachtwoord onjuist.';
	}
	
	
	
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/logo.png">
        <title>Retrotech Admin Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>


	<center>
		<form method="POST" action="login.php" class="login-form">
			<label for="username">Username</label><br>
			<input type="text" name="username" id="username" maxlength="16"><br><br>
			<label for="password">Password</label><br>
			<input type="password" name="password" id="password" maxlength="16"><br><br>
			<input type="submit" value="Login">
		</form>
	<br>
	<?php echo $message; ?>
	</center>
	
	
    </body>
</html>