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
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="icon" href="assets/img/2fa.ico" />
	 <link rel="stylesheet" type="text/css" href="assets/css/font.css">
	<link rel="apple-touch-icon" href="assets/img/apple-touch-icon-precomposed.png" />
	<link rel="apple-touch-startup-image" href="assets/img/aaple-touch-startup-image.png" />
	<meta name="apple-mobile-web-app-title" content="2FA Party"> <!-- iOS -->
	<meta name="application-name" content="2FA Party"> <!-- android -->
	<LINK REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
	<script type="text/javascript">
		(function(document,navigator,standalone) {
			// prevents links from apps from oppening in mobile safari
			// this javascript must be the first script in your <head>
			if ((standalone in navigator) && navigator[standalone]) {
				var curnode, location=document.location, stop=/^(a|html)$/i;
				document.addEventListener('click', function(e) {
					curnode=e.target;
					while (!(stop).test(curnode.nodeName)) {
						curnode=curnode.parentNode;
					}
					// Condidions to do this only on links to your own app
					// if you want all links, use if('href' in curnode) instead.
					if(
						'href' in curnode && // is a link
						(chref=curnode.href).replace(location.href,'').indexOf('#') && // is not an anchor
						(	!(/^[a-z\+\.\-]+:/i).test(chref) ||                       // either does not have a proper scheme (relative links)
							chref.indexOf(location.protocol+'//'+location.host)===0 ) // or is in the same protocol and domain
					) {
						e.preventDefault();
						location.href = curnode.href;
					}
				},false);
			}
		})(document,window.navigator,'standalone');
	</script>
</head>
<body>
	<div>
		<h1 class='titler'>Welcome to 2fa.party</h1>
		<!-- login form box -->
		<form method="post" action="index.php" name="loginform">
<ul>
	<li>
		    <label for="login_input_username">Username</label><br>
		    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
	</li>
	<li>
		    <label for="login_input_password">Password</label><br>
		    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
	</li>

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