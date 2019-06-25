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
    <link rel="stylesheet" media="screen and (max-width:768px)" href="../css/mobile.css">
    <title>DSFLIX | REGISTER</title>
</head>
<body onload="scrollFix(), checkBrowserSize()">
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
    </div>
    <div id="main">
        <!-- Showcase -->
        <div class="showcase-register">
            <!-- Sign Up -->
            <section id="sign-up" class="showcase-content">

                <form class="login-content" action="./register.php" method="POST">
                    <div class="login-container">
                        <h2 class="text-lg">Sign Up</h2>
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "invalidemail&username") {
                                    echo "<p class=error>Invalid Username Or Email<p>";
                                } else if ($_GET["error"] == "invalidemail") {
                                    echo "<p class=error>Invalid Email<p>";
                                } else if ($_GET["error"] == "invalidusername") {
                                    echo "<p class=error>Invalid Username<p>";
                                } else if ($_GET["error"] == "usertaken") {
                                    echo "<p class=error>Username Already Taken<p>";
                                }
                            }
                        ?>
                        <!-- <hr> -->
                        <div class="cr-group">
                            <label for="firstname" class="label">Name</label>
                            <input name="firstname" type="text" class="input" required>
                        </div>
                        <div class="cr-group">
                            <label for="lastname" class="label">Surname</label>
                            <input name="lastname" type="text" class="input" data-type="text" required>
                        </div>
                        <div class="cr-group">
                            <label for="email" class="label">Email</label>
                            <input name="email" type="email" class="input" data-type="email" required>
                        </div>
                        <div class="cr-group">
                            <label for="age" class="label">Age</label>
                            <input name="age" type="number" class="input" data-type="number" required>
                        </div>
                        <div class="cr-group">
                            <label for="job" class="label">Job</label>
                            <input name="job" type="text" class="input" data-type="text" required>
                        </div>
                        <div class="cr-group">
                            <label for="user" class="label">Username</label>
                            <input name="username" type="text" class="input" data-type="text" required>
                        </div>
                        <div class="cr-group">
                            <label for="pass" class="label">Password</label>
                            <input name="pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="cr-group">
                            <input type="submit" name="submit-signup" class="button" class="btn" value="SignUp">
                        </div> 
                    </div>  
                    <div class="misc-container">
                        <span class="psw" class="text-md">By creating an account you agree to our<a href="#" class="text-md"> Terms & Privacy</a></span>
                    </div>
                </form>
                
            </section>
        </div> 
        <footer class="footer-register">
            <p>Copyright &copy; 2019, DSFLIX, All Rights Reserved</p>
        </footer>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>


