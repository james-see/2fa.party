<!DOCTYPE HTML>
<?php session_start();?>
<head>
	<link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
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
		<h1 class='titler'>2 factor authentication for everyone.</h1>
		<p>Why did you forget about Dre?</p>
		<p>It is simple. Create an account. Add the code snippet to your login screen on your web app / website -- whatever. Add 2fa.party to your home screen on your phone and open it up when needed to generate a code. Copy the code to your login on your site and login securely.
		</p>
		<p>
			Optional super secret squirrel feature: Add your public key and encrypt the generated 15 digit code to yourself so that only you can decrypt it with your private key on a trusted device of your choosing. That way, even if your 2fa.party account is compromised, no one will be able to generate a code as you.
		</p>
		<p>
			Technological feats made by this site? Written in plain php and html. Redis & gnupg for php do all the heavy lifting.
		</p>
		<p>
			Yes, an API is in the works.
		</p>
		<p>
			Not made with love. Made out of desperation for something better and a fair bit of ego and coffee. For now this service will remain <em>completely free</em> for all to use. No strings attached. No email newsletters. No freemium model.
		</p>
		<p>
			The author to blame is the guy who lives at <a href='https://jamescampbell.us'>https://jamescampbell.us</a>.
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