<?php
include ("./config/db.php");
if (isset($_POST['request'])) {
    $member_id = stripslashes($_REQUEST['member_id']);    // removes backslashes
    $member_id = mysqli_real_escape_string($con, $member_id);
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con, $name);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $create_datetime = date("Y-m-d H:i:s");

    $select  = "SELECT * FROM `distributor` WHERE `member_id` = '$member_id'";
    $result = mysqli_query($con , $select);

    if (mysqli_num_rows($result) > 0 ) {
        echo "<script>alert('Membership ID taken, reload to create new')</script>";
    } else {
        $register = "INSERT INTO `distributor`(`member_id`, `name`, `email`, `password`, `status`,`create_datetime`) 
        VALUES ('$member_id','$name','$email', '" . md5($password) . "','pending','$create_datetime')";
        
        mysqli_query($con,$register);
        header("Location: pending.php");
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
    <title>Request</title>
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
                <div class="btn">
                  <a href="login.php" class="btn">Login</a>
                  <span class="BorderTopBottom"></span>
                  <span class="BorderLeftRight"></span>
                </div>
        </nav>
    </header>
    <main>
        <div class="form1">
            <div class="container">
                <div class="logo">
                    <img src="./images/dg_logo.png" alt="">
                </div>
                <h3>Request</h3>

                <form action="" method="post">
                    <div>
                        <!--member is generated automaticaly by javascript on page reload , ref js/script.js-->
                        <div class="id">
                        <label for="member_id">Membership ID</label>
                        <input type="text" name="member_id" id="member_id" readonly/>
                        </div>
                    
                        <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" required/>
                        </div>
                    </div>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="example@gmail.com" required/>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="*****" required/><img src="./images/show.png" id="img1" onclick="showp()"><img src="./images/hide.png" id="img1a" onclick="hidep()"> 
                    <div class="btn1">
                    <input type="submit" name="request" value="Request" class="requestbtn">
                    </div>
                    
                    <p>Already have an account?</p>
                    <div class="btn1">
                    <button class="loginbtn"><a href="login.php">Login</a></button>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <script src="./js/script.js"></script>
</body>
</html>