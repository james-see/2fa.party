<?php

session_start();
	if (!isset($_SESSION['userpubkey']) && !isset($_SESSION['validuserkey'])) {

    header('location: index.php?status=sessionerror');
	}
else {
	$msg = "<div class='alert alert-success'>Success! You have now securely logged into the dashboard and set your session variables properly.</div>";
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>2FA-PGP SECURE DASH</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1 class="text-center">SECURE DASHBOARD!</h1>
        <?php echo $msg ?>
        <div class="container">
		<table class='table table-bordered'>
			<tr><td>super secret 1</td><td>super secret 2</td></tr>
		</table>
        </div>
        <div style='display:none;'>
        <h6 class="text-center">This awesome theme is called <a href="//bootswatch.com/flatly">'Flatly'</a> and was made by <a href="//bootswatch.com/">Bootswatch.com</a>!</h6>
        </div>
        <h6 class="text-center"><a href='index.php?status=logout'>Log out</a></h6>
    </body>
</html>