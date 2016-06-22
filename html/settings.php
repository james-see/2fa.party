<!DOCTYPE HTML>
<?php session_start();?>
<head>
	<link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div>
		<h1>Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.</h1>
		<p>Features are not fully working yet, but imagine magical things here. ;)</p>
		<p>
			<ul>
				<li>
					current email: <input class='login_input' type="text" placeholder='<?php echo $_SESSION['user_email'];?>'/>
				</li>
			</ul>
		</p>
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