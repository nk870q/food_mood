<?php
include ("config.php");
session_start();

if(!isset($_SESSION['name'])){
    $profile = $_SESSION['username'];
}
else{
    $_SESSION['username'] = $_SESSION['name'];
    $profile = $_SESSION['username'];
}
$sql = "SELECT * FROM user WHERE username = '$profile'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$userprofile = $row['name'];
$mailid = $row['email'];

?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $userprofile?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="site-assets/assets/css/main.css" />

</head>
<body class="landing" >
<form method="post" action="Diary.php" name="form">
    <script>
        $('form').submit(function (evt) {
            evt.preventDefault(); //prevents the default action

        }
    </script>
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
        <section id="banner" style="height: 650px; overflow: visible">
            <div class="inner">
                <h1 style="font-size: 30px">What did you eat today?</h1>
                <br/><label style="width: auto;align-content: center; float: left; margin: 5px 10px 0px 20px; font-family: AppleGothic; font-size: medium">Meal Time: </label>
                <select name="time" style="width: auto;height: auto;align-content: center;float: left" >
                    <option value="none">----</option>
                    <option value="break">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                </select><br />
                <br/><label style="width: auto;align-content: center; float: left; margin: 5px 10px 0px 20px; font-family: AppleGothic; font-size: medium">Food: </label>
                <select name="food" style="width: auto;height: auto;align-content: center;float: left" >
                    <option value="none">----</option>
                    <option value="eggs">Eggs</option>
                    <option value="bacon">Bacon</option>
                    <option value="pancakes">Pancakes</option>
                    <option value="Yogurt">Yogurt</option>
                    <option value="chicken">Chicken</option>
                    <option value="bread">Bread</option>
                    <option value="Fish">Fish</option>
                    <option value="veggies">Veggies</option>
                </select><br />
                <br/><label style="width: auto;align-content: center; float: left; margin: 5px 10px 0px 20px; font-family: AppleGothic; font-size: medium">Fruits: </label>
                <select name="fruits" style="width: auto;height: auto;align-content: center;float: left" >
                    <option value="none">----</option>
                    <option value="apples">Apples</option>
                    <option value="orange">Orange</option>
                    <option value="banana">Banana</option>
                    <option value="berries">Berries</option>
                    <option value="grapefruit">Grapefruit</option>
                    <option value="melons">Melons</option>
                    <option value="kiwi">Kiwi</option>
                </select><br />
                <br/><label style="width: auto;align-content: center; float: left; margin: 5px 10px 0px 20px; font-family: AppleGothic; font-size: medium">Drinks: </label>
                <select name="drink" style="width: auto;height: auto;align-content: center;float: left" >
                    <option value="none">----</option>
                    <option value="tea w/ milk">Tea w/ Milk</option>
                    <option value="coffee w/ milk">Coffee w/ Milk</option>
                    <option value="green tea">Green Tea</option>
                    <option value="black coffee">Black Coffee</option>
                    <option value="juice">Juice</option>
                    <option value="milk">Milk</option>
                    <option value="soymilk">Soymilk</option>
                    <option value="soda">Soda</option>
                </select><br />
                <br/><label style="width: auto;align-content: center; float: left; margin: 5px 10px 0px 20px; font-family: AppleGothic; font-size: medium">Glasses of Water(Day): </label>
                <select name="water " style="width: auto;height: auto;align-content: center;float: left" >
                    <option value="none">----</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="more than 8">8+</option>
                </select><br />
                <br/><button name="save" class="button special" style="float: left; margin: 5px 10px 0px 20px">Save</button>

            </div>
        </section>

        <!-- Banner -->

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