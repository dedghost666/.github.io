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
<h1>Your Statistics</h1>


 <?php 
error_reporting(0);

$total = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_bid WHERE userid='".$uid."'"));
$win = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_bid WHERE userid='".$uid."' AND winstatus='1'"));
$rewin = $total[0]-$win[0];

echo "<h4 style=\"color:red;\">You Trade $total[0] Times and Win $win[0] Times</h4>";

echo "<h3>Your Re-win List ($rewin)</h2>";

?>


<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:20%">SL#</td>
                        <th style="width:20%">Game ID</td>
                        <th style="width:20%">Ball</td>
                        <th style="width:40%">Bid Time</td>
                    </tr>

<?php

$i = 0;

$ddaa = mysql_query("SELECT gid, userid, bidtm, id, ballid FROM seventrade_bid WHERE winstatus='0' AND gstat='1' ORDER BY id ASC");
while ($data = mysql_fetch_array($ddaa))
{
$i++;

if($data[1]==$uid){

$tm = date("d-m-Y h:i:s A", $data[2]);

echo " <tr>
                        <td>$i</td>
                        <td>$data[0]</td>
                        <td><img src=\"$baseurl/seventrade/0$data[4].png\" alt=\"$data[4]\"></td>
                        <td>$tm</td>

                        
</tr>";
}


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