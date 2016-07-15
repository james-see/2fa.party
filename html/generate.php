<!DOCTYPE HTML>
<?php session_start();?>
<head>
	<link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/font.css">
	<link rel="icon" href="assets/img/2fa.ico" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-icon" href="assets/img/apple-touch-icon-precomposed.png" />
	<link rel="apple-touch-startup-image" href="assets/img/aaple-touch-startup-image.png" />
	<meta name="apple-mobile-web-app-title" content="2FA Party"> <!-- iOS -->
	<meta name="application-name" content="2FA Party"> <!-- android -->
	<meta name="format-detection" content="telephone=no">
	<LINK REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
	<script>
		  function copyToClipboard(text) {
		    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
		  }
	</script>
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
		<h1 class='titler'>Your key!</h1>
<?php include('2fa/pgp-2fa.php');
$pgp = new pgp_2fa();
$pgp->generateSecret();
echo "<div id='hideMe'><span id='ider'>".$_SESSION['insecure_code']."</span>"; ?>
<span><a id="copier" onclick="copyToClipboard(document.getElementById('ider').innerHTML)"><img id='copierimg' src='assets/img/clipboard.png'/></a></span><?php echo"</div><div id='genAgain'><a href='generate.php'>generate again...</a></div>";?>
<table class="fader2" cellpadding="10" cellspacing="2">
<tr>
<td id='td10'>10</td>
<td id='td9'>9</td>
<td id='td8'>8</td>
<td id='td7'>7</td>
<td id='td6'>6</td>
<td id='td5'>5</td>
<td id='td4'>4</td>
<td id='td3'>3</td>
<td id='td2'>2</td>
<td id='td1'>1</td>
</tr>
</table><?php echo "
<p>Make sure to keep it safe, as it is not hashed or encrypted at the moment.</p>
<p>Don't have our js in your login form yet? <a href='logincode.php'>copy the code</a></p>";
echo "<p>You may want to <a href='settings.php'/>set up your pgp public key</a> to secure this key against intruders.";
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