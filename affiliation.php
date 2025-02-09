<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-user"></i> Affiliation </h2>
    </div>

    <div class="contentpanel">

      <div class="row">
	  
	 
	  
	  <?php
	echo " <h3>Your Affiliation URL : $baseurl/signup/$user</h3>";
	
	
	echo " <h4>Already Joined</h4>";
	
	
$count = 0;
$ddaa = mysql_query("SELECT username FROM users WHERE ref='".$uid."' ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {	
$count++;

	echo "<button class=\"btn btn-info btn-lg\"> $data[0]</button> &nbsp;&nbsp;";
	}
	  ?>
	  
	  
	  
      </div>

      
      
      
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

  
</section>


<?php
 include ('include/footer.php');
 ?>
 	
</body>
</html>