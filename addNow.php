<?php
include ('include/header.php');
?>

  
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">


<style>
.credit-card-box .form-control.error {
    border-color: red;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
}
.credit-card-box label.error {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
</style>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>

    <div class="pageheader">
      <h2><i class="fa fa-desktop"></i> DEPOSIT PREVIEW </h2> 
    </div>


    
    <div class="contentpanel">
  
  


  <div class="row">





<div class="portlet-body">


<?php 
$depoistTrack = $_SESSION['depoistTrack'];
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM deposit_data WHERE track='".$depoistTrack."'"));

$data = mysql_fetch_array(mysql_query("SELECT usid, method, amount, charge, amountus, status FROM deposit_data WHERE track='".$depoistTrack."'"));

if($count[0]!=1 || $data[0]!=$uid || $data[5]!=0){
echo "<div class=\"alert alert-danger alert-dismissable uppercase\">
<b>SOME PROBLEM OCCURE, PLEASE TRY AGAIN !</b>
</div>";
}else{


$gatewayData =  mysql_fetch_array(mysql_query("SELECT val1, val2, name FROM deposit_method WHERE id='".$data[1]."'"));

if ($data[1]==1) {
/////PAYPAL
?>
<form action="https://secure.paypal.com/cgi-bin/webscr" method="post" id="myform">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="<?php echo $gatewayData[0]; ?>" />
<input type="hidden" name="cbt" value="<?php echo $ttl[0]; ?>" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="item_name" value="Add Money To <?php echo $ttl[0]; ?> Account" />
<input type="hidden" name="custom" value="<?php echo $depoistTrack; ?>" />
<input type="hidden" name="amount"  value="<?php echo $data[4]; ?>" />
<input type="hidden" name="return" value="<?php echo $baseurl; ?>"/>
<input type="hidden" name="cancel_return" value="<?php echo $baseurl; ?>" />
<input type="hidden" name="notify_url" value="<?php echo $baseurl; ?>/ipn_paypal.php" />
</form>
<?php
}

if ($data[1]==2) {
/////PERFECT MONEY
?>
<form action="https://perfectmoney.is/api/step1.asp" method="POST" id="myform">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $gatewayData[0]; ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $ttl[0]; ?>">
<input type='hidden' name='PAYMENT_ID' value='<?php echo $depoistTrack; ?>'>
<input type="hidden" name="PAYMENT_AMOUNT"  value="<?php echo $data[4]; ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $baseurl; ?>/ipn_pm.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $baseurl; ?>">
<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $baseurl; ?>">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
<input type="hidden" name="SUGGESTED_MEMO" value="<?php echo "$ttl[0] - $user"; ?>">
<input type="hidden" name="BAGGAGE_FIELDS" value="IDENT"><br>
</form>
<?php
}


if ($data[1]==3) {
/////BITCOIN


$stat = mysql_fetch_array(mysql_query("SELECT bcam FROM deposit_data WHERE track='".$depoistTrack."'"));
if($stat[0]==0){

$blockchain_root = "https://blockchain.info/";
$blockchain_receive_root = "https://api.blockchain.info/";
$mysite_root = "$baseurl";
$secret = "ABIR";
$my_xpub = "$gatewayData[1]";
$my_api_key = "$gatewayData[0]";

$invoice_id = $depoistTrack;
$callback_url = $mysite_root . "ipn_btc.php?invoice_id=" . $invoice_id . "&secret=" . $secret;

$resp = file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);
$response = json_decode($resp);

$sendto = $response->address;

// $sendto = "1HoPiJqnHoqwM8NthJu86hhADR5oWN8qG7";
$bcamo = toBTC($data[4]);
mysql_query("UPDATE deposit_data SET bcam='".$bcamo."', bcid='".$sendto."' WHERE track='".$depoistTrack."'");
}/////UPDATE THE SEND TO ID

$paynow = mysql_fetch_array(mysql_query("SELECT bcam, bcid FROM deposit_data WHERE track='".$depoistTrack."'"));
?>
<h4 style="text-align: center; text-transform: uppercase;"> SEND EXACTLY <strong><?php echo $paynow[0]; ?> BTC</strong> TO <strong><?php echo $paynow[1]; ?></strong><br>
<?php toScan($paynow[0], $paynow[1] ); ?> <br>
<strong>SCAN TO SEND</strong> <br><br>
<strong style="color: red;">NB: 3 Confirmation required to Credited your Account</strong>
</h4>
<?php
}



if ($data[1]==4) {
/////STRIPE
if ($_POST) {

$cc = trim($_POST['cardNumber']);
$exp = $pieces = explode("/", $_POST['cardExpiry']);
$cvc = $_POST['cardCVC'];

$emo = trim($exp[0]);
$eyr = trim($exp[1]);

$cnts = $data[4]*100;


require_once('stripe-php/init.php');
\Stripe\Stripe::setApiKey($gatewayData[0]);

try{
$token = \Stripe\Token::create(array(
  "card" => array(
    "number" => "$cc",
    "exp_month" => $emo,
    "exp_year" => $eyr,
    "cvc" => "$cvc"
  )
));

try{
$charge = \Stripe\Charge::create(array(
'card' => $token['id'],
'currency' => 'USD',
'amount' => $cnts,
'description' => 'item',
  ));

if ($charge['status'] == 'succeeded') {


echo "<div class=\"alert alert-success alert-dismissable\">
<b>Your Card Successfully Charged For $data[4] USD</b>
</div>";

$DepositData = mysql_fetch_array(mysql_query("SELECT usid, method, amount, charge, amountus, status FROM deposit_data WHERE track='".$depoistTrack."'"));




//////////---------------------------------------->>>> ADD THE BALANCE 
$ct = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$DepositData[0]."'"));
$ctn = $ct[0]+$DepositData[2];
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$DepositData[0]."'");
//////////---------------------------------------->>>> ADD THE BALANCE

$trx = $txn_id;

/////////////------------------------->>>>>>>>>>> UPDATE `deposit_data`
mysql_query("UPDATE deposit_data SET trx='".$trx."', trx_ext='".$charge['balance_transaction']."', status='1' WHERE track='".$depoistTrack."'");

echo "<div class=\"alert alert-success alert-dismissable\">
<b>Your Deposit of $DepositData[2] $basecurrency via $gatewayData[2] Has Been Processed</b>
</div>";


}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<b> Problem With Your Card Information</b>
</div>";
}


}catch (Exception $e){
echo "<div class=\"alert alert-danger alert-dismissable\">
<b> ".$e->getMessage()." </b>
</div>";
}

}catch (Exception $e){
echo "<div class=\"alert alert-danger alert-dismissable\">
<b> ".$e->getMessage()." </b>
</div>";
}
}
?>





<div class="row">
<div class="col-xs-12 col-md-6 col-md-offset-3">


<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box">
<div class="panel-body">
<form role="form" id="payment-form" method="POST" action="">
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="cardNumber">CARD NUMBER</label>
<div class="input-group">
<input 
type="tel"
class="form-control input-lg"
name="cardNumber"
placeholder="Valid Card Number"
autocomplete="off"
required autofocus 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
</div>
</div>                            
</div>
</div>
<br>

<div class="row">
<div class="col-xs-7 col-md-7">
<div class="form-group">
<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
<input 
type="tel" 
class="form-control input-lg" 
name="cardExpiry"
placeholder="MM / YYYY"
autocomplete="off"
required 
/>
</div>
</div>
<div class="col-xs-5 col-md-5 pull-right">
<div class="form-group">
<label for="cardCVC">CV CODE</label>
<input 
type="tel" 
class="form-control input-lg"
name="cardCVC"
placeholder="CVC"
autocomplete="off"
required
/>
</div>
</div>
</div>

<br>

<div class="row">
<div class="col-xs-12">
<button class="btn btn-success btn-lg btn-block" type="submit"> PAY NOW </button>
</div>
</div>

</form>
</div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->


</div>            

</div>


<?php
}









}//EXECUTE
?>

</div>
</div>



<?php
 include ('include/footer.php');
 ?>

<script src="js/jquery.datatables.min.js"></script>
<script src="js/select2.min.js"></script>


<script>
document.getElementById("myform").submit();
</script>

<script>
  jQuery(document).ready(function() {
    
    "use strict";
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Select2
    jQuery('select').select2({
        minimumResultsForSearch: -1
    });
    
    jQuery('select').removeClass('form-control');
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>
 <script>
    // Spinner
  var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);
  </script>




</body>
</html>
