<?php
    include 'config.php';
    
    // Get form data
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-signin"])) { 
        $username = $_POST['username'];
        $password = $_POST['password'];
    } else {
        header("Location: ../index.html");
        exit();
    }

    // Check Username
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./register_page.php?error=invalidusername");
        exit();
    }
    else { 
        // Check if that username exist in DB 
        $sql = "SELECT * FROM accounts WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ./register_page.php?error=sqlerror");
            exit();
        } else {

            // Get the row that contain the user's info
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            // Store row's data
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) { 

                // Verify the password
                $hash = $row['password'];
                if (password_verify($password, $hash)) {

                    // Start a session and store some data about the user
                    session_start();
                    $_SESSION["Username"] = $username;
                    $_SESSION["logStatus"] = true;
                    header("Location: ../index.html");
                    exit();
                    
                } else {
                    header("Location: ../index.html?error=wrongpass");
                    exit();
                }
            } else {
                header("Location: ../index.html?error=nouser");
                exit();
            }
        } 
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>