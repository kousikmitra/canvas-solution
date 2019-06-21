<?php
require 'includes/common.php';
if(!isset($_SESSION['user_id'])){
    header('location:index.php');
    exit();
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
<body class="home page-template page-template-frontpage page-template-frontpage-php page page-id-10 wpb-js-composer js-comp-ver-4.12 vc_responsive" data-spy="scroll" data-target=".navbar-center">
<!--<div id="preloader">
        <div class="preloader-container">
          <img src="https://moveup.co.za/wp-content/uploads/2018/07/earth-.gif" class="preload-gif" alt="Ricochet" style="height:30%;width:50%">
        </div>
    </div> -->
<?php
    include 'includes/header.php';
    ?> 
    
    <div style="height:100px;background-color:#222"></div>
    
    <?php if(isset($_SESSION['user_id'])){ ?>
    
    <div style="height:100px"></div>
    
    
    
    
    <div style="text-align:center;">
        <h1 style="font-family: 'Baloo Bhai', cursive;margin:40px">My Queries</h1>
    </div>
    <div class="container">
        <div class="">
            <?php
            $user_id=$_SESSION['user_id'];
            $query="SELECT * FROM question WHERE user_id='$user_id' order by question_id desc";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            if(mysqli_num_rows($result)==0){
                echo "<h4 style='color:#0c0ca0;margin-right:auto;marin-left:auto;text-align:center'>Nothing Yet</h4>";
            }
            else{
                $c=0;
                while($row=mysqli_fetch_array($result) and $c<10){
                    $c=$c+1;
                    $question=$row['question'];
                    $question_id=$row['question_id'];
                    ?>
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="background-color:#fff;box-shadow:20px 20px 10px grey;border:.1px solid grey;margin:20px 0;padding:15px">
                        <h4><a href='answers.php?question_id=<?php echo "$question_id" ?>'><?php echo "$c.$question"; ?></a></h4>
                        <?php
                        $x=mysqli_query($con,"SELECT * FROM answer WHERE question_id='$question_id' order by upvote desc") or die(mysqli_error($con));
                        $x=mysqli_fetch_array($x);
                        $answer=$x['answer'];
                        $upvote=$x['upvote'];
                        $answer_user_id=$x['user_id'];
                        $r=mysqli_query($con,"SELECT * FROM user WHERE user_id='$answer_user_id'") or die(mysqli_error($con));
                        $r=mysqli_fetch_array($r);
                        $r=$r['name'];
                        if($answer!=''){
                        ?>
                        <div style="padding:20px">
                            <h4><?php echo "$answer"; ?></h4>
                            <h5 style="color:#777777;font-weight:bold;text-align:right" ><?php echo "Answered By - <a href='profile.php?user_id=$answer_user_id'>$r</a>"; ?></h5>
                            <h5 style="color:#2bd92b;font-weight:bold;text-align:right;" ><?php echo "Total Upvotes - $upvote"; ?></h5>
                            <h5 style="color:#35C195;;font-weight:bold;text-align:right" ><a href='answers.php?question_id=<?php echo "$question_id" ?>'>More...</a></h5>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                    <?php
                }
            }
            
            
            ?>
        </div>
    </div>
    
    
    
    <div style="height:100px"></div>
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