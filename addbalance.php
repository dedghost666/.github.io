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
      <h2><i class="fa fa-dollar"></i> Add Balance</h2> 
    </div>


    
    <div class="contentpanel">
	
	


  <div class="row">




<?php

////COL SIZE

$countActive = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM deposit_method WHERE status='1'"));

if ($countActive[0]==1) {
  $col= "6 col-md-offset-3";
}elseif ($countActive[0]==2) {
  $col= "6";
}elseif ($countActive[0]==3) {
  $col= "4";
}elseif ($countActive[0]==4) {
  $col= "3";
}elseif ($countActive[0]==0) {

echo '<br><br><br><h1 class="text-center" style="font-weight: bold;">NO DEPOSIT  METHOD IS NOT AVAILABLE AT THIS TIME!</h1><br><br><br>';

}else{
$col= "4";
}


////COL SIZE

$ddaa = mysql_query("SELECT id, name, minamo, maxamo FROM deposit_method WHERE status='1' ORDER BY id");
while ($data = mysql_fetch_array($ddaa)) {
?>

<div class="col-md-<?php echo $col; ?>">



<img src="<?php echo $baseurl; ?>/assets/images/deposit-method/method<?php echo $data[0]; ?>.jpg" class="img-responsive" style="width:100%;" alt="Pic"> 

<br>

<?php
echo "
<button type=\"button\" class=\"btn btn-success btn-block bold deposit_button\" 
data-toggle=\"modal\" data-target=\"#DepositModal\"
data-max=\"$data[3]\"
data-min=\"$data[2]\"
data-name=\"$data[1]\"
data-id=\"$data[0]\">
<i class=\"fa fa-money\"></i> DEPOSIT NOW
</button> 

";
?>

</div>


<?php 
}
?>


</div><!-- row -->






<!-- Modal for DEPOSIT button -->
<div class="modal fade" id="DepositModal" tabindex="-1" role="basic" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">ADD MONEY VIA <b class="abir_name">-</b></h4>
</div>

<form method="post" action="<?php echo $baseurl; ?>/DepositPreview">


<div class="modal-body"> 

<input class="form-control abir_id" type="hidden" name="id">

<div class="row">
<div class="form-group">
<label class="col-md-12"><strong style="text-transform: uppercase;">DEPOSIT AMOUNT</strong>
<span class="abir_limits"></span>
</label>
<div class="col-md-12">
<div class="input-group mb15">
<input class="form-control input-lg" name="amount" type="text" autocomplete="off">
<span class="input-group-addon"><?php echo $basecurrency; ?></span>
</div>
</div>
</div>
</div>

</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">PREVIEW</button>
</div>

</form>

</div>
</div>
</div>
<!-- /.modal -->


	
	
	
	
	 <div class="panel panel-default" style="margin-top: 40px;">

        <div class="panel-body">
		
		 <div class="clearfix mb30"></div>
		 
				
				
				
				
          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>

<th> # </th>
<th> DATE </th>
<th> METHOD </th>
<th> AMOUNT </th>
<th> CHARGE </th>
<th> PAID </th>
<th> Transaction ID </th>
					</tr>
              </thead>
              <tbody>
                
				
				<?php
$i = 1;
$ddaa = mysql_query("SELECT id, tm, method, track, amount, charge, amountus, bcam, bcid, trx, trx_ext, status FROM deposit_data WHERE usid='".$uid."' AND status='1' ORDER BY id DESC");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

$dt = date("dS F Y - h:i A ", $data[1]);
$method = mysql_fetch_array(mysql_query("SELECT name  FROM deposit_method WHERE id='".$data[2]."'"));


 echo "                                 <tr>
<td> $i </td>
<td> $dt </td>
<td> $method[0] </td>
<td> $data[4] $basecurrency </td>
<td> $data[5] $basecurrency </td>
<td> $data[6] USD </td>
<td> $data[10] </td>


                                        </tr>
	";
  $i++;
	}
?>
				
				
			
				




				
				 
              </tbody>
           </table>
          </div><!-- table-responsive -->
		  
        </div>
      </div>
                  
      

      
    </div><!-- contentpanel -->
    


  
</section>


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


<script>
    $(document).ready(function(){
        
$(document).on( "click", '.deposit_button',function(e) {

        var name = $(this).data('name');
        var id = $(this).data('id');
        var min = $(this).data('min');
        var max = $(this).data('max');


        $(".abir_id").val(id);
        $(".abir_name").text(name);
        $(".abir_limits").text("( "+min+"-"+max+" <?php echo $basecurrency; ?> )");
    });

       
});


</script>

</body>
</html>



