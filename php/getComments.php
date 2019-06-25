<?php
    // DB connect
    include './config.php';

    // Construct The Query
    if(isset($_GET["movieName"])) {
        $movie = $_GET["movieName"];
        $sql = "SELECT * FROM `dsflix`.`ratings_comments` WHERE `movie_title` = '$movie'";
        $result = $conn->query($sql);
    }

    // Insert result into an array 
    for ($set = array(); $row = $result->fetch_assoc(); $set[] = $row);
    
    // Print comments and ratings
    foreach($set as $row) {
        $user = $row["user"];
        $rating = $row["rating"];
        $comment = $row["comment"];
        echo "<li class='comment user-comment'>
                <div class='info'>";
                if($rating != 0) {
                    echo"<div class='user-rating'>
                            <span class='fa fa-star checked'></span> <span class='number text-md'>$rating/8</span>
                        </div>";
                }        
                echo "<a href='#'>$user</a>
                </div>";
        if($comment != null) {
            echo "<p>$comment</p>";
        } 
        echo "</li>";     
    }
?>