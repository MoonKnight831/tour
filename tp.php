<?php
session_start(); // Ensure the session is started
include 'partials/_dbconnect.php'; // Include your connection script

// Ensure the username is provided (e.g., via GET or POST)
if (isset($_GET['userna'])) {
    $userna = $_GET['userna'];

    // Prepare a statement to select a specific user by username
    $sql = "SELECT sno, name, email, phone FROM `data` WHERE username = ?"; // Query to match 'username'

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $userna); // Bind the username parameter
        
        $stmt->execute(); // Execute the prepared statement
        
        $result = $stmt->get_result(); // Get the result set
        
        if ($result->num_rows > 0) {
            // Output data of the row
            $row = $result->fetch_assoc();
            $_SESSION['username'] = htmlspecialchars($row["name"]); // Storing name in session
            $_SESSION['phone'] = htmlspecialchars($row["phone"]); // Storing phone in session
            $_SESSION['email'] = htmlspecialchars($row["email"]); // Storing email in session
        } else {
            echo "No user found with username " . htmlspecialchars($username);
        }
        
        $stmt->close(); // Close the prepared statement
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }
} else {
    echo "Username is missing.";
}

$conn->close(); // Close connection
?>


<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mine - <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Profile'; ?></title>
    <!-- Add your CSS and other meta tags here -->

</head> -->
<head>
    <meta charset="utf-8">
    <!-- <title>TRAVELER - Free Travel Website Template</title> -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
   
    <title> <?php echo $_SESSION['username']?> - TRAVELER
  </title>


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <script src="slider.js"></script>
    <link rel="stylesheet" href="slider.css">n

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include 'partials/_nav2.php'; ?>

    <div class="profile">
        <div class="pf">
            <div class="img1">
                <img src="img/monkey_d_luffy.jpg" alt="Profile Picture">
            </div>
            <div class="info">
                <div class="i">
                    <h3>Your Name:</h3>
                    <div class="bod">
                        <h4><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Not Set'; ?></h4>
                    </div>
                </div>

                <div class="i">
                    <h3>Your Phone Number:</h3>
                    <div class="bod">
                        <h4><?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : 'Not Set'; ?></h4>
                    </div>
                </div>

                <div class="i">
                    <h3>Your Email:</h3>
                    <div class="bod">
                        <h4><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Not Set'; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="det">
        <div class="con">
            <h1>This is content</h1>
        </div>
        <div class="details">
            <p>Something</p>
        </div>
    </div>

    <style>
        /* Your CSS styles */
        body {
            background-color: #000;
            color: #f1f1f1;
        }
        .profile {
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }
        .pf {
            width: 80vw;
            display: flex;
            background: #343131;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4.8px);
            border: 1px solid rgba(189, 115, 115, 0.34);
        }
        .bod h3, h4 {
            display: block;
            width: 55vw;
            border: 2px solid black;
            text-transform: capitalize;
            color: #D8A25E;
        }
        .info {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .i h3 {
            color: #f1f1f1;
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
        .det {
            width: 80vw;
            height: 30vh;
            margin: 25px 118px;
            padding: auto;
            color: #f1f1f1;
            background: rgba(189, 115, 115, 0.28);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4.8px);
            border: 1px solid rgba(189, 115, 115, 0.34);
        }
        .det h1 {
            color: #f1f1f1;
        }
    </style>
</body>

</html>
