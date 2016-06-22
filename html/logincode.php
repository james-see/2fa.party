<!DOCTYPE HTML>
<?php session_start();?>
<head>
	<link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div>
		<h1 class='titler'>The CODE you need</h1>
		<p>Paste this into your site login page above the closing head...</p>
			<span><textarea class='texter' cols="42" rows="5"wrap="off" disabled="true" style="margin:15px;padding:5px;border: none;width:80%;background-color:white;color:red;font-size:14px;font-family:monospace;word-break:break-word;word-wrap: break-word;font-weight: bold;resize:none;"><?php echo "<script type='text/javascript'>https://2fa.party/2fa.js</script>" ;?></textarea></span>
		<p>...and add this to the bottom of your form by your submit button.</p>
			<textarea disabled="true" style="border: none;margin:15px;padding:5px;width:80%;background-color:white;color:red;font-size:14px;font-family:monospace;font-weight:bold;word-break: break-word;word-wrap: break-word;"><?php echo "<div class='2fajs-input'></div>" ;?></textarea>
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