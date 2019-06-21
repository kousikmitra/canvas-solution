<?php
require 'includes/common.php';
if(isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
ob_start();
if(!isset($_GET['otp']) and !isset($_SESSION['user_signup_query'])){
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password=md5(md5($password));
$contact=$_POST['contact'];
$pincode=mysqli_real_escape_string($con,$_POST['pincode']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$dup_email_query="SELECT * FROM user WHERE email='$email'";
$dup_email_result=mysqli_query($con,$dup_email_query) or die(mysqli_error($con));
if(mysqli_num_rows($dup_email_result)>0){
    header('location:signup.php?signup_error=We do not allow duplicate entry of emails');
    exit();
}
$user_signup_query="INSERT into user(name,email,password,contact,pincode,city,gender) VALUES('$name','$email','$password','$contact','$pincode','$city','$gender')";
$_SESSION['user_signup_query']=$user_signup_query;
$_SESSION['em']=$email;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign Up</title>
<meta charset="utf-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">	
<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
<style type="text/css">
img.wp-smiley,
img.emoji {display: inline !important;border: none !important;box-shadow: none !important;height: 1em !important;width: 1em !important;margin: 0 .07em !important;vertical-align: -0.1em !important;background: none !important;padding: 0 !important;}
</style>
<link rel='stylesheet' id='mainstyle-css'  href='ust/st1.css' type='text/css' media='all' />
<style>
#backtotop ul li a{background: url(images/up.png) center 48% no-repeat #fff;background-size: 22px 15px;display: block;width: 50px;height: 50px;float: right;right: 10px;text-indent: -9000px;-webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);}    
</style>
<script type='text/javascript' src='uscript/sc1.js'></script>
<script type='text/javascript' src='uscript/sc2.js'></script>
<script>
var wdcs = {};
var x;
var onloadCallback = function() {
	   jQuery('div#wdc-recaptcha').each(function(i){
		  jQuery(this).attr('id','wdc' + (i+1));
		  x = i+1;
		  wdcs['wdc' + x.toString()] = grecaptcha.render('wdc'+(i+1), {
	       'sitekey' : '',
	       'theme' : 'light'
	       });
});
};
</script>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body class="home page-template page-template-frontpage page-template-frontpage-php page page-id-10 wpb-js-composer js-comp-ver-4.12 vc_responsive" data-spy="scroll" data-target=".navbar-center">
<div id="preloader">
        <div class="preloader-container">
          <img src="https://moveup.co.za/wp-content/uploads/2018/07/earth-.gif" class="preload-gif" alt="Ricochet" style="height:30%;width:50%">
        </div>
    </div> 
<?php
    include 'includes/header.php'
    ?>
    
    <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
    <div id="slider" class="content" style="height:20px">
			<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1">
				<div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
					<ul>	
						<!-- SLIDE  -->
						<li data-index="rs-16" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
							<!-- MAIN IMAGE -->
                            <img src="images/web1.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
							
						</li>
				
						
						<!-- SLIDE  -->
						<li data-index="rs-17" data-transition="fadetotopfadefrombottom" data-slotamount="default"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Parallax" data-description="">
							
							<!-- MAIN IMAGE -->
							<img src="images/world.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

						</li>
									
					</ul>
					<div class="tp-static-layers"></div>
					<div class="tp-bannertimer"></div>	
				</div>
			</div>
		</div>
    <!-- END REVOLUTION SLIDER -->
    
    <div style="height: 120px"></div>



<?php
    if(!isset($_GET['otp'])) {
    $email=$_SESSION['em'];
    $subject = 'Email Varification';
    $message =rand(999,99999);
    mail($email,$subject,$message);
    echo "<div class='container-fluid'><div class='row'><div class='col-md-12'><h4 style='text-align:center;color:#fff'>By Default Localhost Does Not Allow To Send Mails , So For Testing Purpose I'm Displaying The OTP Here : $message<br>This Line Of Code Should Be Removed When The Page Is Uploaded To Server</h4></div></div></div>";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="padding:10px;padding-bottom:0;margin:0;border:2px solid white">
                <div class="panel panel-default"  style="padding:10px;margin:0;border:2px solid black">
                    <div class="panel-heading" style="background-color:black;color:white"><h3>Email Varification</h3></div>
                    <div class="panel-body">
                        <form method="get" action="">
                            <h4>An OTP Has Been Sent To Your Mail Id , Enter That Here</h4>
                            <div class="form-group"><input type="text" class="form-control input-md" placeholder="OTP" name="otp" required="true"></div>
                            <input type="text" name="otp_check" style="display:none" value="<?php echo "$message"; ?>">
                            <input type="submit" value="Submit" name="submit" class="btn btn-md" style="background-color:black;color:white">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php }
?>

    <!-- go top button -->
		<div id="backtotop">
			<ul>
				<li><a id="toTop" href="#home" onClick="return false">Back to Top</a></li>
			</ul>
		</div>
<script type='text/javascript' src='uscript/sc3.js'></script>
<script type='text/javascript' src='uscript/sc4.js'></script>
<script type='text/javascript' src='uscript/sc5.js'></script>
<script type='text/javascript' src='uscript/sc6.js'></script>
<script type='text/javascript' src='uscript/sc7.js'></script>
<script type='text/javascript' src='uscript/sc8.js'></script>
<script type='text/javascript' src='uscript/sc9.js'></script>
<script type='text/javascript' src='uscript/sc10.js'></script>
<script type='text/javascript' src='uscript/sc11.js'></script>
<script type='text/javascript' src='uscript/sc12.js'></script>
<script type='text/javascript' src='uscript/sc13.js'></script>
<script type='text/javascript' src='uscript/sc14.js'></script>
<script type='text/javascript' src='uscript/sc15.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var screenReaderText = {"expand":"expand child menu","collapse":"collapse child menu"};
/* ]]> */
</script>
</body>
</html>
    
    
    
    
    
    
<?php
if(isset($_GET['otp'])){
$otp=$_GET['otp'];
$otp_check=$_GET['otp_check'];
if($otp==$otp_check){
$_SESSION['signotp']=1;
}
else {
unset($_SESSION['user_signup_query']);
unset($_SESSION['em']);
header('location:signup.php');
exit();
}
}?>
<?php 
if(isset($_SESSION['signotp'])){
$user_signup_query=$_SESSION['user_signup_query'];
$user_signup_result=mysqli_query($con,$user_signup_query) or die(mysqli_error($con));
unset($_SESSION['user_signup_query']);
unset($_SESSION['signotp']);
unset($_SESSION['em']);
$id=mysqli_insert_id($con);
$_SESSION['user_id']=$id;
header('location:index.php');
exit();
}
ob_end_flush();
?>