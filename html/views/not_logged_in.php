<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<!DOCTYPE HTML>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<LINK REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
</head>
<body>
	<div>
		<h1 class='titler'>Welcome to 2fa.party</h1>
		<!-- login form box -->
		<form method="post" action="index.php" name="loginform">

		    <label for="login_input_username">Username</label>
		    <input id="login_input_username" class="login_input" type="text" name="user_name" required />

		    <label for="login_input_password">Password</label>
		    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

		    <input type="submit"  name="login" value="Log in" />

		</form>
	</div>
<div>
	<a class='center' href="index.php">Home</a>
	<a class='center' href="about.php">About</a>
	<?php if (ISSET($_SESSION['user_login_status'])) {
		echo "<a class='center blue' href='settings.php'>Settings</a>";
		echo "<a class='serious' href='index.php?logout'>Logout</a>";
		}
		else {
			echo "<a class='center blue' href='register.php'>Register new account</a>";
			}?>
</div>
</body>