<?php
    require('../config/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE username='$username'
                    AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            $msg = "<p class='error'>Incorrect Username / password.</p>";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="form">
            <div class="container">
                <div class="logo">
                    <img src="../images/dg_logo.png" alt="">
                </div>
                <h3>Adminstrator Login</h3>
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Username" autofocus="true"/>
                    <input type="password" name="password" id="password" placeholder="Password"/><img src="../images/show.png" id="img1" onclick="showp()"><img src="../images/hide.png" id="img1a" onclick="hidep()"> 
                    <input type="submit" value="Login" class="loginbtn">
                </form>
                <?php
                if(!empty($msg)):
                ?>
                <?php
                echo $msg;
                ?>

                <?php
                endif;
                ?>
            </div>
        </div>
    </main>

    <script src="../js/script.js"></script>
</body>
</html>