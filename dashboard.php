<?php
include("./config/db.php");
include("./config/auth_session.php");

$id = $_SESSION['member_id'];
$query = "SELECT `name` FROM `distributor` WHERE `member_id` ='$id'";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Home</title>
</head>
<body>
    <header>
        <nav>
            <img src="images/dg_logo.png" alt="">

            <div class="search">
                <input type="text" name="search" placeholder="Search items..." value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" >
                <button type="submit">Search</button>    
            </div>

            <p>Hi, 
                <?php
                while ($rows=mysqli_fetch_assoc($result)) 
                {
                    ?>
                    <td><?php echo $rows['name']; ?></td>
                    <?php
                }
                ?>
            </p>
            <div class="cart">
                <h3 class="value">0</h3>
                <img src="./images/cart.png" alt="cart">
            </div>
        </nav>
    </header>
    <main>
    <?php 
        $getproducts = ("SELECT * FROM gadgets");
        $productinfo = mysqli_query($con, $getproducts);

        while ($rows=mysqli_fetch_assoc($productinfo)) 
        {
    ?> 
        <table>
            <tr>
                <td  class="cover" colspan="2"><div class="img"><?php echo '<img src="./images/stock/uploaded/'.$rows['image'].'">'; ?>
                </div></td>
                <tr class="title"><th colspan="2" ><?php echo $rows['name']; ?> </th></tr>
                <tr><td colspan="2" class="desc"><?php echo $rows['description']; ?> </td></tr>
                <tr class="price"><td class="price">Price M<span><?php echo $rows['price']; ?> </span></td> <td class="pts">Pts <span><?php echo $rows['points']; ?> </span></td></tr>     
            </tr>
            <td><button type="submit" id="add_to_cart">Add to cart</button></td>
        </table>
    <?php
        }
    ?>
    </main>
</body>
</html>