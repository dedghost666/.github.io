<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-user"></i>View Profile </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-sm-3 col-md-3">

<img src="propic/<?php echo $uid; ?>.jpg" width="100%" alt="IMG">
</div>		

<?php
 $data = mysql_fetch_array(mysql_query("SELECT username, fullname, email, phone FROM users WHERE id='".$uid."'"));
 ?>
 
 <div class="col-sm-9">
          
          <div class="profile-header">
            <h2 class="profile-name"><?php echo $data[0]; ?> <?php echo $data[1]; ?></h2>
            <div class="profile-location"><i class="glyphicon glyphicon-envelope"></i> &nbsp; <?php echo $data[2]; ?></div>
            <div class="profile-position"><i class="fa fa-phone"></i>  &nbsp; <?php echo $data[3]; ?></div>
            
            <div class="mb20"></div>
			
	
		
        </div><!-- profile-header -->
        </div><!-- col-sm-9 -->
      
	  
	  
	  
	  </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->
</section>


<?php
 include ('include/footer.php');
 ?>
 	
</body>
</html>