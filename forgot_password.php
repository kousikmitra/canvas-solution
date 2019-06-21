<?php
require 'includes/common.php';
if(isset($_SESSION['otp'])){
header('change_password.php');
exit();
}
if(isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
ob_start();
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
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='mainstyle-css'  href='ust/st1.css' type='text/css' media='all' />
<style>
#backtotop ul li a{
	background: url(images/up.png) center 48% no-repeat #fff;
	background-size: 22px 15px;
	display: block;
	width: 50px;
	height: 50px;
	float: right;
	right: 10px;
	text-indent: -9000px;
	-webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
	box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
	}    
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
<!--
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" type="text/css">
    <!--<script src="Bootstrap/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
    <link href="style.css" type="text/css" rel="stylesheet">
    <style>
    .h {
    color: #f8f366;
    font-size: 150%;
    }
    @media only screen and (max-width:992px) {
	.cl-effect-5 > li > a span[data-hover]:before{
        color: #f8f366!important;
	}
    ul.navbar-nav span.h {
        color: #fff;
        color: white;
    }
    ul.navbar-nav span.hs {
        color: #fff;
        color: black;
    }
    }
    </style>
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
    
    <div id="slider" class="content" style="height:20px">
			
			<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1">
			<!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
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
			</div><!-- END REVOLUTION SLIDER -->
			
		</div>
    
    
    
    
    
    
<div style="height: 120px"></div>

<div class="container-fluid">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"  style="padding:10px;margin:0;border:2px solid white">
        
        <?php
        if(!isset($_SESSION['recovery_mail'])){ ?>
        <div style="text-align:center"><h3 style="color:#fff">Enter Your Name And Email Id Same As It Was Used While You Created This Account</h3></div>
        <div class="panel panel-default" style="padding:10px;margin:0;border:2px solid black">
            <div class="panel-heading" style="background-color:black;color:white"><h3>User Password Recovery</h3></div>
            <div class="panel-body">
            <form method="get" action="">
            <div class="form-group"><input type="text" class="form-control input-md" placeholder="Name" name="name" required="true" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$"></div>
            <div class="form-group"><input type="email" class="form-control input-md" placeholder="Email" name="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></div>
            <input type="submit" value="Submit" name="recover" class="btn btn-md" style="background-color:black;color:white">
            </form>
            </div>
        </div>
        <?php } ?>
        <?php
        if(isset($_GET['name'])){
            $name=$_GET['name'];
            $email=$_GET['email'];
            $recovery=mysqli_query($con,"select * from user where name='$name' and email='$email'");
            if(mysqli_num_rows($recovery)==0){
                echo "<h4 style='color:red'>Name and email didn't match</h4>";
            }
            else {
                $_SESSION['recovery_mail']=$email;
                $_SESSION['recovery_name']=$name;
                header('location:forgot_password.php');
                exit();
            }
        } ?>
        <?php
        if(isset($_SESSION['recovery_mail']) and !isset($_SESSION['otp'])){
            $email=$_SESSION['recovery_mail'];
            $subject = 'PASSWORD RECOVERY';
            $message =rand(999,99999);
            mail($email,$subject,$message);
            echo "<div style='text-align:center'><h3 style='color:#fff'>An otp has been sent to your mail,Enter that otp here</h3></div>";
            echo "<div style='text-align:center'><h6 style='color:#fff'>By Default Localhost Does Not Allow To Send Mails , So For Testing Purpose I'm Displaying The OTP Here : $message</h6></div>"; ?>
            <div class="panel panel-default" style="padding:10px;margin:0;border:2px solid black">
            <div class="panel-heading" style="background-color:black;color:white"><h3>User Password Recovery</h3></div>
            <div class="panel-body">
            <form method="get" action="">
            <div class="form-group"><input type="text" class="form-control input-md" placeholder="OTP" name="otp" required="true"></div>
                <input type="text" name="otp_check" style="display:none" value="<?php echo "$message"; ?>">
            <input type="submit" value="Submit" name="submit" class="btn btn-md" style="background-color:black;color:white">
            </form>
            </div>
        </div>
        <div><?php
        if(isset($_GET['otp_error'])){
        echo "<h4 style='color:red'>".$_GET['otp_error']."</h4>"; } ?></div>
        <?php } ?>
        <?php
        if(isset($_GET['otp'])){
            $otp=$_GET['otp'];
            $otp_check=$_GET['otp_check'];
            if($otp==$otp_check){
                $_SESSION['otp']=1;
                header('location:change_password.php');
                exit();
            }
            else {
                header('location:forgot_password.php?otp_error=OTP did not match,A new OTP has been sent to your mail,check and reenter OTP carefully');
                exit();
            }
        } ?>
        </div>
    <div class="col-md-3"></div>
    </div>
    </div> 
    
    <?php 
    ob_end_flush();
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