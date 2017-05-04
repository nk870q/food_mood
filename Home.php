<?php
include ("config.php");
session_start();
$quote = NULL;
$feels = NULL;
$food = NULL;
$countsad=NULL;
$counttired=NULL;
$countalert=NULL;
$countanx=NULL;
$countstress=NULL;
$counthappy=NULL;

//get session
$profile = $_SESSION['username'];
//get count of sad
$sql3 = "SELECT sad FROM user WHERE username='$profile'";
$result3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$countersad = $row3['sad'];

//get count of stress
$sql3 = "SELECT stress FROM user WHERE username='$profile'";
$result3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$counterstress = $row3['stress'];

//get count of tired
$sql3 = "SELECT tired FROM user WHERE username='$profile'";
$result3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$countertired = $row3['tired'];

//get count of alert
$sql3 = "SELECT alert FROM user WHERE username='$profile'";
$result3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$counteralert = $row3['alert'];

//get count of anxious
$sql3 = "SELECT anxious FROM user WHERE username='$profile'";
$result3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$counteranx = $row3['anxious'];


//retrieve name
$sql = "SELECT name FROM user WHERE username = '$profile'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$userprofile = $row['name'];

//get mood and datavisual
if(isset($_POST['change']) && $_POST['mood'] !='') {
    $feels = mysqli_real_escape_string($db, $_POST["mood"]);
    $_SESSION['feels'] = $feels;
    $sql2 = "SELECT $feels AS col FROM quotes ORDER BY RAND() LIMIT 1";
    $result2 = mysqli_query($db, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $quote = $row2["col"];
    $_SESSION['quote'] = $quote;
    header("location: Mood.php");
    if($_POST['mood'] == 'Sad') {
        $sql3 = "SELECT sad FROM user WHERE username='$profile'";
        $result3 = mysqli_query($db, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $countsad = $row3['sad'];
        $countsad++;
        $sql4 = "UPDATE user SET $feels='$countsad' WHERE username = '$profile'";
        mysqli_query($db,$sql4);
    }
    else if($_POST['mood'] == 'Tired') {
        $sql3 = "SELECT tired FROM user WHERE username='$profile'";
        $result3 = mysqli_query($db, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $counttired = $row3['tired'];
        $counttired++;
        $sql4 = "UPDATE user SET $feels='$counttired' WHERE username = '$profile'";
        mysqli_query($db,$sql4);
    }
    else if($_POST['mood'] == 'Anxious') {
        $sql3 = "SELECT anxious FROM user WHERE username='$profile'";
        $result3 = mysqli_query($db, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $countanx = $row3['anxious'];
        $countanx++;
        $sql4 = "UPDATE user SET $feels='$countanx' WHERE username = '$profile'";
        mysqli_query($db,$sql4);
    }
    else if($_POST['mood'] == 'Alert') {
        $sql3 = "SELECT alert FROM user WHERE username='$profile'";
        $result3 = mysqli_query($db, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $countalert = $row3['alert'];
        $countalert++;
        $sql4 = "UPDATE user SET $feels='$countalert' WHERE username = '$profile'";
        mysqli_query($db,$sql4);
    }
    else if($_POST['mood'] == 'Stress') {
        $sql3 = "SELECT stress FROM user WHERE username='$profile'";
        $result3 = mysqli_query($db, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $countstress = $row3['stress'];
        $countstress++;
        $sql4 = "UPDATE user SET $feels='$countstress' WHERE username = '$profile'";
        mysqli_query($db,$sql4);
    }
    else if($_POST['mood'] == 'Happy') {
        $sql3 = "SELECT happy FROM user WHERE username='$profile'";
        $result3 = mysqli_query($db, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $counthappy = $row3['happy'];
        $counthappy++;
        $sql4 = "UPDATE user SET $feels='$counthappy' WHERE username = '$profile'";
        mysqli_query($db,$sql4);
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="site-assets/assets/css/main.css" />
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/c3/0.1.29/c3.js"></script>
    <link href="/c3.css" rel="stylesheet" type="text/css">

</head>
<body class="landing" >
<form method="post" id="form">

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

    <section id="banner" style="height: 700px; overflow: visible">
        <div class="inner">
            <h2>Food-Mood</h2>
            <p>Bon Appétit <?php echo $userprofile?>!</p>
            <ul class="actions">
                <li><button class="button special" style="cursor: default">How are you feeling?</button></li>
            </ul>

            <center><select name="mood" style="width: auto;align-content: center; height: 30px;"></center>
                <option value="">-- Your Mood --</option>
                <!--<option value="Happy">Happy</option>-->
                <option value="Sad">Sad</option>
                <option value="Tired">Tired</option>
                <option value="Anxious">Anxious</option>
                <option value="Stress">Stress</option>
                <option value="Alert">Alert</option>
            </select>
            <br /><button class="button" type="submit" name="change" id="change" >Click to Change</button>
        </div>
        <a href="#two" class="more scrolly">or Mood for a Pie?</a>
    </section>
</div>
    <section id="two" style="height: 600px; overflow: visible; background-color: rgba(170, 170, 170, 0.7)">
        <div class="inner">
            <br/><br /><center><h1 style="font-size: large">A pie for your week!</h1></center><br />
            <div id="chart">

                <script>
                    var chart = c3.generate({
                        data: {
                            // iris data from R
                            columns: [
                                ["Alert", <?php echo $counteralert ?>],
                                ["Tired", <?php echo $countertired ?>],
                                ["Anxious", <?php echo $counteranx ?>],
                                ['Sad', <?php echo $countersad ?>],
                                ['Stress', <?php echo $counterstress ?>]
                            ],
                            type : 'pie',
                            onclick: function (d, i) { console.log("onclick", d, i); },
                            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                        }
                    });

                   /* setTimeout(function () {
                        chart.load({
                            columns: [
                                ["Alert", <//?php echo $counteralert ?>],
                                ["Tired", <//?php echo $countertired ?>],
                                ["Anxious", <//?php echo $counteranx ?>],
                                ['Sad', <//?php echo $countersad ?>],
                                ['Stress', <//?php echo $counterstress ?>],
                            ]
                        });
                    }, 1500);*/

                    /*setTimeout(function () {
                        chart.unload({
                            ids: 'data1'
                        });
                        chart.unload({
                            ids: 'data2'
                        });
                    }, 2500);*/
                </script>
            </div>
        </div>

    </section>
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