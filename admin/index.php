<?php
include("../config/db.php");
include("../config/auth_session_admin.php");
//upload stock
if (isset($_POST['upload'])) 
    {

        //product desc 
        $title    = stripslashes($_REQUEST['name']);
        $title    = mysqli_real_escape_string($con, $title);
        $description    = stripslashes($_REQUEST['description']);
        $description    = mysqli_real_escape_string($con, $description);
        $price   = stripslashes($_REQUEST['price']);
        $price   = mysqli_real_escape_string($con, $price);
        $points   = stripslashes($_REQUEST['points']);
        $points   = mysqli_real_escape_string($con, $points);
        //image desc
        $image = time().'_'.$_FILES['image']['name'];
        $target = '../images/stock/uploaded/' .$image;
        
       if( move_uploaded_file($_FILES['image']['tmp_name'],$target))
       {
             $query = "INSERT INTO `gadgets`(`image`, `name`, `description`, `price`, `points`) 
            VALUES ('$image','$title','$description','$price','$points')";

            if (mysqli_query($con, $query)) 
            {
                $msg = "<p class='warning'>product added.</p>";
            }
            else 
            {
                $msg = "<p class='warning2'>Failed to upload  to database.</p>";
            }
       }
       else
       {
        $msg = "<p class='warning2'>Required fields are missing.</p>";
       }
    }
    $query = "SELECT * FROM `distributor` WHERE `status`='pending' ORDER BY `create_datetime` ASC";
    $result = mysqli_query($con, $query);
    //approve new user
    if (isset($_POST['approve'])) {
        $member_id = $_POST['approve'];
        $select = "UPDATE `distributor` SET `status` ='approved' WHERE `member_id` = '$member_id'";
        
        $result1 = mysqli_query($con, $select);
        if ($result1) {
            header("location:index.php");
        }
    }

    //deny new user
    if (isset($_POST['deny'])) {
        $member_id = $_POST['deny'];
        $select = "UPDATE `distributor` SET `status` ='deny' WHERE `member_id` = '$member_id'";
        
        $result1 = mysqli_query($con, $select);
        if ($result1) {
            header("location:index.php");
        }
    }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=d">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <!--floating div hidden. shown by javascript using showdiv() function in admin.js-->
    <div id="floatstock">
        <div class="container">
            <div class="form">
                <p id="button" onclick="closediv()">&times;</p>
                <h1 class="head">Add Stock</h1>
                <?php
                if(!empty($msg)):
                ?>
                <?php
                echo $msg;
                ?>

                <?php
                endif;
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                <label for="image">Product photo</label>
                    <div><input type="file" name="image" id="" class="icon" placeholder=""></div>
                    <div><label for="name">Title:</label><input type="text" name="name" id=""></div>
                    <div><label for="desc">Description:</label><input type="text" name="description" id=""></div>
                    <div class="nums">
                        <div><label for="price">Price M</label><input type="number" name="price" id="" placeholder="000.00"></div>
                        <div><label for="points">Pts</label><input type="number" name="points" id="" placeholder="0"></div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Add product" name="upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <!--Menu side-->
        <div class="side">
            <div class="cont">
                <div class="top">
                    <img src="../images/dg_logo.png" alt="" srcset="">
                    <div>
                    <img src="../images/admin_dp.png" alt="" class="dp">
                    </div>
                    
                    <p>Welcome, <?php echo $_SESSION['username'];?></p>
                </div>
                <div class="mid">
                    <button onclick="showdiv()"><a>Add stock</a></button>
                    <button><a href="">View stock</a></button>
                    <button><a href="">View Requests</a></button>
                </div>
                <div class="bottom">
                <button><a href="../config/logout_admin.php">log out</a></button>
                </div>
            </div>
        </div>
        <!--Menu div-->
        <div class="main">
            <div class="top">
                <div class="wrapp">
                <h1>Dashboard</h1>
                    <div class="cards">
                        <div class="carduser">
                        </div>
                        <div class="cardmoney">

                        </div>

                        <div class="cardpoints">

                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
            <p>
                menu2
            </p>
            </div>
        </div>

        <!--additional content side-->
        <div class="side2">
            <h1>New requests</h1>
            <table>
                <?php
                    while ($row=mysqli_fetch_assoc($result)) 
                    {
                ?> 
                    <tr class="info">
                        <td class="id"> <?php echo $row['member_id']; ?> </td>
                        <td class="name"> <?php echo $row['name']; ?> </td>
                        <td class="operation">
                            <form action="" method="post">
                                <button type="submit" class="approve" name="approve" value="<?=$row['member_id'];?>">approve</button>
                                <button type="submit" class="delete" name="deny" value="<?=$row['member_id'];?>">deny</button>
                            </form>     
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>


    <script src="../js/admin.js"></script>
</body>
</html>