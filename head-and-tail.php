<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-gamepad"></i> HEAD and TAIL </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
		
<center>
   
 
<br/>
<br/>

<form action="headandtailresult" method="post">




<div class="col-sm-3"></div>
<div class="col-sm-6">

            <div class="form-group">
					
					
<h3>Bet <input type="text" id="spinner" style="width: 80px;" name="bid"/> Coin For 


<select name="coin" style="width: 100px;">
  <option value="head">HEAD</option>
  <option value="tail">TAIL</option>
</select>
<br/><br/><br/>
<button type="submit" class="btn btn-primary btn-lg">SUBMIT</button>



</div>
</form><br/><br/>
 
 <?php 

 echo " <h4 style=\"color:red;\">Your Current balance is : $mallu Coin</h4>";
 
  ?>
          </h3> </center>      
		  
		  
		  
		  </div><div class="col-sm-3"></div>
		       
			   
			   
			   
			   </div><!-- col-sm-6 -->

        
        

        
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

  


</section>


<?php
 include ('include/footer.php');
 ?>
 <script>
 	  // Spinner
  var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);
  </script>
</body>
</html>