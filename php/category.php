<?php 
    session_start();
    // DB Connect
    include './config.php';

    // Construct The Query
    if(isset($_GET["category"])) {
        $movieCategory = $_GET["category"];
        $_SESSION["movieCategory"] = $movieCategory;
        $sqlMovies = "SELECT * FROM `dsflix`.`movies` WHERE `genre` = '$movieCategory'";
        // $sqlRating = "SELECT AVG(rating) FROM `ratings_comments` WHERE movie_title = '$movie' AND rating > 0";
    } 
    $resultMovies = $conn->query($sqlMovies);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/movie.css">
    <link rel="stylesheet" href="../css/category.css">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="../css/mobile.css">
    <title>DSFLIX | Category</title>
</head>
<body onload="checkBrowserSize(), checkImg()">
    <!-- Sidebar Navigation Menu -->
    <nav>
        <a href="#" onclick="openNav()" >
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
        </a>
    </nav>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php
            // User Name
            if(isset($_SESSION["logStatus"])) {
                if($_SESSION["logStatus"] == true) {
                    echo "<a href='#' class='user'><i class='fas fa-user'></i> " . $_SESSION['Username'] . "</a>";
                }
            }
        ?>
        <a href="../index.html"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#" onclick="showCategories()" class="dropdown dropbtn"><i class="fa fa-list-alt "></i> Categories</a>
            <div id="categories" class="dropdown-content">
                <a href="./category.php?category=Action">Action</a>
                <a href="./category.php?category=Fantasy">Fantasy</a>
                <a href="./category.php?category=Sci-Fi">Sci-fi</a>
                <a href="./category.php?category=Horror">Horror</a>
                <a href="./category.php?category=Mystery">Mystery</a>
                <a href="./category.php?category=Documentary">Documentary</a>
            </div>
        <?php
            // Logout Button
            if(isset($_SESSION["logStatus"])) {
                if($_SESSION["logStatus"] == true) {
                    echo "<a href='./logout.php'><i class='fas fa-sign-out-alt'></i> Logout</a>";
                }
            }
        ?>
    </div>

    <div id="main">
        <?php
            echo "<h2>".strtoupper($movieCategory)."</h2>";
        ?>
        <section id="movies">
            <?php 
                if($resultMovies->num_rows > 0){

                    // For Every Movie Found
                    while($row = $resultMovies->fetch_assoc()) {

                        // Get The Data
                        $title =  $row["title"];
                        $strippedTittle = str_replace(' ', '', $title);
                        $desc = $row["description"];
                        $year = $row["year"];

                        // Find The Movie Rating
                        $sqlRating = "SELECT AVG(rating) FROM `ratings_comments` WHERE movie_title = '$title' AND rating > 0";
                        $avgRating = $conn->query($sqlRating);
                        if($avgRating->num_rows > 0) {
                            while($row = $avgRating->fetch_assoc()) {
                                $movieRating = $row["AVG(rating)"];
                                $movieRating = round($movieRating, 1);
                            }
                        } else {
                            echo "Cant find Average";
                        }

                        // Display The Movie Info Box
                        echo"<div class='movie'>
                                <a href='./movie.php?movieName=$title'>
                                    <img src='../img/covers/$strippedTittle.jpg' class='resize'>
                                </a>
                                <div id='info-box'>
                                    <img src='../img/covers/$strippedTittle.jpg' class='resize'>
                                    <div id='misc'>
                                        <p class='review'>$desc</p>
                                        <div id='movie-rating'>
                                            <strong>User Rating :</strong> <i class='fa fa-star'></i> $movieRating/8
                                        </div>
                                    </div>    
                                </div>
                            </div>";   
                    }
                }        
               
            ?>
    </div>
    <footer class="footer-register">
        <p>Copyright &copy; 2019, DSFLIX, All Rights Reserved</p>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>