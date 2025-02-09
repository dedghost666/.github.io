<?php
require_once('function.php');
connectdb();
session_start();

if (!is_user()) {
	redirect("$baseurl/signin");
}

?>


<?php
 $user = $_SESSION['username'];
$usid = mysql_fetch_array(mysql_query("SELECT id, sid FROM users WHERE username='".$user."'"));
 $uid = $usid[0];
 $ttl = mysql_fetch_array(mysql_query("SELECT sitename FROM general_setting WHERE id='1'"));
 
 //---------------------->> Teka

 $mal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$uid."'"));
if($mal[0]==""){
	 $mallu = 0;
}else{
 $mallu = $mal[0];
}
//---------------------->> Teka

 $sid = $_SESSION['sid'];
  if($sid!=$usid[1]){
	redirect('signout.php');
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

  <title> <?php echo $ttl[0]; ?></title>

  <link href="<?php echo $baseurl; ?>/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  
