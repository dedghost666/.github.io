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
<h1> BID n WIN</h1> 
<h4><a href="<?php echo $baseurl; ?>/seventradestat">Your Statistics</a> | <a href="<?php echo $baseurl; ?>/seventradewinlist">Winner List</a></h4> 
				
   </center>
 
<br/>
<br/> 

  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<style id="jsbin-css">
.cc22{ 
  width:450px; margin:0 auto;

}

.box {    
  -moz-border-radius:150px;
  -webkit-border-radius:150px;
  background-position:0px 0px;
  background-color:transparent;
  position:absolute;
  background-repeat:no-repeat;
  float:left;
  height:60px;
  margin:18px;
  position:absolute;
  width:60px;
  padding:0px;
}


</style>
<script type="text/javascript">
    function drawCircle(selector, center, radius, angle, x, y) {
      var total = $(selector).length;
      var alpha = Math.PI * 2 / total;
      angle *= Math.PI / 180;
           
      $(selector).each(function(index) {
        var theta = alpha * index;
        var pointx  =  Math.floor(Math.cos( theta + angle) * radius);
        var pointy  = Math.floor(Math.sin( theta + angle) * radius );
	
        $(this).css('margin-left', pointx + x + 'px');
        $(this).css('margin-top', pointy + y + 'px');
    });
   }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var angle = 90;
    drawCircle('.box', 50, 120, angle, 210, 120);
	
	var shaon = false;

			
    my = setInterval(function() {if(!shaon) {
      angle = angle + 5;
      drawCircle('.box', 50, 120, angle, 210, 120);
          }
	}, 120);

	$("#sGame").mouseover(function(e) {
    e.preventDefault();
    shaon = true;
    });
	
	$("#sGame").mouseout(function(e) {
    e.preventDefault();
    shaon = false;
    });
	
	
	
	
		
  });
  
  
  //code my ShaOn---------------

 $(function(){
    $('#a').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#b').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#c').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#d').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#e').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#f').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#g').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#h').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  
 $(function(){
    $('#i').on('click', function(e){
        e.preventDefault();
        $('.bid-form').show();
		document.getElementById("sssss").value = this.getAttribute("value");
    });
});
  

</script>

<?php



////------------------------>> Current Trade

$already = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_bid WHERE gstat='0' AND userid='".$uid."'"));
if ($already[0]>=1)
   {
echo "You Already Trade $already[0] Times on Current Game<br/>You Bid On : ";

$ddaa = mysql_query("SELECT DISTINCT(ballid) AS ballid FROM seventrade_bid WHERE gstat='0' AND userid='".$uid."'");
    while ($data = mysql_fetch_array($ddaa))
    {
$tms = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_bid WHERE gstat='0' AND userid='".$uid."' AND ballid='".$data[0]."'"));

echo "$data[0] ($tms[0] Times), ";

}

echo "<br/>";
}




$r = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM seventrade_game WHERE status ='0'"));
if ($r[0]>=1)
//if (1==1)
   {	
$running = mysql_fetch_array(mysql_query("SELECT gid FROM seventrade_game WHERE status ='0'"));
//echo " GAME # $running[0] is running" ;

$sesh = mysql_fetch_array(mysql_query("SELECT sesh FROM seventrade_game WHERE gid ='".$running[0]."'"));


$seconds = $sesh[0] - time();

$days    = floor($seconds / 86400);
$hours   = floor(($seconds - ($days * 86400)) / 3600);
$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

if($sesh[0] >= time()){

echo "<br/>Ends at : $days DAYS  $hours  HOURS $minutes  MINUTES  $seconds  SECONDS";
}else{
echo "<br/>Game Time is Over....";
}



?>
 
  <div class="cc22" id="sGame">
    <img src="<?php echo $baseurl; ?>/seventrade/01.png" class="box" id="a" value="1">
    <img src="<?php echo $baseurl; ?>/seventrade/02.png" class="box" id="b" value="2">
    <img src="<?php echo $baseurl; ?>/seventrade/03.png" class="box" id="c" value="3">
    <img src="<?php echo $baseurl; ?>/seventrade/04.png" class="box" id="d" value="4">
    <img src="<?php echo $baseurl; ?>/seventrade/05.png" class="box" id="e" value="5">
    <img src="<?php echo $baseurl; ?>/seventrade/06.png" class="box" id="f" value="6">
    <img src="<?php echo $baseurl; ?>/seventrade/07.png" class="box" id="g" value="7">
	
  <br/> <br/> <br/> <br/> <br/> <br/> <br/>
</div>
  
 <form class="bid-form" action="<?php echo $baseurl; ?>/seventradesubmit" method="post" style="display:none;" >
 <br/><br/>

Your Number:  
<input type="text" name="number" id="sssss" value="" readonly>
<br>
Bid Amount: <input type="text" name="amount" value="50" readonly>Coin
<br>



<?php


if($mallu<=49){
echo "<b style=\"color:red;\">You Don't Have Enough Coin.</b><br/>Currently You have $mallu Coin.";
}else{
echo "<input type=\"submit\" value=\"BID NOW\" >";
}

?>

</form> 
  



<?php

} else {

echo "<center>No active game</center>";
}
  ?>
  <br/> <br/> <br/> <br/> <br/> <br/> <br/>
</div>
  <div class="clear"></div>
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	

		
		
		
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