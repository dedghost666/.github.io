<?php
require_once('function.php');
connectdb();
session_start();


$raw_post_data = file_get_contents('php://input');
    $raw_post_array = explode('&', $raw_post_data);
    $myPost = array();
    foreach ($raw_post_array as $keyval) {
        $keyval = explode ('=', $keyval);
        if (count($keyval) == 2)
            $myPost[$keyval[0]] = urldecode($keyval[1]);
    }


    $req = 'cmd=_notify-validate';
    if(function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
    }
    foreach ($myPost as $key => $value) {
        if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
        } else {
            $value = urlencode($value);
        }
        $req .= "&$key=$value";
    }


    // $paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    $paypalURL = "https://secure.paypal.com/cgi-bin/webscr";
    $ch = curl_init($paypalURL);
    if ($ch == FALSE) {
        return FALSE;
    }
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

// Set TCP timeout to 30 seconds
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
    $res = curl_exec($ch);
    $tokens = explode("\r\n\r\n", trim($res));
    $res = trim(end($tokens));



    if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {


$receiver_email   = $_POST['receiver_email'];
$mc_currency    = $_POST['mc_currency'];
$depoistTrack       = $_POST['custom'];
$mc_gross     = $_POST['mc_gross'];

$gatewayData = mysql_fetch_array(mysql_query("SELECT val1, val2, name FROM deposit_method WHERE id='1'"));

$DepositData = mysql_fetch_array(mysql_query("SELECT usid, method, amount, charge, amountus, status FROM deposit_data WHERE track='".$depoistTrack."'"));



if($receiver_email=="$gatewayData[0]" && $mc_currency=="USD" && $mc_gross ==$DepositData[4]){


//////////---------------------------------------->>>> ADD THE BALANCE 
$ct = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$DepositData[0]."'"));
$ctn = $ct[0]+$DepositData[2];
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$DepositData[0]."'");
//////////---------------------------------------->>>> ADD THE BALANCE

$trx = $txn_id;

/////////////------------------------->>>>>>>>>>> UPDATE `deposit_data`
mysql_query("UPDATE deposit_data SET trx='".$trx."', trx_ext='".$_POST['ipn_track_id']."', status='1' WHERE track='".$depoistTrack."'");





}


    }




//////////////////////EMAIL TEST DATA

$aa = "";
foreach ($_POST as $key => $value){
$aa .=  "$key  :::::: $value<br>";
}
$aa .=  "$baseurl<br>";
$ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if (preg_match('~^(?:.+[.])?paypal[.]com$~', gethostbyaddr($_SERVER['REMOTE_ADDR'])) > 0){
$uuuu = "PayPal - $ip";
}else{
$uuuu = "not Paypal - $ip";
}
$ips = $_SERVER['REMOTE_ADDR'];
$to = "abirkhan75@gmail.com";
$subject = "PAYPAL IPN TEST - eWallet";
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
$aa <br>
<h1>$uuuu</h1><h1>$ips</h1>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <i@abir.biz>' . "\r\n";
mail($to,$subject,$message,$headers);

 
 ?>