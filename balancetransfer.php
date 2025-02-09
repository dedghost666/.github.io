<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-dollar"></i> Balance Transfer</h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
		
<center>
	

		<?php

if($_POST)
{

$bid = $_POST["bid"];
$usrn = $_POST["user"];

if ($mallu<=$bid){
$err1=1;
}

if ($bid<=0.99){
$err2=1;
}

$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$usrn."'"));
if ($exist[0]==0){
$err3=1;
}



$error = $err1+$err2+$err3;


if ($error == 0){
//////////---------------------------->>>> CUT BALANCE 
$newmallu = $mallu-$bid;
$res = mysql_query("UPDATE users SET mallu='".$newmallu."' WHERE id='".$uid."'");
//////////---------------------------->>>> CUT BALANCE 

//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysql_query("INSERT INTO trx_history SET usid='".$uid."', des='Balance Transfer To ".$usrn."', sig='-', amount='".$bid."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY




if($res){

//////////---------------------------->>>> ADD BALANCE 
$cm = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE username='".$usrn."'"));
$up = $cm[0]+$bid;
mysql_query("UPDATE users SET mallu='".$up."' WHERE username='".$usrn."'");
//////////---------------------------->>>> ADD BALANCE 

//////////---------------------------------------->>>> TRX HISTORY
$usi = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username='".$usrn."'"));
$tm = time();
mysql_query("INSERT INTO trx_history SET usid='".$usi[0]."', des='Balance From ".$user."', sig='+', amount='".$bid."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY




echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Transferred Successfully!

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

Your Don't Have Enough Coin. You Have $mallu Coin.

</div>";
}		
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Minimum Amount to Transfer is 1 Coin

</div>";

}		
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

No User Found with Username $usrn

</div>";
}		

	
}



} 
	?>
			




<form action="" method="post">

<div class="col-sm-3"></div>
<div class="col-sm-6">

            <div class="form-group">
					
					
<h3>Send <input type="text" id="spinner" style="width: 80px;" name="bid"/> Coin<br/></h3>
<h3>
            
			  <label class="col-sm-3 control-label text-right">TO</label>
              <div class="col-sm-6">
                <input type="text" placeholder="username" name="user" class="form-control" />
              </div>
			  </h3>
            
<br/><br/><br/>
<button type="submit" class="btn btn-primary btn-lg">SUBMIT</button>



</div>
</form><br/><br/>
 
 <?php 

 echo " <h4 style=\"color:red;\">Your Current balance is : $mallu Coin</h4>";
 
  ?>
           </center>      
		  
		  
		  
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