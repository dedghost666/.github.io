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

 <?php 

if($_POST)
{




$coin = $_POST["coin"];
$bid = $_POST["bid"];

//echo "$bid  --  $coin";



//////////---------------------------------------->>>> Balance Chk 
if($bid >= $mallu){
echo " <h4 style=\"color:red;\">You Don't Have Enough Coin<br/>";
echo "Currently you have $mallu Coin </h4>";
include("exit.php");
exit();
}

//////////---------------------------------------->>>> CHEAT 
if(0.99 >= $bid){

echo " <h4 style=\"color:red;\">Minimum Bid Amount is 1 Coin</h4>";
include("exit.php");
exit();

}


//////////---------------------------------------->>>> CUT THE BALANCE

$ctn = $mallu-$bid;
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$uid."'");

//////////---------------------------------------->>>> CUT THE BALANCE

//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysql_query("INSERT INTO trx_history SET usid='".$uid."', des='Bid on Head And Tail', sig='-', amount='".$bid."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY


?>

<?php


//////////---------------------------------------->>>> START of Game
if($coin=="head"){


$random = rand(0,9);
if($random==0 || $random==1 || $random==2 ){

echo "<div id=\"div1\" style=\"width:80%;height:auto;background-color:transparent;\"><img src=\"head.png\" alt=\"HEAD\">";
echo "<br/><h1 style=\"color:#c0392b\">HEAD</h1> <h1>You Win The Game</h1></div>";

////////////------------------>> add balance
$win = $bid*2;
$ctn = $mallu+$win;
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$uid."'");
////////////------------------>> add balance

//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysql_query("INSERT INTO trx_history SET usid='".$uid."', des='Head And Tail Winning', sig='+', amount='".$win."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY


////////////------------------>> add to DB
mysql_query("INSERT INTO head_tail SET userid='".$uid."', bidon='HEAD', amount='".$bid."', winstat='1'");
////////////------------------>> add to DB  

}else{
echo "<div id=\"div1\" style=\"width:80%;height:auto;background-color:transparent;\"><img src=\"tail.png\" alt=\"TAIL\">";
echo "<br/><h1 style=\"color:#c0392b\">TAIL</h1><h1>You Lose The Game</h1></div>";

////////////------------------>> add to DB
mysql_query("INSERT INTO head_tail SET userid='".$uid."', bidon='HEAD', amount='".$bid."', winstat='0'");
////////////------------------>> add to DB  

}


}else if($coin=="tail"){



$random = rand(0,9);
if($random==0 || $random==1 || $random==2 ){

echo "<div id=\"div1\" style=\"width:80%;height:auto;background-color:transparent;\"><img src=\"tail.png\" alt=\"TAIL\">";
echo "<br/><h1 style=\"color:#c0392b\">TAIL</h1><h1>You Win The Game</h1></div>";

////////////------------------>> add balance
$win = $bid*2;
$ctn = $mallu+$win;
mysql_query("UPDATE users SET mallu='".$ctn."' WHERE id='".$uid."'");
////////////------------------>> add balance

//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysql_query("INSERT INTO trx_history SET usid='".$uid."', des='Head And Tail Winning', sig='+', amount='".$win."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY

////////////------------------>> add to DB
mysql_query("INSERT INTO head_tail SET userid='".$uid."', bidon='TAIL', amount='".$bid."', winstat='1'");
////////////------------------>> add to DB  


}else{
echo "<div id=\"div1\" style=\"width:80%;height:auto;background-color:transparent;\"><img src=\"head.png\" alt=\"HEAD\">";
echo "<br/><h1 style=\"color:#c0392b\">HEAD</h1><h1>You Lose The Game</h1></div>";

////////////------------------>> add to DB
mysql_query("INSERT INTO head_tail SET userid='".$uid."', bidon='TAIL', amount='".$bid."', winstat='0'");
////////////------------------>> add to DB  

}

}else{
echo "Please select Head or Tail<br/>";
}







} else{

echo "<h1>Error!!</h1><br/>Please try again later<br/>";
}

  ?>
 
</center>                             </div><!-- col-sm-6 -->

        
        

        
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

  


</section>


<?php
 include ('include/footer.php');
 ?>
 	
</body>
</html>