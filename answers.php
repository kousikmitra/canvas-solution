<?php
require 'includes/common.php';
if(!isset($_SESSION['user_id'])){
    header('location:index.php');
    exit();
}
if(!isset($_GET['question_id'])){
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
<body class="home page-template page-template-frontpage page-template-frontpage-php page page-id-10 wpb-js-composer js-comp-ver-4.12 vc_responsive" data-spy="scroll" data-target=".navbar-center" style="background-color:#bebebe">
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
    
    <div style="height:80px"></div>
    
    <?php 
    if(isset($_GET['message'])){
        $message=$_GET['message'];
        echo "<div style='text-align:center;color:#57ea57;-webkit-text-stroke-width:1px;-webkit-text-stroke-color:#222'><h3>$message</h3></div>";
    }
    ?>
    
    
    
    <div class="container">
        <div class="">
            <?php
            $user_id=$_SESSION['user_id'];
            $question_id=$_GET['question_id'];
            $query="SELECT * FROM question WHERE question_id='$question_id'";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            $row=mysqli_fetch_array($result); 
            $question=$row['question'];
            $question_user_id=$row['user_id'];
            ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8"><h1 style="font-family: 'Baloo Bhai', cursive;margin-bottom:20px"><?php echo "$question"; ?></h1></div>
                <div class="col-md-2"></div>
            </div> <?php
            $query="SELECT * FROM user WHERE user_id='$question_user_id'";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            $row=mysqli_fetch_array($result);
            $name=$row['name'];
            ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8"><h3 style="font-family: 'Baloo Bhai', cursive;margin-bottom:50px;font-weight:200;text-align:right">Question By  - <?php echo "<a href='profile.php?user_id=$question_user_id'>$name</a>"; ?></h3></div>
                <div class="col-md-2"></div>
            </div> <?php
            $query="SELECT * FROM answer WHERE question_id='$question_id' order by upvote desc";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            if(mysqli_num_rows($result)==0){
                echo "<div class='row' style='margin:30px -15px'><div class='col-md-2'></div><div class='col-md-8'><h4 style='color:#0c0ca0;'>No Answers Yet - Be the first to post an answer</h4></div><div class='col-md-2'></div></div>";
            }
            else{
                $c=0;
                while($row=mysqli_fetch_array($result) and $c<10){
                    $c=$c+1;
                    $answer=$row['answer'];
                    $answer_id=$row['answer_id'];
                    $answer_user_id=$row['user_id'];
                    $upvote=$row['upvote'];
                    $r=mysqli_query($con,"SELECT * FROM user WHERE user_id='$answer_user_id'") or die(mysqli_error($con));
                    $r=mysqli_fetch_array($r);
                    $r=$r['name'];
                    ?>
                    <div class="row" style="margin:50px 0px">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="background-color:#fff; box-shadow:20px 20px 10px grey; padding:30px">
                        <h4><?php echo "$answer"; ?></h4>
                        <h5 style="color:#777777;font-weight:bold;text-align:right" ><?php echo "Answered By - <a href='profile.php?user_id=$answer_user_id'>$r</a>"; ?></h5>
                        <h5 style="color:#2bd92b;font-weight:bold;text-align:right;" ><?php echo "Total Upvotes - $upvote"; ?></h5>
                        <?php
                        $q=mysqli_query($con,"SELECT * FROM upvote WHERE answer_id='$answer_id' and  user_id='$user_id'") or die(mysqli_error($con));
                        $q=mysqli_num_rows($q);
                        if($q==0){ ?>
                            <h5 style="color:#777777;font-weight:bold;text-align:right;" ><a href='upvote.php?answer_id=<?php echo "$answer_id" ?>&user_id=<?php echo "$user_id" ?>&question_id=<?php echo "$question_id" ?>'><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>Upvote</a></h5>
                        <?php }
                        else{ ?>
                            <h5 style="color:#35C195;;font-weight:bold;text-align:right" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Upvoted</h5>
                        <?php }
                        ?>
                        
                        
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                    <?php
                }
            }
            
            
            ?>
        </div>
    </div>
    <?php
    if($user_id!=$question_user_id){ ?>
        <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="padding:10px;padding-bottom:0;margin:0;">
                <div class="panel panel-default" style="padding:10px;margin:0;">
                    <div class="panel-heading" style="background-color:black;color:white"><h3>Write An Answer</h3></div>
                    <div class="panel-body">
                        <form method="post" action="post_answer.php">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group"><textarea rows="7" class="form-control input-lg" placeholder="Type Your Answer Here..." name="answer" required="true" style="width:100%"></textarea>
                                    <input type="number" name="question_id" value='<?php echo "$question_id"; ?>' style="display:none">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-lg" style="background-color:black;color:white;width:100%">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="height: 30px"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    
    
    <?php }
    ?>
    
    
    
    <div style="height:80px"></div>
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