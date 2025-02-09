<?php
include ('include/header.php');
?>

  
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">
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



<?php 
if ($_POST) {
$method = $_POST["id"];
$amount =  round($_POST["amount"], 2);

$data = mysql_fetch_array(mysql_query("SELECT name, minamo, maxamo, charged, chargep, rate, status FROM deposit_method WHERE id='".$method."'"));

$err1 = $amount<=0 ? 1:0;
$err2 = $data[6]!=1 ? 1:0; // Status OFF
$err3 = $amount<$data[1]?1:0;
$err4 = $amount>$data[2]?1:0;


$error = $err1+$err2+$err3+$err4;
if ($error == 0){

$per = $amount*$data[4]/100;
$charge =  round($per+$data[3] , 2);
$gt =  round($amount+$charge , 2);
$inUS = round($gt/$data[5] , 2);


$un = uniqid();
$ra = rand(10000,99999);
$dtrx = md5(time().$un.$ra);

?>






<div class="table-scrollable">
<table class="table table-bordered table-hover">
<tbody>


<tr>
<td><strong style="font-size: 1.5em;" class="pull-right">Method</strong> </td>
<td> <strong style="font-size: 1.5em;"><?php echo "$data[0]"; ?></strong></td>
</tr>



<tr class="">
<td><strong style="font-size: 1.5em;" class="pull-right">Amount</strong> </td>
<td> <strong style="font-size: 1.5em;"><?php echo "$amount $basecurrency"; ?></strong></td>
</tr>

<tr class="">
<td><strong style="font-size: 1.5em;" class="pull-right">Charge</strong> </td>
<td> <strong style="font-size: 1.5em;"><?php echo "$charge $basecurrency"; ?></strong></td>
</tr>


<tr class="info">
<td><strong style="font-size: 1.5em;" class="pull-right">TOTAL</strong> </td>
<td> <strong style="font-size: 1.5em;"><?php echo "$gt $basecurrency"; ?></strong></td>
</tr>





</tbody>
</table>
</div>





<div class="row"><br><br>

<?php 
$res = mysql_query("INSERT INTO deposit_data SET usid='".$uid."', tm='".time()."', method='".$method."', track='".$dtrx."', amount='".$amount."', charge='".$charge."', amountus='".$inUS."'");
if ($res) {
$_SESSION['depoistTrack'] = $dtrx;
?>
<div class="col-md-6">
<a href="<?php echo $baseurl;?>/AddMoney" class="btn btn-danger btn-lg btn-block"> CANCEL </a>
</div>

<div class="col-md-6">
<a href="<?php echo $baseurl;?>/DepositNow" class="btn btn-success btn-lg btn-block"> DEPOSIT NOW</a>
</div>

<?php
}else{
echo "<div class=\"alert alert-danger alert-dismissable uppercase\">
<b>SOME PROBLEM OCCURE, PLEASE RELOAD THE PAGE !</b>
</div>";
}


 ?>








</div>




<?php
}else{
  
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<b>AMOUNT MUST BE A POSITIVE NUMBER!</b>
</div>";
}   
  
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<b>DEPOSIT  METHOD IS NOT AVAILABLE AT THIS TIME</b>
</div>";
}   

if ($err3 == 1 || $err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable uppercase\">
<b>You Can Only Deposit Between $data[1] - $data[2]  $basecurrency </b>
</div>";
}   

echo '
<div class="row"><br>
<br>
<div class="col-md-6">
<a href="'.$baseurl.'/AddMoney" class="btn blue btn-lg btn-block"> ADD MONEY </a>
</div>

<div class="col-md-6">
<a href="'.$baseurl.'/Dashboard" class="btn btn-success btn-lg btn-block"> DASHBOARD </a>
</div>
</div>
';

}
}
?>




</div>
</div>




<?php
 include ('include/footer.php');
 ?>

<script src="js/jquery.datatables.min.js"></script>
<script src="js/select2.min.js"></script>

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


