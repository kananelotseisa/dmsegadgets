<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <header>
        <nav>
            <img src="images/dg_logo.png" alt="">
            <ul>
                <li><a href="#welcome"  onclick="home()">Home</a></li>
                <li><a href="#mission"  onclick="mission()">Mission</a></li>
                <li><a href="#earn"  onclick="earn()">How to earn</a></li>
                <li><a href="#services"  onclick="services()">Services</a></li>
                <li><a href="#services"  onclick="services()">Buy</a></li>
            </ul>


                <div class="btn">
                  <a href="login.php" class="btn">Login</a>
                  <span class="BorderTopBottom"></span>
                  <span class="BorderLeftRight"></span>
                </div>


        </nav>

    </header>
    <main>
        <!--Start of welcome section-->
        <section class="welcome" id="welcome">
        <div class="head">
            <div class="line"></div>
            <p>Home</p>
            <div class="line"></div>
        </div>
        <div class="content">
            <img src="./images/arrow_orange.png" alt="">
            <h1>DMSE Gadgets</h1>
            <h2>The universal link of distributors</h2>
            <div class="buttons">
                <div class="registerbtn">
                    <a href="request.php" class="registerbtn">Request</a>
                    <span class="Border-TopBottom"></span>
                    <span class="Border-LeftRight"></span>
                  </div>

                  <div class="btn">
                    <a href="login.php" class="btn">login</a>
                    <span class="BorderTopBottom"></span>
                    <span class="BorderLeftRight"></span>
                  </div>
            </div>
        </div>
        </section>
        <!--end of welcome section-->
        <!--Start of mission section-->
        <section class="mission" id="mission">
        <div class="head">
            <div class="line"></div>
            <p>Mission</p>
            <div class="line"></div>
        </div>
        </section>
        <!--end of mission section-->
        <!--Start of earning section-->
        <section class="earn" id="earn">
        <div class="heading">
            <h1>///  START EARNING  ///</h1>
            <h2>HOW TO GET <span>STARTED</span></h2>
        </div>
        <div class="head">
            <div class="line"></div>
            <p>Earn</p>
            <div class="line"></div>
        </div>
        </section>
        <!--end of earning section-->
        <!--Start of service section-->
        <section class="services" id="services">
        <div class="heading">
            <h1>///  OUR SERVICES  ///</h1>
            <h2>WHY YOU SHOULD <span>CHOOSE US</span></h2>
        </div>
        <div class="head">
            <div class="line"></div>
            <p>Services</p>
            <div class="line"></div>
        </div>
        </section>
    </main>

    
</body>
</html>