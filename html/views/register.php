<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<!DOCTYPE HTML>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/2fa.ico" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
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
		
<!-- register form -->
<form class='registerform'method="post" action="register.php" name="registerform">
<ul>
	<li>
    <!-- the user name input field uses a HTML5 pattern check -->
    <label for="login_input_username">Username</label><br>
    <input placeholder="only letters and numbers" id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
	</li>
	<li>
    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">Email</label><br>
    <input placeholder="pleasenot@gmail.com" id="login_input_email" class="login_input" type="email" name="user_email" required />
	</li>
	<li>
    <label for="login_input_password_new">Password</label><br>
    <input id="login_input_password_new" placeholder="minimum 6 chars" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
	</li>
	<li>
    <label for="login_input_password_repeat">Repeat password</label><br>
    <input id="login_input_password_repeat" placeholder="minimum 6 chars" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
	</li>
</ul>
    <input class='registersubmit' type="submit"  name="register" value="Register" />
<div class="g-recaptcha" data-sitekey="6LdDoiITAAAAAJbO7C5DT0gfj28N3FAw3BGO4-lO"></div>
</form>
	</div>
	<div>
	<a class='center' href="index.php">Back to Login Page</a>
	<a class='center' href="about.php">About</a>
	<?php if (ISSET($_SESSION['user_login_status'])) {
		echo "<a class='center blue' href='settings.php'>Settings</a>";
		echo "<a class='serious' href='index.php?logout'>Logout</a>";
		}
		else {
			echo "<a class='center blue' href='register.php'>Register new account</a>";
			}?>
</div>
<!-- backlink -->
</body>
