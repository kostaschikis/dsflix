<?php 
    include 'config.php';

    // Get form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $job = mysqli_real_escape_string($conn, $_POST['job']);
        $username = $_POST['username'];
        $password = $_POST['pass'];
    } else {
        header("Location: ../index.html");
        exit();
    }

    // Validate form data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./register_page.php?error=invalidemail&username");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ./register_page.php?error=invalidemail");
        exit();
    } 
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./register_page.php?error=invalidusername");
        exit();
    }
    else { 
        /* MySql Prepared Statements are Used to Avoid SQL Injection */

        // Check if the Username is already taken
        $sqlCheck = "SELECT username FROM accounts WHERE username=?";
        $stmtCheck = mysqli_stmt_init($conn);

        // Check if the statement works 
        if (!mysqli_stmt_prepare($stmtCheck, $sqlCheck)) {
            header("Location: ./register_page.php?error=sqlerror");
        } else {
            mysqli_stmt_bind_param($stmtCheck, "s", $username);
            mysqli_stmt_execute($stmtCheck);
            mysqli_stmt_store_result($stmtCheck);
            $resultCheck = mysqli_stmt_num_rows($stmtCheck);
    
            // if the username is already taken -> exit
            if($resultCheck == 1) {
                header("Location: ./register_page.php?error=usertaken");
                exit();
            } else {

                // if the username isn't taken -> try to store it in DB
                $sql = "INSERT INTO accounts(name, surname, email, age, profession, username, password) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ./register_page.php?error=sqlerror");
                    exit();
                } else {

                    // Hash The Password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssisss", $firstname, $lastname, $email, $age, $job, $username, $hashedPassword);
                    mysqli_stmt_execute($stmt);

                    // Redirect to success page 
                    header("Location: ./success.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } 

?>