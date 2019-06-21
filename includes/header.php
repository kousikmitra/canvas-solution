<?php
$sql = mysqli_query($con, "SELECT name, photo FROM user WHERE user_id={$_SESSION['user_id']}") or die(mysqli_error($con));
$user = mysqli_fetch_array($sql);
$user_name = $user['name'];
$user_photo = $user['photo'];
?>

<div class="">
    <input type="checkbox" name="menu-handler" class="check_handler" id="menu-handler" onclick="null" />
    <div class="mobile-nav">
        <nav class="navbar navbar-coco navbar-solid navbar-fixed-top" style="box-shadow: 1px 0px 10px 0px rgba(0, 0, 0, 0.3);">
            <div class="container in-page-scroll">
                <!--<div class="navbar-header-mobile">
				<a class="navbar-brand" href="">
				<img src="" alt="logo">
				</a>
        </div>-->
                <label id="navMenu" for="menu-handler" class="toggle menu">
                    <span class="menu-line"></span>
                    <span class="menu-line"></span>
                    <span class="menu-line"></span>
                </label>
                <label for="menu-handler" id="closeNavMenu" class="toggle close"></label>
                <div class="navbar-center">
                    <div class="centered-logo" style="left:0">
                        <div class="navbar-header-regular">
                            <a href="index.php" class="h2" style="color:white;">Canvas Solution</a>
                        </div>
                    </div>
                    <ul class="nav navbar-nav center cl-effect-5">
                        <li id="menu-item-1361" class="menu-item menu-item-type-custom menu-item-object-custom "><a href="index.php"><span data-hover="Home" class="h">Home</span></a></li>
                        <?php if (!isset($_SESSION['user_id'])) { ?>
                            <li id="menu-item-1369" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown-toggle "><a href="#"><span data-hover="Registration" class="h">Registration</span></a>
                                <ul class="dropdown-menu menu-odd  menu-depth-1" style="background-color:#ac8b40;color:#ac8b40">
                                    <li id="menu-item-1367" class="menu-item menu-item-type-post_type menu-item-object-page " style="background-color:#ac8b40"><a href="signup.php"><span data-hover="Sign Up" class="hs">Sign Up</span></a></li>
                                    <li id="menu-item-1368" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="login.php"><span data-hover="Log In" class="hs">Log In</span></a></li>
                                </ul>
                            </li>
                            <li id="menu-item-1362" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="#"><span data-hover="About Us" class="h">About Us</span></a></li>
                            <li id="menu-item-1370" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown-toggle "><a href="#"><span data-hover="Contact Us" class="h">Contact Us</span></a>
                                <ul class="dropdown-menu menu-odd  menu-depth-1">
                                    <li id="menu-item-1366" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="#facts"><span data-hover="Facts" class="hs">Contact Us</span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <li id="menu-item-1362" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="myqueries.php"><span data-hover="My Queries" class="h">My Queries</span></a></li>
                            <li id="menu-item-1362" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="unanswered.php"><span data-hover="Unanswered" class="h">Unanswered</span></a></li>
                            <li id="menu-item-1369" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown-toggle ">
                                <a href="#"><span data-hover="My Profile" class="h"><img src="<?php echo $user_photo; ?>" width="25" height="25" alt=""> <?php echo $user_name; ?></span></a>
                                <ul class="dropdown-menu menu-odd  menu-depth-1" style="background-color:#ac8b40;color:#ac8b40">
                                    <li id="menu-item-1367" class="menu-item menu-item-type-post_type menu-item-object-page " style="background-color:#ac8b40"><a href="profile.php"><span data-hover="My Profile" class="hs">My Profile</span></a></li>
                                    <li id="menu-item-1368" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="profile_edit.php"><span data-hover="Edit Profile" class="hs">Edit Profile</span></a></li>
                                </ul>
                            </li>
                            <li id="menu-item-1362" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="logout.php"><span data-hover="Log Out" class="h">Log Out</span></a></li>

                            <li id="menu-item-1362" class="menu-item menu-item-type-post_type menu-item-object-page" style="margin-left: 25px;padding-top:45px !important; float: right !important;">
                                <form class="form-inline my-lg-0" method="post" action="index.php">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search By Keywords(Python/Web Development ...)" name="search" required="true" aria-label="Search" autocomplete="off">
                                    <button style="background: rgb(200, 122, 252); border-color: white; font-weight: bold;" class="btn btn-primary my-2 my-sm-0" type="submit" name="post">Search</button>
                                </form>
                            </li>
                        <?php } ?>

                    </ul>




                </div>
            </div>
        </nav>
    </div>
</div>
<style>
    .navbar {
        min-height: 100px;
    }
</style>