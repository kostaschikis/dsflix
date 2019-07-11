<?php
    include './config.php';
    session_start();

    // Get Rating
    if(isset($_POST ['rate'])) {
        $rate = $_POST ['rate'];
    } else {
        $rate = null;
    }

    // Get Comment
    if(isset($_POST['comment'])) {
        $comment = $_POST['comment'];
    } else {
        $comment = "";
    }

    // Get Username & Movie
    $username = $_SESSION["Username"];
    $movie = $_SESSION["movieName"];

    // Insert Rating and Comment to Database
    $sql = "INSERT INTO ratings_comments (movie_title, user, rating, comment) VALUES ('$movie', '$username', '$rate', '$comment')";
    $result = $conn->query($sql);
    if($result === TRUE) {
        echo "New record created successfully";
        header("Location: /dsflix/php/movie.php?movieName=$movie");
    }    
    else {    
        echo "Error inserting record: " . $conn->error;
    }

?>