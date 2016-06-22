<?php

session_start();

include('pgp-2fa.php');
include('redisconfig.php');
$pgp = new pgp_2fa();



$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($_POST['pgp-key'])){

    if($pgp->compare($_POST['user-input'])){
        $msg = '<div class="alert alert-success">Success!</div>';
        $_SESSION['validuserkey'] = $_POST['user-input']; // set validuserkey
        global $redisserverip;
		global $redisserverauth;
		global $useremail;
		$redis = $redis = new Redis();
		$redis->connect($redisserverip);
		$redis->auth($redisserverauth);
		$mykey = $redis->get($useremail);
		$_SESSION['userpubkey'] = $mykey;
        header('location: secure-dashboard.php');

    }else{
        $msg = '<div class="alert alert-danger">Fail!</div>';
    }


} else {
	global $redisserverip;
	global $redisserverauth;
	$redis = $redis = new Redis();
$redis->connect($redisserverip);
$redis->auth($redisserverauth);

    $pgp->generateSecret();
    $pgpmessage = $pgp->encryptSecret($_POST['pgp-key']);
}



?>
<!DOCTYPE>
<html>
    <head>
        <title>2FA-PGP</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1 class="text-center">2FA-PGP</h1>
        <?php echo $msg ?>
        <div class="container">
            <label for="pgp-key">Encrypted Code (decrypt using your private key):</label>
            <textarea rows="15" class="form-control" name="pgp-msg"><?php echo $pgpmessage ?></textarea>
            <form class="form" action="pgp.php" method="post">

                <label for="user-input">Decrypted Code (paste result of decrypting message above here):</label>
                <input type="text" name="user-input" class="form-control">
                <br/>
                <button class="btn btn-primary form-control">Check!</button>
            </form>
        </div>
        <div style='display:none;'>
        <h6 class="text-center">This awesome theme is called <a href="//bootswatch.com/flatly">'Flatly'</a> and was made by <a href="//bootswatch.com/">Bootswatch.com</a>!</h6>
        </div>
    </body>
</html>