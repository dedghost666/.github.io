<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-gamepad"></i> BID NOW </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
		
<center>
   
<?php

if($_POST)
{
$gameid = $_POST["gameid"];

$gamedetails = mysql_fetch_array(mysql_query("SELECT title, btext, op1, op2, op1s, op2s, status FROM bid_game WHERE id='".$gameid."'"));

if($gamedetails[6] == 1){
echo " <h4 style=\"color:red;\">The Game is Expired Already!!!<br/>";
include("exit.php");
exit();
}

echo "<h1>$gamedetails[0]</h1>";
echo "<p>$gamedetails[1]</9>";


echo "<form action=\"$baseurl/bidnowsubmit\" method=\"post\">

<input type=\"hidden\" name=\"gameid\" value=\"$gameid\"> ";
?>


<div class="col-sm-3"></div>
<div class="col-sm-6">

            <div class="form-group">
					
					
<h3>BID <input type="text" id="spinner" style="width: 80px;" name="bid"/> Coin 

<br/><br/>

<?php

if($gamedetails[4]==0){
	
echo "<button type=\"submit\" name=\"sub\" value=\"1\" class=\"btn btn-primary btn-lg\">$gamedetails[2]</button>  &nbsp; &nbsp; &nbsp; &nbsp; ";
}else{
	
echo "<button type=\"submit\" name=\"sub\" value=\"1\" class=\"btn btn-primary-alt btn-lg disabled\">$gamedetails[2] (closed)</button>  &nbsp; &nbsp; &nbsp; &nbsp;  ";
}

if($gamedetails[5]==0){
	
echo "  <button type=\"submit\" name=\"sub\" value=\"2\" class=\"btn btn-primary btn-lg\">$gamedetails[3]</button>";
}else{
	
echo "  <button type=\"submit\" name=\"sub\" value=\"2\" class=\"btn btn-primary-alt btn-lg disabled\">$gamedetails[3] (closed)</button>";
}

?>


</div>
</form>







<?php






}else{
 echo " <h2 style=\"color:red;\">Please Select a Game To BID</h4>";
}

?>








 
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