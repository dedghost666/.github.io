<?php
$baseurl = "http://abir.khan/ccupdate/letsbid";
$sender = "no-reply@letsbid.co";

error_reporting(E_ALL);

$dbname = "cc_letsbid";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$basecurrency = "USD";


function connectdb()
{
    global $dbname, $dbuser, $dbhost, $dbpass;
    $conms = @mysql_connect($dbhost,$dbuser,$dbpass); //connect mysql
    if(!$conms) return false;
    $condb = @mysql_select_db($dbname);
    if(!$condb) return false;
    return true;
}


function is_user()
{
	if (isset($_SESSION['username']))
		return true;
}

function redirect($url)
{
echo "<meta http-equiv=\"refresh\" content=\"0; url=$url\" />";
//header('Location: ' .$url);
exit;
}

function valid_username($str){
	return preg_match('/^[a-z0-9_-]{3,16}$/', $str);
}

function valid_password($str){
	return preg_match('/^[a-z0-9_-]{6,18}$/', $str);
}


//////////////////GENERATE TRX #
$a1 = date("ymd", time());
$a2 = rand(100,999);
$u = substr(uniqid(), 7);
$c = chr(rand(97,122));
$c2 = chr(rand(97,122));
$c3 = chr(rand(97,122));
$ok = "$c$u$c2$a2$c3";
$txn_id = strtoupper($ok);
//////////////////GENERATE TRX #


function toBTC($usd){
$api = "https://blockchain.info/tobtc?currency=USD&value=$usd";
$BTC = file_get_contents($api);
return $BTC;
}

function toScan($usd, $account){
$var = "bitcoin:$account?amount=$usd";
echo "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
}

?>