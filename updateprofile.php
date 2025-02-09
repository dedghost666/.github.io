<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-user"></i> Profile Setting </h2>
    </div>

    <div class="contentpanel">

      <div class="row">
        <div class="col-md-12">
      <div class="panel panel-default">
        <!--div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="panel-close">×</a>
            <a href="#" class="minimize">−</a>
          </div>      
        </div-->
        <div style="display: block;" class="panel-body panel-body-nopadding">
          
          <form action="" method="post" class="form-horizontal form-bordered">
         
		<?php

if($_POST)
{

$phone = $_POST["phone"];
$email = $_POST["email"];
$name = $_POST["name"];

$ph1 = str_replace("'","-","$phone");
$em1 = str_replace("'","-","$email");
$fullname = str_replace("'","-","$name");

$res = mysql_query("UPDATE users SET phone='".$ph1."', email='".$em1."', fullname='".$fullname."' WHERE id='".$uid."'");
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Updated Successfully!

</div>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Some Problem Occurs, Please Try Again. 

</div>";
}

}



$data = mysql_fetch_array(mysql_query("SELECT email, phone, fullname FROM users WHERE id='".$uid."'"));

?>
			
			
            <div class="form-group">
              <label class="col-sm-3 control-label">Full Name</label>
              <div class="col-sm-6"><input name="name" value="<?php echo $data[2]; ?>" class="form-control" type="text"></div>
            </div>
                
            			
			
            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-6"><input name="email" value="<?php echo $data[0]; ?>" class="form-control" type="text"></div>
            </div>
                
            
                        
            <div class="form-group">
              <label class="col-sm-3 control-label">Phone</label>
              <div class="col-sm-6"><input name="phone" value="<?php echo $data[1]; ?>" class="form-control" type="text"></div>
            </div>
                

                
            

            
            
        </div><!-- panel-body -->
        
        <div style="display: block;" class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				  <button class="btn btn-primary">Submit</button>
				</div>
			 </div>
			 
			 
          </form>
          
			 
		  </div><!-- panel-footer -->
        
      </div><!-- panel -->
      
     
      
     
      
      


	  
       

               </div><!-- col-md-12 -->
      
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->



 




<?php
 include ('include/footer.php');
 ?>
 
 	
</body>
</html>