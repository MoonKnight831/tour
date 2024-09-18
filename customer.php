<?php
session_start();
 

?> 





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mine -
        <?php echo $_SESSION['username'] ?>
    </title>

    <head>
        <meta charset="utf-8">
        <!-- <title>TRAVELER - Free Travel Website Template</title> -->
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <title>
            <?php echo $_SESSION['username']?> - TRAVELER
        </title>


        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <script src="slider.js"></script>
        <link rel="stylesheet" href="slider.css">n

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

<body>
    <?php require 'partials/_nav2.php'?>
    <div class="profile">
        <div class="pf">
            <div class="img1">
                <img src="img/monkey d luffy.jpg" alt="">
            </div>
            <div class="info">
                <div class="i">
                    <h3>Your Name : </h3>
                    <!-- <input type="Text" placeholder="Yourname"> -->
                    <div class="bod">
                        <h4><?php echo $_SESSION['username'] ?></h4>
                    </div>
                </div>



                <div class="i">
                    <h3>Your phone number : </h3>
                    <!-- <input type="Text" placeholder="Yourname"> -->
                    <div class="bod">
                        <h4><?php echo $_SESSION['phone']?></h4>
                    </div>
                </div>



                <div class="i">
                    <h3>Your Email : </h3>
                    <!-- <input type="Text" placeholder="Yourname"> -->
                    <div class="bod">
                        <!-- <h4>your Email</h4> -->
                        <h4><?php echo $_SESSION['email']?></h4>

                    </div>
                </div>


            </div>
        </div>
    </div>



    <style>

        body{
            background-color: #000;
            /* color: #f1f1f1; */
        }
        .profile {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            padding-top: 40px;
        }

        .pf {
            width: 80vw;
            /* height: 0vh; */
            display: flex;
            /* justify-content: space-around; */
            /* From https://css.glass */
            background: #343131;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4.8px);
            -webkit-backdrop-filter: blur(4.8px);
            border: 1px solid rgba(189, 115, 115, 0.34);
        }

        .bod h3,h4 {
            display: block;
            width: 55vw;
            border: 2px solid black;
            text-transform: capitalize;
            color:#D8A25E;
        }

        .info {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .i h3{
            color: #f1f1f1  ;
        }

        .i {
            padding-bottom: 20px;
            color: #f1f1f1;
        }

        .img1 img {
            height: 300px;
            width: 300px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }
        .det{
            width: 80vw;
            height: 30vh;
            margin: 25px 118px;
            /* padding-top: 30px; */
            padding: auto;
            color: #f1f1f1;
            background: rgba(189, 115, 115, 0.28);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4.8px);
            -webkit-backdrop-filter: blur(4.8px);
            border: 1px solid rgba(189, 115, 115, 0.34);
        }
        .det h1{
            color: #f1f1f1;
        }
    </style>
</body>

</html>