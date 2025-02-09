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
      <h2><i class="fa fa-dollar"></i> Transaction Report</h2>
    </div>

    
    <div class="contentpanel">
	 <div class="panel panel-default">

        <div class="panel-body">
		
		 <div class="clearfix mb30"></div>
		 
				
				
				
				
          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>

                    <th>Description</th>
                    <th>Amount</th>
                    <th>time</th>
					</tr>
              </thead>
              <tbody>
                
				
				<?php

$ddaa = mysql_query("SELECT id, des, sig, amount, tm FROM trx_history WHERE usid='".$uid."' ORDER BY tm DESC");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

if($data[2]=="+"){
$amnt = "<button class=\"btn btn-success btn-xs\">$data[2] $data[3] coin</button>";
}else if($data[2]=="-"){
$amnt = "<button class=\"btn btn-danger btn-xs\">$data[2] $data[3] coin</button>";	
}else{
$amnt = "<button class=\"btn btn-info btn-xs\">$data[2] $data[3] coin</button>";	
}

$dat1 = date("Y-m-d", $data[4]);
$dat2 = date("h:i:s A", $data[4]);
 echo "                                 <tr>
                                            <td>$data[1]</td>
                                            <td>$amnt</td>
                                            <td><b>$dat1</b>&nbsp; <i>$dat2</i> </td>


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



