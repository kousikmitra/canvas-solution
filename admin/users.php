<?php
require_once "dbconnection.php";

if (!isset($_SESSION['admin_id'])) {
    header('location:index.php');
    exit();
}

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <base target="_self">
    <meta name="description" content="A Bootstrap 4 admin dashboard theme that will get you started. The sidebar toggles off-canvas on smaller screens. This example also include large stat blocks, modal and cards. The top navbar is controlled by a separate hamburger toggle button." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="/images/cp_ico.png">


    <!--stylesheets / link tags loaded here-->


    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />


    <style type="text/css">
        body,
        html {
            height: 100%;
        }

        /* workaround modal-open padding issue */

        body.modal-open {
            padding-right: 0 !important;
        }

        #sidebar {
            padding-left: 0;
        }

        /*
 * Off Canvas at medium breakpoint
 * --------------------------------------------------
 */

        @media screen and (max-width: 48em) {
            .row-offcanvas {
                position: relative;
                -webkit-transition: all 0.25s ease-out;
                -moz-transition: all 0.25s ease-out;
                transition: all 0.25s ease-out;
            }

            .row-offcanvas-left .sidebar-offcanvas {
                left: -33%;
            }

            .row-offcanvas-left.active {
                left: 33%;
                margin-left: -6px;
            }

            .sidebar-offcanvas {
                position: absolute;
                top: 0;
                width: 33%;
                height: 100%;
            }
        }

        /*
 * Off Canvas wider at sm breakpoint
 * --------------------------------------------------
 */

        @media screen and (max-width: 34em) {
            .row-offcanvas-left .sidebar-offcanvas {
                left: -45%;
            }

            .row-offcanvas-left.active {
                left: 45%;
                margin-left: -6px;
            }

            .sidebar-offcanvas {
                width: 45%;
            }
        }

        .card {
            overflow: hidden;
        }

        .card-block .rotate {
            z-index: 8;
            float: right;
            height: 100%;
        }

        .card-block .rotate i {
            color: rgba(20, 20, 20, 0.15);
            position: absolute;
            left: 0;
            left: auto;
            right: -10px;
            bottom: 0;
            display: block;
            -webkit-transform: rotate(-44deg);
            -moz-transform: rotate(-44deg);
            -o-transform: rotate(-44deg);
            -ms-transform: rotate(-44deg);
            transform: rotate(-44deg);
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-primary mb-3">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="flex-row d-flex">
            <a class="navbar-brand mb-1" style="font-size:1.5rem;" href="#">Canvas Solution</a>
            <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./dashboard.php">Home <span class="sr-only">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="collapse">Change Password</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active" style="font-size: 1.1rem;">
                    <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" id="main">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
                <ul class="nav flex-column pl-1">
                    <li class="nav-item"><a class="nav-link" href="#overview">Overview</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Reports ▾</a>
                        <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                            <li class="nav-item"><a class="nav-link" href="./question_reports.php">Question Reports</a></li>
                            <li class="nav-item"><a class="nav-link" href="./answer_reports.php">Answer Reports</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="./users.php">View Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ban Users</a></li>
                </ul>
            </div>
            <!--/col-->

            <div class="col-md-9 col-lg-10 main">

                <!--toggle sidebar button
            <p class="hidden-md-up">
                <button type="button" class="btn btn-primary-outline btn-sm" data-toggle="offcanvas"><i class="fa fa-chevron-left"></i> Menu</button>
            </p>-->
                <span id="overview"></span>
                <h1 class="display-2 hidden-xs-down">
                    All Users
                </h1>
                <p class="lead hidden-xs-down">You can ban a user from using the site here.</p>

                <div class="alert alert-warning" style="display: none;" role="alert" id="myAlert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Changed status of an user!</strong>
                </div>

                <?php
                $sql = "SELECT COUNT(user_id) as 'TOTAL_USERS' FROM user;";
                $result = $conn->query($sql)->fetch_assoc();
                ?>
                <div class="row mb-3">
                    <div class="col-xl-3 col-lg-6 offset-3">
                        <div class="card card-inverse card-success">
                            <div class="card-block bg-success">
                                <div class="rotate">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <h6 class="text-uppercase">Users</h6>
                                <h1 class="display-1"><?php echo $result['TOTAL_USERS']; ?></h1>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT COUNT(user_id) as 'BANNED_USERS' FROM user WHERE banned IS NOT NULL;";
                    $result = $conn->query($sql)->fetch_assoc();
                    ?>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-inverse card-danger">
                            <div class="card-block bg-danger">
                                <div class="rotate">
                                    <i class="fa fa-list fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase">Banned</h6>
                                <h1 class="display-1"><?php echo $result['BANNED_USERS']; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->

                <hr>





                <a id="layouts"></a>
                <hr>
                <h2 class="sub-header">Interesting layouts and elements</h2>
                <div class="row mb-3">

                    <div class="clearfix"></div>
                    <div class="col-lg">
                        <div class="card card-default card-block">
                            <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="" data-target="#tab1" data-toggle="tab">All Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-target="#tab2" data-toggle="tab">Banned Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-target="#tab3" data-toggle="tab">Reported Users</a>
                                </li>
                            </ul>
                            <!--/tabs-->
                            <br>
                            <div id="tabsJustifiedContent" class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="row mb-3">
                                        <div class="col-lg col-md">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>City</th>
                                                            <th>Gender</th>
                                                            <th>Date Registered</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM user;";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            $i = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ++$i; ?></td>
                                                                    <td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['contact']; ?></td>
                                                                    <td><?php echo $row['city']; ?></td>
                                                                    <td><?php echo $row['gender']; ?></td>
                                                                    <td><?php echo $row['date_reg']; ?></td>
                                                                    <td><?php
                                                                        if ($row['banned'] == '') {
                                                                            ?>
                                                                            <a class="changeStatus" data="<?php echo $row['user_id']; ?>" href=""><i style="color:green;" class="fa fa-check-circle fa-1x" aria-hidden="true"></i></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                            <a class="changeStatus" data="<?php echo $row['user_id']; ?>" href=""><i style="color:red;" class="fa fa-times-circle fa-1x" aria-hidden="true"></i></a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="row mb-3">
                                        <div class="col-lg col-md">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact</th>
                                                            <th>City</th>
                                                            <th>Gender</th>
                                                            <th>Date Registered</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM user WHERE banned IS NOT NULL;";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            $i = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ++$i; ?></td>
                                                                    <td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['contact']; ?></td>
                                                                    <td><?php echo $row['city']; ?></td>
                                                                    <td><?php echo $row['gender']; ?></td>
                                                                    <td><?php echo $row['date_reg']; ?></td>
                                                                    <td><?php
                                                                        if ($row['banned'] == '') {
                                                                            ?>
                                                                            <a class="deleteStatus" data="<?php echo $row['user_id']; ?>" href=""><i style="color:green;" class="fa fa-check-circle fa-1x" aria-hidden="true"></i></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                            <a class="deleteStatus" data="<?php echo $row['user_id']; ?>" href=""><i style="color:red;" class="fa fa-times-circle fa-1x" aria-hidden="true"></i></a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="list-group">
                                        <h4>Under Process...</h4>
                                    </div>
                                </div>
                            </div>
                            <!--/tabs content-->
                        </div>
                        <!--/card-->
                    </div>
                    <!--/col-->

                </div>
                <!--/row-->

            </div>
            <!--/main col-->
        </div>

    </div>
    <!--/.container-->
    <footer class="container-fluid">
        <p class="text-right small">©2016-2017 Company</p>
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    Click Yes to Logout!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary-outline" data-dismiss="modal" onclick="document.location.href='./logout.php'">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // sandbox disable popups
        if (window.self !== window.top && window.name != "view1") {
            window.alert = function() {
                /*disable alert*/
            };
            window.confirm = function() {
                /*disable confirm*/
            };
            window.prompt = function() {
                /*disable prompt*/
            };
            window.open = function() {
                /*disable open*/
            };
        }

        // prevent href=# click jump
        document.addEventListener(
            "DOMContentLoaded",
            function() {
                var links = document.getElementsByTagName("A");
                for (var i = 0; i < links.length; i++) {
                    if (links[i].href.indexOf("#") != -1) {
                        links[i].addEventListener("click", function(e) {
                            console.debug("prevent href=# click");
                            if (this.hash) {
                                if (this.hash == "#") {
                                    e.preventDefault();
                                    return false;
                                } else {
                                    /*
                                        var el = document.getElementById(this.hash.replace(/#/, ""));
                                        if (el) {
                                          el.scrollIntoView(true);
                                        }
                                        */
                                }
                            }
                            return false;
                        });
                    }
                }
            },
            false
        );
    </script>

    <!--scripts loaded here-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $("[data-toggle=offcanvas]").click(function() {
                $(".row-offcanvas").toggleClass("active");
            });
        });
    </script>

    <script>
        $('.changeStatus').click(function(e) {
            var elem = $(this);
            e.preventDefault();
            user_id = $(this).attr('data');
            $.ajax({
                type: "GET",
                datatype: "text/html",
                url: "changestatus_script.php",
                data: "user_id=" + user_id,
                cache: false,
                success: function(data) {
                    elem.html(data);
                    $('#myAlert').show('show');
                    // alert(data);
                },
                error: function(jqXHR, exception) {
                    alert('error: ' + eval(jqXHR.status));
                }
            });
        });

        $('.deleteStatus').click(function(e) {
            var elem = $(this);
            e.preventDefault();
            user_id = $(this).attr('data');
            $.ajax({
                type: "GET",
                datatype: "text/html",
                url: "changestatus_script.php",
                data: "user_id=" + user_id,
                cache: false,
                success: function(data) {
                    elem.parent().parent().remove();
                    // alert(data);
                },
                error: function(jqXHR, exception) {
                    alert('error: ' + eval(jqXHR.status));
                }
            });
        });
    </script>

</body>

</html>