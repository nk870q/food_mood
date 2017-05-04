<?php
include ("config.php");
$profile = $_SESSION['username'];
//get the medical condition
$sql1 = "SELECT medical from user WHERE username='$profile'";
$result1 = mysqli_query($db,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$mc = $row1['medical'];
$feeling = $_SESSION['feels'];
if($mc == 'diabetes'){
    //get the food nutrients
    $sql2 = "SELECT foodname FROM moodfood WHERE mood='$feeling' AND carbs='no' ORDER BY RAND() LIMIT 4";
    $result2 = mysqli_query($db, $sql2);
    //if(isset($_POST['change']) && $_POST['mood'] != ''){
        if(mysqli_num_rows($result2)>0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $food = $row2['foodname'];
                //get food information
                $sql3 = "SELECT foodinfo FROM moodfood WHERE foodname='$food'";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $fooddetails = $row3['foodinfo'];
                echo '<li>';
                echo '<h3 style="text-transform: uppercase; font-family: AppleGothic;font-size: 15px; font-weight: bolder">' . $food . '</h3>';
                echo '<p style="font-family: AppleGothic;font-size: 12px">' . $fooddetails . '</p>';
                //echo '<p style="font-family: AppleGothic;font-size: 12px"><strong>'.$weight.'</strong></p>';
                echo '</li>';
            }
        }
    //}
}
else if($mc == 'cholesterol'){
    //get the food nutrients
    $sql2 = "SELECT foodname FROM moodfood WHERE mood='$feeling' AND cholesterol='no' ORDER BY RAND() LIMIT 4";
    $result2 = mysqli_query($db, $sql2);
    //if(isset($_POST['change']) && $_POST['mood'] != ''){
        if(mysqli_num_rows($result2)>0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $food = $row2['foodname'];
                //get food information
                $sql3 = "SELECT foodinfo FROM moodfood WHERE foodname='$food'";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $fooddetails = $row3['foodinfo'];
                echo '<li>';
                echo '<h3 style="text-transform: uppercase; font-family: AppleGothic;font-size: 15px; font-weight: bolder">' . $food . '</h3>';
                echo '<p style="font-family: AppleGothic;font-size: 12px">' . $fooddetails . '</p>';
                //echo '<p style="font-family: AppleGothic;font-size: 12px"><strong>'.$weight.'</strong></p>';
                echo '</li>';
            }
        }
    //}
}
else if($mc == 'lactose'){
    //get the food nutrients
    $sql2 = "SELECT foodname FROM moodfood WHERE mood='$feeling' AND lactose='no' ORDER BY RAND() LIMIT 4";
    $result2 = mysqli_query($db, $sql2);
    //if(isset($_POST['change']) && $_POST['mood'] != ''){
        if(mysqli_num_rows($result2)>0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $food = $row2['foodname'];
                //get food information
                $sql3 = "SELECT foodinfo FROM moodfood WHERE foodname='$food'";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $fooddetails = $row3['foodinfo'];
                echo '<li>';
                echo '<h3 style="text-transform: uppercase; font-family: AppleGothic;font-size: 15px; font-weight: bolder">' . $food . '</h3>';
                echo '<p style="font-family: AppleGothic;font-size: 12px">' . $fooddetails . '</p>';
                //echo '<p style="font-family: AppleGothic;font-size: 12px"><strong>'.$weight.'</strong></p>';
                echo '</li>';
            }
        }
    //}
}
else if($mc == 'allergic'){
    //get the food nutrients
    $sql2 = "SELECT foodname FROM moodfood WHERE mood='$feeling' AND allergy='no' ORDER BY RAND() LIMIT 4";
    $result2 = mysqli_query($db, $sql2);
    //if(isset($_POST['change']) && $_POST['mood'] != ''){
    if(mysqli_num_rows($result2)>0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $food = $row2['foodname'];
            //get food information
            $sql3 = "SELECT foodinfo FROM moodfood WHERE foodname='$food'";
            $result3 = mysqli_query($db, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $fooddetails = $row3['foodinfo'];
            echo '<li>';
            echo '<h3 style="text-transform: uppercase; font-family: AppleGothic;font-size: 15px; font-weight: bolder">' . $food . '</h3>';
            echo '<p style="font-family: AppleGothic;font-size: 12px">' . $fooddetails . '</p>';
            //echo '<p style="font-family: AppleGothic;font-size: 12px"><strong>'.$weight.'</strong></p>';
            echo '</li>';
        }
    }
    //}
}
else if($mc == 'celiac'){
    //get the food nutrients
    $sql2 = "SELECT foodname FROM moodfood WHERE mood='$feeling' ORDER BY RAND() LIMIT 4";
    $result2 = mysqli_query($db, $sql2);
    //if(isset($_POST['change']) && $_POST['mood'] != ''){
        if(mysqli_num_rows($result2)>0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $food = $row2['foodname'];
                //get food information
                $sql3 = "SELECT foodinfo FROM moodfood WHERE foodname='$food'";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $fooddetails = $row3['foodinfo'];
                echo '<li>';
                echo '<h3 style="text-transform: uppercase; font-family: AppleGothic;font-size: 18px; font-weight: bolder">' . $food . '</h3>';
                echo '<p style="font-family: AppleGothic;font-size: 15px">' . $fooddetails . '</p>';
                //echo '<p style="font-family: AppleGothic;font-size: 12px"><strong>'.$weight.'</strong></p>';
                echo '</li>';
            }
        }
    //}
}
else if($mc == 'none'){
    //get the food nutrients
    $sql2 = "SELECT foodname FROM moodfood WHERE mood='$feeling' ORDER BY RAND() LIMIT 4";
    $result2 = mysqli_query($db, $sql2);
    //if(isset($_POST['change']) && $_POST['mood'] != ''){
        if(mysqli_num_rows($result2)>0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $food = $row2['foodname'];
                //get food information
                $sql3 = "SELECT foodinfo FROM moodfood WHERE foodname='$food'";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $fooddetails = $row3['foodinfo'];
                echo '<li>';
                echo '<h3 style="text-transform: uppercase; font-family: AppleGothic;font-size: 15px; font-weight: bolder">' . $food . '</h3>';
                echo '<p style="font-family: AppleGothic;font-size: 12px">' . $fooddetails . '</p>';
                //echo '<p style="font-family: AppleGothic;font-size: 12px"><strong>'.$weight.'</strong></p>';
                echo '</li>';
            }
        }
    //}
}
?>