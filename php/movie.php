<?php session_start()?>
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
    <link rel="stylesheet" media="screen and (max-width:768px)" href="../css/mobile.css">
    <link rel="shortcut icon" href="./img/favicon.png">
    <title>Movie | Info</title>
</head>
<body onload="checkBrowserSize()">
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
        <!-- About The Movie -->
        <section class="movie-about text-md">
            <?php include 'movieInfo.php';?>    
        </section>
        <!-- Comment Section -->
        <ul class="comment-section">
            <?php include 'getComments.php'?>   
            <!-- Rate & Comment Movie -->
            <?php include 'checkUser.php'?> 
            <li class="write-new">
                <form action='./insertCommentRating.php' method="post">
                    <?php
                        if(isset($_SESSION["logStatus"])) {
                            if($_SESSION["logStatus"] == true && $_SESSION["commentAuth"] == true) {
                                echo"<div class='form-rating text-md'>
                                        <input type='radio' id='star8' name='rate' value='8' />
                                        <label for='star8'>8 stars</label>
                                        <input type='radio' id='star7' name='rate' value='7' />
                                        <label for='star7'>7 stars</label>
                                        <input type='radio' id='star6' name='rate' value='6' />
                                        <label for='star6'>6 stars</label>
                                        <input type='radio' id='star5' name='rate' value='5' />
                                        <label for='star5'>5 stars</label>
                                        <input type='radio' id='star4' name='rate' value='4' />
                                        <label for='star4'>4 stars</label>
                                        <input type='radio' id='star3' name='rate' value='3' />
                                        <label for='star3'>3 stars</label>
                                        <input type='radio' id='star2' name='rate' value='2' />
                                        <label for='star2'>2 stars</label>
                                        <input type='radio' id='star1' name='rate' value='1' />
                                        <label for='star1'>1 star</label>
                                    </div>";
                                echo"<textarea placeholder='Write your comment here' name='comment' cols='50' rows='3'></textarea>";
                                echo"<div>
                                        <button type='submit' class='btn' onclick='checkVal()'>Submit</button>
                                    </div>";
                            }
                        } else {
                            echo"<div class='form-rating text-md disabled'>
                                    <input type='radio' id='star8' name='rate' value='8' />
                                    <label for='star8' disabled>8 stars</label>
                                    <input type='radio' id='star7' name='rate' value='7' />
                                    <label for='star7' disabled>7 stars</label>
                                    <input type='radio' id='star6' name='rate' value='6' />
                                    <label for='star6'>6 stars</label>
                                    <input type='radio' id='star5' name='rate' value='5' />
                                    <label for='star5'>5 stars</label>
                                    <input type='radio' id='star4' name='rate' value='4' />
                                    <label for='star4'>4 stars</label>
                                    <input type='radio' id='star3' name='rate' value='3' />
                                    <label for='star3'>3 stars</label>
                                    <input type='radio' id='star2' name='rate' value='2' />
                                    <label for='star2'>2 stars</label>
                                    <input type='radio' id='star1' name='rate' value='1' />
                                    <label for='star1'>1 star</label> 
                                </div>";
                            echo"<textarea placeholder='Please Login To Insert a Comment' name='comment' cols='50' rows='3' disabled></textarea>";
                        }
                    ?>
                </form>
            </li>
        </ul>
    </div>
    <footer class="footer-register">
        <p>Copyright &copy; 2019, DSFLIX, All Rights Reserved</p>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>