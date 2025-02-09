<?php
require_once('function.php');
connectdb();
session_start();


$gatewayData = mysql_fetch_array(mysql_query("SELECT val1, val2, name FROM deposit_method WHERE id='3'"));

$depoistTrack = $_GET['invoice_id'];
$secret = $_GET['secret'];
$address = $_GET['address'];
$value = $_GET['value'];
$confirmations = $_GET['confirmations'];
$value_in_btc = $_GET['value'] / 100000000;

$trx_hash = $_GET['transaction_hash'];

$DepositData = mysql_fetch_array(mysql_query("SELECT usid, method, amount, charge, amountus, status, bcam, bcid FROM deposit_data WHERE track='".$depoistTrack."'"));


if ($DepositData[5]!=0) {

if ($DepositData[6]==$value_in_btc && $DepositData[7]==$address && $secret=="ABIR" && $confirmations>2){





//////////---------------------------------------->>>> ADD THE BALANCE 
$ct = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$DepositData[0]."'"));
$ctn = $ct[0]+$DepositData[2];
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$DepositData[0]."'");
//////////---------------------------------------->>>> ADD THE BALANCE

$trx = $txn_id;


/////////////------------------------->>>>>>>>>>> UPDATE `deposit_data`
mysql_query("UPDATE deposit_data SET trx='".$trx."', trx_ext='".$trx_hash."', status='1' WHERE track='".$depoistTrack."'");




}

}//Already Done ?


########################################################
/*
$msg = "";
foreach ($_GET as $key => $value){
$msg .= " - ".htmlspecialchars($key)." ==== ".htmlspecialchars($value)."<br>";
}

echo "$msg"; 



$to = "abirkhan75@gmail.com";
$subject = "BTC TEST DATA";
$txt = "$msg";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <i@mypaidbills.com>' . "\r\n";

$a = mail($to,$subject,$txt,$headers);
if($a){
    echo "00001";
    
}else{
    echo "00";
}

*/
?>