<?php
    // DB Connect
    include './config.php';

    // Construct The Query
    if(isset($_GET["movieName"])) {
        $movie = $_GET["movieName"];
        $_SESSION["movieName"] = $movie;
        $sqlMovie = "SELECT * FROM `dsflix`.`movies` WHERE `title` = '$movie'";
        
        // Get The Average Rating for the movie
        $sqlRating = "SELECT AVG(rating) FROM `ratings_comments` WHERE movie_title = '$movie' AND rating > 0";
    } 

    // Find The Movie in DB & Fetch Info
    $result = $conn->query($sqlMovie);
    $avgRating = $conn->query($sqlRating);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $title =  $row["title"];
            $stripped = str_replace(' ', '', $title);
            $genre = $row["genre"];
            $desc = $row["description"];
            $year = $row["year"];
            $director = $row["director"];
            $actors = $row["actors"];
            $runtime = $row["runtime"];
        }
    }
    else {
        echo "0 results";
    }

    if($avgRating->num_rows > 0) {
        while($row = $avgRating->fetch_assoc()) {
            $movieRating = $row["AVG(rating)"];
            $movieRating = round($movieRating, 1);
        }
    } else {
        echo "Cant find Average";
    }

    // Display movie info
    if ((isset($title))) {

        // Movie Cover Image
        echo "<div class='movie-cover'>";
            echo "<img src='../img/covers/$stripped.jpg'>";
        echo "</div>";
        echo "<div class='movie-info'>";

            // Movie Title
            $title = strtoupper($_GET["movieName"]); 
            echo "<h2 id='movie-title'>$title</h2>";
            
            // Movie Description
            echo "<div id='movie-desc'>";            
                echo "<p>$desc</p>";     
            echo "</div>";
            
            // Movie Details
            echo "<div id='movie-details'>";
                echo "<div id='movie-genre'>";
                    echo "<strong >Genre : $genre</strong>"; 
                echo "</div>";
                echo "<div id='movie-director'>";
                    echo "<strong>Director :</strong> $director";
                echo "</div>";
                echo "<div id='movie-date'>";
                    echo "<strong>Date : $year</strong>";
                echo "</div>";
                echo "<div id=movie-actors'>";
                    echo "<strong>Stars : </strong> $actors";
                echo "</div>";
                echo "<div id='movie-length'>";
                    echo "<strong>Runtime : $runtime minutes</strong>";
                echo "</div>";
                echo "<div id='movie-rating'>";
                    echo "<strong>User Rating :</strong> <i class='fa fa-star'></i> $movieRating/8";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    } 
?>