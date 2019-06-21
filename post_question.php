<?php
require 'includes/common.php';
if(!isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
if(!isset($_POST['question'])){
header('location:index.php');
exit();
}
$user_id=$_SESSION['user_id'];
$question=mysqli_real_escape_string($con,$_POST['question']);
$user_qs_query="SELECT * FROM question WHERE question='$question'";
$user_qs_result=mysqli_query($con,$user_qs_query) or die(mysqli_error($con));
if(mysqli_num_rows($user_qs_result)!=0){
    header('location:index.php?');
    exit();
}
else{
    if(isset($_POST['category']) and $_POST['category']!=""){
        $category=mysqli_real_escape_string($con,$_POST['category']);
        $result=mysqli_query($con,"INSERT into question(user_id,question,category) VALUES('$user_id','$question','$category')") or die(mysqli_error($con));
        header('location:index.php');
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
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
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
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
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body class="home page-template page-template-frontpage page-template-frontpage-php page page-id-10 wpb-js-composer js-comp-ver-4.12 vc_responsive" data-spy="scroll" data-target=".navbar-center" >
<div id="preloader">
        <div class="preloader-container">
          <img src="https://moveup.co.za/wp-content/uploads/2018/07/earth-.gif" class="preload-gif" alt="Ricochet" style="height:30%;width:50%">
        </div>
    </div> 
<?php
    include 'includes/header.php';
    ?><div style="height:100px;background-color:#222"></div>
    
    <div style="height:100px"></div>
    <?php if(isset($_SESSION['user_id'])){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="padding:10px;padding-bottom:0;margin:0;">
                <div class="panel panel-default" style="padding:10px;margin:0;">
                    <div class="panel-heading" style="background-color:black;color:white"><h3>Select Appropriate Category For The Question You Posted</h3></div>
                    <div class="panel-body">
                        <form method="post" action="post_question.php">
                            <div class="row">
                                <div class="col-md-6" style="font-size:20px;padding:20px"> 
                                    <input type="radio" name="category" value="Engineering And Technology" style="width:20px;height:20px;padding:10px" required>Engineering & Technology<br>
                                    <input type="radio" name="category" value="Computer Science" style="width:20px;height:20px;padding:10px">Computer Science<br>
                                    <input type="radio" name="category" value="Chemistry" style="width:20px;height:20px;padding:10px">Chemistry<br>
                                    <input type="radio" name="category" value="Mathematics" style="width:20px;height:20px;padding:10px">Mathematics<br>
                                    <input type="radio" name="category" value="Current Affairs" style="width:20px;height:20px;padding:10px">Current Affairs<br>
                                    <input type="radio" name="category" value="Arts" style="width:20px;height:20px;padding:10px">Arts<br>
                                    <input type="radio" name="category" value="History" style="width:20px;height:20px;padding:10px">History<br>
                                    <input type="radio" name="category" value="Sports" style="width:20px;height:20px;padding:10px">Sports<br>
                                </div>
                                <div class="col-md-6" style="font-size:20px;padding:20px">
                                    <input type="radio" name="category" value="Physiology" style="width:20px;height:20px;padding:10px">Physiology<br>
                                    <input type="radio" name="category" value="Botany And Zoology" style="width:20px;height:20px;padding:10px">Botany & Zoology<br>
                                    <input type="radio" name="category" value="Ecology" style="width:20px;height:20px;padding:10px">Ecology<br>
                                    <input type="radio" name="category" value="Physics" style="width:20px;height:20px;padding:10px">Physics<br>
                                    <input type="radio" name="category" value="General Knowledge" style="width:20px;height:20px;padding:10px">General Knowledge<br>
                                    <input type="radio" name="category" value="Commerce" style="width:20px;height:20px;padding:10px">Commerce<br>
                                    <input type="radio" name="category" value="Geography" style="width:20px;height:20px;padding:10px">Geography<br>
                                    <input type="radio" name="category" value="Others" style="width:20px;height:20px;padding:10px">Others<br>
                                </div>
                            </div>
                            <input type="text" style="width:100%;display:none" style="width:100%;display:none" value='<?php echo "$question"; ?>' name="question">
                            <div class="row" style="text-align:center">
                                <input type="submit" value="Submit" name="submit" class="btn btn-lg" style="background-color:black;color:white;width:40%">
                            </div>
                        </form>
                    </div>
                </div>
                <div style="height: 30px"></div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    
    
    
    
    <div style="height:200px"></div>
    <?php
    include 'includes/footer.php';
    } ?>
    
    
    
    
    
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