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

  <title>Sign Up</title>

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
                
                <form method="post" action="signup">
                    <h3 class="nomargin">Sign Up</h3>
                    <p class="mt5 mb20">Already have an Account? <a href="<?php echo $baseurl; ?>/signin"><strong>Sign In</strong></a></p>

					
				

<?php
if (isset($_GET['ref'])) {
$ref = $_GET['ref'];
$rrr = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username='".$ref."'"));
}else{
$rrr = 0;
}

if($_POST){

$username = mysql_real_escape_string($_POST["username"]);
$pass1 = mysql_real_escape_string($_POST["password1"]);
$pass2 = mysql_real_escape_string($_POST["password2"]);
$email = mysql_real_escape_string($_POST["email"]);
$country = mysql_real_escape_string($_POST["country"]);
$phone = mysql_real_escape_string($_POST["phone"]);

$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;
$err5 = 0;
$err6 = 0;
$err7 = 0;



if(trim($username)=="")
      {
$err1=1;
}

if(trim($email)=="")
      {
$err2=1;
}

if($pass1!=$pass2)
      {
$err3=1;
}

if(strlen($pass1)<="3")
      {
$err4=1;
}

$nnn = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if($nnn[0]>="1")
      {
$err5=1;
}

$eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));

if($eee[0]>="1")
      {
$err6=1;
}

$ppp = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE phone='".$phone."'"));

if($ppp[0]>="1")
      {
$err7=1;
}
if($rrr[0]=="0" || $rrr[0]==""){
  $r = 1;
}else{
  $r = $rrr[0];
}

$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7;


if ($error == 0){

$passmd = md5($pass1);


$res = mysql_query("INSERT INTO users SET username='".$username."', email='".$email."', password='".$passmd."', phone='".$phone."', country='".$country."', ref='".$r."'");

if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Register Completed Successfully!

</div>";

///////////////////------------------------------------->>>>>>>>>Send Email

$to = "$email";
$subject = 'Welcome to Lets Bid';

$message = 'Hi,'."\r\n Thanks For Joining LetsBID.CO.";

$headers = 'From: ' . "$sender \r\n" .
    'Reply-To: ' . "$sender \r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

///////////////////------------------------------------->>>>>>>>>Send Email

///////////////////------------------------------------->>>>>>>>>Send SMS
$msg = "Thanks For Joining LetsBID.CO";

$sendsms = "http://bulksms.hostrecline.com/gateway/?user=*************************&pass=**********&to=$phone&sender=letsbid&message=$msg"; 
$getsmsstatus = file_get_contents($sendsms);
///////////////////------------------------------------->>>>>>>>>Send SMS




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

Username Can Not be Empty!!!

</div>";
}		
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Email Can Not be Empty!!!

</div>";
}		
	
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Passwords Don't match!!

</div>";
}		
	
if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Password Can not be less than 4 Letter 
</div>";
}		
	
if ($err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Username Already Exist !
</div>";
}		
	
if ($err6 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Email Already Exist !
</div>";
}		
	
if ($err7 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Phone Number Already Exist !
</div>";
}		

}







}

?>

                  <input type="text" class="form-control uname" name="username" placeholder="Username" />
                    <input type="text" class="form-control email" name="email" placeholder="Email" />

                    <input type="text" class="form-control phn" name="phone" placeholder="Mobile eg: 8801XXXXXXXXX" />

                   <select class="form-control input-lg"  name="country">

                  <option Value="Bangladesh">Bangladesh</option>
                  <option Value="India">India</option>
                  <option Value="Pakistan">Pakistan</option>
                  <option Value="USA">USA</option>
                  <option Value="Canada">Canada</option>
                  <option Value="UK">UK</option>


                </select>



                    <input type="password" class="form-control pword" name="password1" placeholder="Password" />
                    <input type="password" class="form-control pword" name="password2" placeholder="Retype Password" />

					
                    <button class="btn btn-success btn-block">Sign Up</button>
                    
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



