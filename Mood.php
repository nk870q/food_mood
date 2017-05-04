<?php
include ("config.php");
session_start();
$quote = NULL;
$feels = NULL;
$food = NULL;
//get session
$profile = $_SESSION['username'];
//retrieve name
$sql = "SELECT name FROM user WHERE username = '$profile'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$userprofile = $row['name'];
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Your Mood</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="site-assets/assets/css/main.css" />

</head>
<body class="landing" >
<form method="post" action="Home.php" name="form">
    <!-- Page Wrapper -->
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1><a href="Home.php">Food-Mood</a></h1>
            <nav id="nav">
                <ul>
                    <li class="special">
                        <a href="#menu" class="menuToggle"><span>Menu</span></a>
                        <div id="menu">
                            <ul>
                                <li><a href="#"><?php echo $userprofile?></a></li>
                                <li><a href="Home.php">Home</a></li>
                                <li><a href="Diary.php">Diary</a></li>
                                <li><a href="Snake.php">Stress Reliever</a> </li>
                                <li><a href="Testfail.php">Logout</a> </li>
                            </ul>

                        </div>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Banner -->


        <section id="three" class="wrapper style3 special">
            <div class="inner" id="mooddetails">
                <header class="major">

                    <h2><?php echo $_SESSION['feels']?></h2>
                    <p style="text-transform: uppercase;"><strong><?php echo $_SESSION['quote']?></strong></p>
                </header>
                <ul class="features" id="fooddisplay">
                    <?php include("FoodDisplay.php") ?>
                </ul>
            </div>

        </section>
    </div>
    <!-- Scripts -->
    <script src="site-assets/assets/js/jquery.min.js"></script>
    <script src="site-assets/assets/js/jquery.scrollex.min.js"></script>
    <script src="site-assets/assets/js/jquery.scrolly.min.js"></script>
    <script src="site-assets/assets/js/skel.min.js"></script>
    <script src="site-assets/assets/js/util.js"></script>
    <script src="site-assets/assets/js/main.js"></script>

</form>
</body>
</html>