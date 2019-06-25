<?php
    $_SESSION["commentAuth"] = true;
    // DB Connect
    include './config.php';

    // Get Movie Name
    if(isset($_GET["movieName"])) {
        $movie = $_GET["movieName"];
    } 

    // Get Username
    if(isset($_SESSION["Username"])) {
        $username = $_SESSION["Username"];
    }

    // Query | Find if the selected user has already commented at this movie
    $sql = "SELECT comment FROM `ratings_comments` WHERE `movie_title` = '$movie' AND `user` = '$username'" ;
    $result = $conn->query($sql);

    // if the user has a comment at this movie -> Disable commenting
    if($result->num_rows > 0) {
        $_SESSION["commentAuth"] = false;
    }

?>