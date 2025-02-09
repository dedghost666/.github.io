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
      <h2><i class="fa fa-th-list"></i> BID GAMES</h2>
    </div>

    
    <div class="contentpanel">
	 <div class="panel panel-default">

        <div class="panel-body">
		
		 <div class="clearfix mb30"></div>
		 
				
				
				
				
          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>

                    <th>Title</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>BID NOW</th>
                    
					</tr>
              </thead>
              <tbody>
                
				
				<?php

$ddaa = mysql_query("SELECT id, title, btext, op1, op2, op1s, op2s, status FROM bid_game WHERE status='0' ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

$op1 = mysql_query("SELECT amount FROM bid_bid WHERE gid='".$data[0]."' AND userid='".$uid."' AND opid='1' ORDER BY id");
$co1 = 0;
    while ($oo1 = mysql_fetch_array($op1))
    {
$co1 = $co1+$oo1[0];
}

$op2 = mysql_query("SELECT amount FROM bid_bid WHERE gid='".$data[0]."' AND userid='".$uid."' AND opid='2' ORDER BY id");
$co2 = 0;
    while ($oo2 = mysql_fetch_array($op2))
    {
$co2 = $co2+$oo2[0];
}


 echo "                                 <tr>
                                            <td>$data[1]</td>
                                            <td>$data[3] <b>($co1 Coin)</b></td>
                                            <td>$data[4] <b>($co2 Coin)</b></td>
                                            <td>

<form action=\"$baseurl/bid-now\" method=\"post\">
<input type=\"hidden\" name=\"gameid\" value=\"$data[0]\">
<button class=\"btn btn-primary btn-xs\">BID NOW</button>
</form>

</td>

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



</body>
</html>



