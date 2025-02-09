<?php
include ('include/header.php');
?>

  
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<script>
	$(document).ready(function () {
    $("#type").change(function () {
        var val = $(this).val();
        if (val == "item1") {


            $("#size").html("<option value='DBBL Mobile'>DBBL Mobile</option><option value='bKash'>bKash</option><option value='Skril'>Skril</option><option value='PayPal'>PayPal</option>");

        } else if (val == "item2") {




            $("#size").html("<option value='Skril'>Skril</option><option value='PayPal'>PayPal</option>");
        }
    });
});
	
	</script>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>

    <div class="pageheader">
      <h2><i class="fa fa-dollar"></i> Withdraw Balance</h2>
    </div>

    
    <div class="contentpanel">
	
	
	
	<div class="row">

        <div class="col-md-12">
		
		
		
		<?php

if($_POST)
{

$bid = $_POST["bid"];
$via = $_POST["via"];
$too = $_POST["to"];
$frm = $_POST["from"];
$trx = $_POST["trx"];

//echo "$bid $via $too $frm $trx";

//	`amount`, `via`, `too`, `frm`, `trx`, `status	


if ($bid<="0.99"){
$err1=1;
}

if ($mallu<=$bid){
$err3=1;
}

if ($via=="" || $too==""){
$err2=1;
}


$error = $err1+$err2+$err3;


if ($error == 0){
	
$res = mysql_query("INSERT INTO wd_bal SET usid='".$uid."', amount='".$bid."', via='".$via."', too='".$too."'");
if($res){


//////////---------------------------------------->>>> CUT THE BALANCE
$ctn = $mallu-$bid;
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$uid."'");
//////////---------------------------------------->>>> CUT THE BALANCE

//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysql_query("INSERT INTO trx_history SET usid='".$uid."', des='Withdraw Via ".$via." To ".$too."', sig='-', amount='".$bid."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY

	
	
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Request Send Successfully! <br/>
Please Wait for Admin Authentication 

</div>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Some Problem Occurs, Please Try Again. 

</div>";
}
} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Minimum Amount is 1 Coin

</div>";
}		
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

All Fields Are Required !

</div>";

}	
if ($err3 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

You Don't Have enough Coin!!

</div>";

}		


}

}
?>
		
		
		
		
		
<center>


<form action="" method="post">




<div class="col-sm-3"></div>
<div class="col-sm-6">

            <div class="form-group">
					
					
<h3>

Withdraw <input type="text" id="spinner" style="width: 200px;" name="bid" class="form-control" /> 

Coin</h3> 
            </div>

 <div class="form-group">

			  


              <label class="col-sm-3 control-label">Your Country</label>
              <div class="col-sm-9">

               <select id="type" class="form-control input-lg" style="width:100%;">
                 <option value="">Select a Country</option>
                  <option value="item1">Bangladesh</option>
                  <option value="item2">Other</option>
                </select>

              </div>
            </div>




<div class="form-group">	

              <label class="col-sm-3 control-label">Withdraw Via</label>
              <div class="col-sm-9">



<select id="size" name="via" class="form-control input-lg" style="width:100%;">
    <option value="">Select One</option>
</select>


              </div>
			  
			            </div>




 <div class="form-group">  

              <label class="col-sm-3 control-label">Withdraw To</label>
              <div class="col-sm-9">
                <input type="text" name="to" placeholder="Where We Send Payment..." class="form-control" />
              </div>
			  
			            </div>

 <div class="form-group">  

              <!--label class="col-sm-3 control-label">Payment From</label>
              <div class="col-sm-9">
                <input type="text" name="from" placeholder="Send Payment From....." class="form-control" />
              </div>
			  
			  

              <label class="col-sm-3 control-label">Transaction ID</label>
              <div class="col-sm-9">
                <input type="text" name="trx" placeholder="Transaction ID For Your Payment..." class="form-control" />
              </div-->
			  
			  
		 <div class="clearfix mb30"></div>	  
<button type="submit" class="btn btn-primary btn-lg">SUBMIT</button>


			 

</div>
</form><br/><br/>
</center>      
		  
		  
		  
		  </div><div class="col-sm-3"></div>
		       
			   
			   
			   
			   </div><!-- col-sm-6 -->

        
        

        
      </div><!-- row -->
	
	
	
	
	
	
	 <div class="panel panel-default">

        <div class="panel-body">
		
		 <div class="clearfix mb30"></div>
		 
				
				
				
				
          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>

                    <th>Payment Via</th>
                    <th>Amount</th>
                    <th>Payment To</th>
                    <th>Status</th>
					</tr>
              </thead>
              <tbody>
                
				
				<?php

$ddaa = mysql_query("SELECT id, amount, via, too, frm, trx, status FROM wd_bal WHERE usid='".$uid."' ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

if($data[6]=="0"){
$amnt = "<button class=\"btn btn-warning-alt btn-xs\">On Review</button>";
}else if($data[6]=="1"){
$amnt = "<button class=\"btn btn-success btn-xs\">SUCCESS</button>";	
}else if($data[6]=="9"){
$amnt = "<button class=\"btn btn-danger-alt btn-xs\">Refunded</button>";	
}else{
$amnt = "<button class=\"btn btn-info-alt btn-xs\">Unknown</button>";	
}

 echo "                                 <tr>
                                            <td>$data[2]</td>
                                            <td>$data[1] Coin</td>
                                            <td>$data[3]</td>
                                            <td>$amnt</td>


                                        </tr>
	";
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


</body>
</html>



