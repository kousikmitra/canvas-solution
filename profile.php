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
    
    <?php 
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $query="SELECT * FROM user WHERE user_id='$user_id'";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
    $email=$row['email'];
    $pincode=$row['pincode'];
    $city=$row['city'];
    $gender=$row['gender'];
    $photo = $row['photo'];
    ?>
    <section id="works">
        <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid work-portfolio vc_row-no-padding">
            <div class="container wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="col-md-12 ">
                            <h1 class="section-title">
                                <span class="color_black">USER DETAILS </span>
                                <span class="color_yellow">& CONTRIBUTIONS</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vc_row-full-width vc_clearfix"></div>
    </section>
    <div class="container">
        <div class="row" style="margin-left: 16%;">
            <div class="col-md-5">
                <img src="<?php echo $photo; ?>" alt="Profile Photo" width="250" height="250">
            </div>
            <div class="col-md-4">
            <h3 class="section-title"  style="font-size:22px;text-align:left ">
                    <span class="color_yellow"><?php echo "$name"; ?></span>
                </h3>
                <h3 class="section-title"  style="font-size:1.5rem;text-align:left ">
                    <span class="color_yellow"><?php echo "$email"; ?></span>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="margin-left: 18%;">
                <h3 class="section-title"  style="font-size:24px;text-align:left ">
                    <span class="color_black"  style="font-size:1.8rem;">Gender : </span>
                    <span class="color_yellow"><?php echo "$gender"; ?></span>
                </h3>
                <h3 class="section-title"  style="font-size:24px;text-align:left ">
                    <span class="color_black"  style="font-size:1.8rem;">Pincode : </span>
                    <span class="color_yellow"><?php echo "$pincode"; ?></span>
                </h3>
                <h3 class="section-title"  style="font-size:24px;text-align:left ">
                    <span class="color_black"  style="font-size:1.8rem;">City : </span>
                    <span class="color_yellow"><?php echo "$city"; ?></span>
                </h3>
            </div>
            <div class="col-md-5">
                <?php
                $r=mysqli_query($con,"select * from question where user_id='$user_id'") or die(mysqli_error($con));
                $asked_question=mysqli_num_rows($r);
                $r=mysqli_query($con,"select * from answer where user_id='$user_id'") or die(mysqli_error($con));
                $answered_question=mysqli_num_rows($r);
                $r=mysqli_query($con,"select * from answer where user_id='$user_id'") or die(mysqli_error($con));
                $upvote=0;
                while($x=mysqli_fetch_array($r)){
                    $upvote+=$x['upvote'];
                }
                
                ?>
                <h3 class="section-title"  style="font-size:24px;text-align:left ">
                    <span class="color_black"  style="font-size:1.8rem;">Questions Asked  : </span>
                    <span class="" style="color: #555;"><?php echo "$asked_question"; ?></span>
                </h3>
                <h3 class="section-title"  style="font-size:24px;text-align:left ">
                    <span class="color_black"  style="font-size:1.8rem;">Questions Answered : </span>
                    <span class="color_yellow"><?php echo "$answered_question"; ?></span>
                </h3>
                <h3 class="section-title"  style="font-size:24px;text-align:left ">
                    <span class="color_black"  style="font-size:1.8rem;">Total Upvotes  : </span>
                    <span class="color_yellow"><?php echo "$upvote "; ?></span>
                </h3>
            </div>
        </div>
    </div>
    
    
    <?php
    $r=mysqli_query($con,"select * from answer where user_id='$user_id'") or die(mysqli_error($con));
    $low=0;
    $medium=0;
    $high=0;
    while($x=mysqli_fetch_array($r)){
        $upvote=$x['upvote'];
        if($upvote<3){
            $low+=1;
        }
        else if($upvote>10){
            $high+=1;
        }
        else{
            $medium+=1;
        }
    }
    ?>
    
    
        <script>
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title:{
                        text: "Upvotes Chart Representation"
                    },
                    axisY: {
                        title: "Number Of Answers"
                    },
                    axisX: {
                        title: "Upvotes Per Answer"
                    },
                    data: [{        
                        type: "column",  
                        showInLegend: false, 
                        legendMarkerColor: "grey",
                        legendText: "",
                        dataPoints: [      
                            { y: <?php echo "$low"; ?>, label: "Less Than 3" },
                            { y: <?php echo "$medium"; ?>,  label: "3-10" },
                            { y: <?php echo "$high"; ?>,  label: "More Than 10" }
                        ]
                    }]
                });
                chart.render();
                
                var chart = new CanvasJS.Chart("chartContainer2", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title:{
                        text: "Upvotes Chart Representation"
                    },
                    legend:{
                        cursor: "pointer",
                        itemclick: explodePie
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{name}: <strong>{y}%</strong>",
                        indexLabel: "{name} - {y}",
                        dataPoints: [
                            { y: <?php echo "$low"; ?>, name: "Less Than 3 Upvotes/Answer" },
                            { y: <?php echo "$medium"; ?>, name: "3-10 Upvotes/Answer" },
                            { y: <?php echo "$high"; ?>, name: "More Than 10 Upvotes/Answer", exploded: true }
                        ]
                    }]
                });
                chart.render();
                document.getElementById('chartContainer2').style.display='none';
                var x=document.getElementsByClassName('canvasjs-chart-credit');
                for(var i=0;i<x.length;i++){
                    x[i].style.display='none';
                }
            }
            
            function explodePie (e) {
                if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                } else {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                }
                e.chart.render();
            }
            function func1(){
                document.getElementById('chartContainer').style.display='inline-block';
                document.getElementById('chartContainer2').style.display='none';
            }
            function func2(){
                document.getElementById('chartContainer').style.display='none';
                document.getElementById('chartContainer2').style.display='inline-block';
            }
        </script>
    
        <div class="container-fluid" style="background-color:#fff;padding:50px">
           <div class="row">
                <div class="col-md-3"> 
                   
                </div>
                <div class="col-md-6">
                    <div id="chartContainer" style="height: 300px; width: 100%;margin-left:auto;margin-right:auto"></div>
                    <div id="chartContainer2" style="height: 300px; width: 100%;margin-left:auto;margin-right:auto"></div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-lg" onclick="func1();" style="background-color:#6f6f6f;color:#fff;padding:20px;width:100%;margin-bottom:15px">Bar Chart</button>
                    <button class="btn btn-lg" onclick="func2();" style="background-color:#6f6f6f;color:#fff;padding:20px;width:100%">Pie Chart</button>
                </div>
            </div>    
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    
    <?php 
    include 'includes/footer.php';
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