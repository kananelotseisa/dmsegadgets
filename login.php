<?php
    require('./config/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['member_id'])) {
        $member_id = stripslashes($_REQUEST['member_id']);    // removes backslashes
        $member_id = mysqli_real_escape_string($con, $member_id);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `distributor` WHERE `member_id`='$member_id' AND password='" . md5($password) . "'";
        $select = mysqli_query($con,$query);
        $row = mysqli_fetch_array($select);

        $select2  = mysqli_query($con,$query);
        $checkuser = mysqli_num_rows($select2);
        if ($checkuser == 1) {
            session_start();
            $status = $row['status'];
            $_SESSION['member_id'] = $member_id;
            if ($status=="approved") 
            {
                header("location:dashboard.php");
            } 
            elseif ($status=="pending") 
            {
                header("location:pending.php");
            } 
        }
        
        else{
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
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/login_and_register.css">
    <title>Login</title>
</head>

<body>
    <header>
        <nav>
            <img src="images/dg_logo.png" alt="">
            <ul>
                <li><a href="./#welcome"  onclick="home()">Home</a></li>
                <li><a href="./#mission"  onclick="mission()">Mission</a></li>
                <li><a href="./#earn"  onclick="earn()">How to earn</a></li>
                <li><a href="./#services"  onclick="services()">Services</a></li>
            </ul>
            <div class="registerbtn">
                    <a href="request.php" class="registerbtn">Request</a>
                    <span class="Border-TopBottom"></span>
                    <span class="Border-LeftRight"></span>
                  </div>
        </nav>
    </header>
    <main>
        <div class="form">
            <div class="container">
                <div class="logo">
                    <img src="./images/dg_logo.png" alt="">
                </div>
                <h3>Login</h3>
                <form action="" method="post">
                    <input type="text" name="member_id" placeholder="Membership Number" autofocus="true"/>
                    <input type="password" name="password" id="password" placeholder="Password"/><img src="./images/show.png" id="img2" onclick="showpp()"><img src="./images/hide.png" id="img2a" onclick="hidepp()"> 
                    <input type="submit" value="Login" class="loginbtn">
                    <p>Do not have an account?</p>
                    <div class="btn1">
                    <button class="requestbtn"><a href="request.php">Request</a></button>
                    </div>
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


    <script src="./js/showpp.js"></script>
</body>
</html>