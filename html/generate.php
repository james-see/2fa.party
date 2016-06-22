<!DOCTYPE HTML>
<?php session_start();?>
<head>
	<link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div>
		<h1 class='titler'>Your key!</h1>
<?php include('2fa/pgp-2fa.php');
$pgp = new pgp_2fa();
$pgp->generateSecret();
echo "<p>your key generated is: <br><br><br><b>".$_SESSION['insecure_code']."</b><br><br><br> copy it and paste it into your login form!</p><p>make sure to keep it safe, as it is not hashed or encrypted at the moment.</p>";
echo "<p>You may want to <a href='settings.php'/>setup your pgp public key</a> to secure this key against intruders and ensure your no one can break in.";
?>
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