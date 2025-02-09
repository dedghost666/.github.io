<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-gamepad"></i> 7 Trade Game </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
<center>

<h1>Winner List</h1>



<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:30%">Win Ball</td>
                        <th style="width:70%">Game Date</td>
                    </tr>


<?php
error_reporting(0);

$ddaa = mysql_query("SELECT gid FROM seventrade_game WHERE status='1'");
while ($data = mysql_fetch_array($ddaa))
{

$winball = mysql_fetch_array(mysql_query("SELECT winball FROM seventrade_game WHERE gid='".$data[0]."'"));
$bidder = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_bid WHERE gid='".$data[0]."'"));
$winner = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_bid WHERE gid='".$data[0]."' AND winstatus='1'"));

echo " <tr>
                        <td><img src=\"$baseurl/seventrade/0$winball[0].png\" alt=\"$winball[0]\"></td>
               
                        <td>";




$tm = mysql_fetch_array(mysql_query("SELECT shuru, sesh FROM seventrade_game WHERE gid='".$data[0]."'"));

$shuru = date("d-m-Y h:i:s A", $tm[0]);
$sesh = date("d-m-Y h:i:s A", $tm[1]);

echo "<b>Started:</b> $shuru<br/>

<b>Ended:</b> $sesh";
echo "</td></tr>";



}


?>	



</table>

</center>
	
        </div><!-- col-sm-6 -->

        
        

        
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

  


</section>


<?php
 include ('include/footer.php');
 ?>
 	
</body>
</html>