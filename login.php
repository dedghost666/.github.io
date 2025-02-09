<?php
 
require_once('function.php');
connectdb();
session_start();

if (is_user()) {
	redirect("$baseurl/dashboard");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo $baseurl; ?>/images/fav.png" type="image/png">

  <title>Sign In</title>

  <link href="<?php echo $baseurl; ?>/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">


<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-2">
                
               
            </div><!-- col-sm-7 -->
            
            <div class="col-md-8">
                
                <form method="post" action="">
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Don't have an Account? <a href="<?php echo $baseurl; ?>/signup"><strong>Sign Up</strong></a></p>
                		



<?php 

if ($_POST){
$username = $_POST['username'];
$password = md5($_POST['password']);

$count = mysql_fetch_array(mysql_unbuffered_query("SELECT COUNT(*) FROM users WHERE username='".$username."' AND password='".$password."'"));
if ($count[0]==1) {
$uu = $_POST['username']; 
$tm = time();
$si = "$uu$tm";
$sid = md5($si);
$_SESSION['sid'] = $sid;
$_SESSION['username'] = $username;
mysql_query("UPDATE users SET sid='".$sid."' WHERE username='".$uu."'");
redirect("$baseurl/dashboard");
}else{
echo '
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  
Wrong username or password
</div>';
  }
}
 ?>




						<?php if (!empty($_GET['error'])): ?>
	                            
                                <?php endif ?>
								
                    <input type="text" class="form-control uname" name="username" placeholder="Username" />
                    <input type="password" class="form-control pword" name="password" placeholder="Password" />
               
                    <button class="btn btn-success btn-block">Sign In</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; <?php echo date("Y"); ?>. All Rights Reserved. 
            </div>
            <div class="pull-right">
       
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="<?php echo $baseurl; ?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo $baseurl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo $baseurl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $baseurl; ?>/js/modernizr.min.js"></script>
<script src="<?php echo $baseurl; ?>/js/jquery.sparkline.min.js"></script>
<script src="<?php echo $baseurl; ?>/js/jquery.cookies.js"></script>

<script src="<?php echo $baseurl; ?>/js/toggles.min.js"></script>
<script src="<?php echo $baseurl; ?>/js/retina.min.js"></script>

<script src="<?php echo $baseurl; ?>/js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        
        // Please do not use the code below
        // This is for demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'greyjoy') {
            jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
        } else if(c && c == 'dodgerblue') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        } else if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }
    });
</script>

</body>
</html>



