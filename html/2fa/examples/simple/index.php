<!DOCTYPE HTML>
<?php
session_start();
if(isset($_GET['status']) && $_GET['status']=='sessionerror')
{
    $msg = '<div class="alert alert-danger">YOUR SESSION ID WAS NOT SET PROPERLY, TRY AGAIN...</div>';;
}
elseif(isset($_GET['status']) && $_GET['status']=='logout')
{
    $msg = '<div class="alert alert-success">YOU HAVE LOGGED OUT SUCCESSFULLY.</div>';
    session_destroy();
}
else {$msg = '';}

include('redisconfig.php');
global $redisserverip;
global $redisserverauth;
global $useremail;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$redis = new Redis();
$redis->connect($redisserverip);
$redis->auth($redisserverauth);
$valued = $redis->get($useremail);
if (($valued == '') or (!$valued)) {
$formmsg = "<div class='alert alert-danger'>No trusted key found for that user. Please have the administrator generate one for you.</div>";
}
else {
$mykey = $redis->get($useremail);
$formmsg = "<div class='alert alert-success'>Key found and pre-configured for this domain, so please click generate button below.</div>";
}
?>
<html>
    <head>
        <title>SECURE 2FA LOGIN</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1 class="text-center">2FA-PGP LOGIN TO SECURE DASH</h1>
		<?php echo $msg;?>
        <div class="container">
            <form class="form" action="pgp.php" method="post">
                <label for="pgp-key"><?php echo $formmsg;?></label>
                <textarea style='display:none;'rows="20" class="form-control" name="pgp-key"><?php echo $mykey;?></textarea>
                <br/>
                <button class="btn btn-primary form-control">Generate 2fa code!</button>
            </form>
        </div>
        <div style='display:none;'>
        <h6 class="text-center">This awesome theme is called <a href="//bootswatch.com/flatly">'Flatly'</a> and was made b$
        </div>
    </body>
</html>
