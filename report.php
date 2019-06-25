<?php
require 'includes/common.php';
require_once "./includes/functions.php";
if (!isset($_SESSION['user_id'])) {
    header('location:index.php');
    exit();
}
if (!(isset($_GET['question_id']) or isset($_GET['answer_id']) or isset($_GET['error']))) {
    header('location:index.php');
    exit();
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
    <script>
        (function(html) {
            html.className = html.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement);
    </script>
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
    <link rel='stylesheet' id='mainstyle-css' href='ust/st1.css' type='text/css' media='all' />
    <style>
        #backtotop ul li a {
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
            jQuery('div#wdc-recaptcha').each(function(i) {
                jQuery(this).attr('id', 'wdc' + (i + 1));
                x = i + 1;
                wdcs['wdc' + x.toString()] = grecaptcha.render('wdc' + (i + 1), {
                    'sitekey': '',
                    'theme': 'light'
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
            .cl-effect-5>li>a span[data-hover]:before {
                color: #f8f366 !important;
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
    <!-- <div id="preloader">
        <div class="preloader-container">
          <img src="https://moveup.co.za/wp-content/uploads/2018/07/earth-.gif" class="preload-gif" alt="Ricochet" style="height:30%;width:50%">
        </div>
    </div>  -->
    <?php
    include 'includes/header.php'
    ?>

    <div id="slider" class="content" style="height:20px">

        <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1">
            <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
            <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-16" data-transition="zoomout" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="images/web1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    </li>


                    <!-- SLIDE  -->
                    <li data-index="rs-17" data-transition="fadetotopfadefrombottom" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Parallax" data-description="">

                        <!-- MAIN IMAGE -->
                        <img src="images/world.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
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
            <div class="col-md-12">
                <div style="text-align:center">
                    <h3 style="font-size: 250%;color:#fff">Why are you disappointed? <a href="#" target="_blank" style="color:#fff;text-decoration:none;"><span class="glyphicon glyphicon-book"></span>Enter Details</a></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="padding:10px;padding-bottom:0;margin:0;border:2px solid white">
                <div class="panel panel-default" style="padding:10px;margin:0;border:2px solid black">
                    <div class="panel-heading" style="background-color:black;color:white">
                        <h3>Report about this</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (isset($_GET['question_id'])) {
                            ?>
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $question_id = $_GET['question_id'];
                            $query = "SELECT * FROM question WHERE question_id='$question_id'";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            $row = mysqli_fetch_array($result);
                            $question = $row['question'];
                            $question_user_id = $row['user_id'];
                            $question_date = $row['post_date'];
                            ?>
                            <form method="post" action="post_report.php">
                                <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
                                <div class="form-group">
                                    <h4><?php echo $question; ?></h4>
                                </div>
                                <div class="form-group"><textarea name="report_details" id="" rows="10" style="width: 100%; padding: 2%" placeholder="What is bad in this?"></textarea></div>
                                <input type="submit" value="Report This" name="report_question" class="btn btn-md" style="background-color:black;color:white; margin-top: 10px; float: right;">
                            </form>
                        <?php
                    }
                    ?>
                        <?php
                        if (isset($_GET['answer_id'])) {
                            ?>
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $answer_id = $_GET['answer_id'];
                            $query = "SELECT * FROM answer WHERE answer_id='$answer_id'";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            $row = mysqli_fetch_array($result);
                            $question_id = $row['question_id'];
                            $answer = $row['answer'];
                            $answer_user_id = $row['user_id'];
                            $answer_date = $row['answer_date'];
                            ?>
                            <form method="post" action="post_report.php">
                                <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
                                <input type="hidden" name="answer_id" value="<?php echo $answer_id; ?>">
                                <div class="form-group">
                                    <h4><?php echo substr($answer, 0, 500)." ... <a href=\"answers.php?question_id={$question_id}\">(more)</a>"; ?></h4>
                                </div>
                                <div class="form-group"><textarea name="report_details" id="" rows="10" style="width: 100%; padding: 2%;" placeholder="What is bad in this?"></textarea></div>
                                <input type="submit" value="Report This" name="report_answer" class="btn btn-md" style="background-color:black;color:white; margin-top: 10px; float: right;">
                            </form>
                        <?php
                    }
                    ?>
                    </div>
                    <h4 style="font-weight:800"><a href="./answers.php?question_id=<?php echo isset($question_id) ? $question_id : $_GET['error']; ?>" style="text-decoration:none;color:#fff;background-color:black" class="btn btn-default"> Click Here </a> to go back to the question.</h4>
                </div>
                <div><?php
                        if (isset($_GET['error'])) {
                            echo "<div class='container-fluid'><div class='row'><div style='col-md-12' style='text-align:center;color:#fff'><h4 style='text-align:center;color:#fff'>" . $_GET['message'] . "</h4></div></div></div>";
                        } ?></div>
                <div style="height: 30px"></div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
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
        var screenReaderText = {
            "expand": "expand child menu",
            "collapse": "collapse child menu"
        };
        /* ]]> */
    </script>
</body>

</html>