<?php
$login = false;
$showError = false;
$alertMessage = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if username exists
    $sql = "SELECT * FROM `data` WHERE `username` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            $login = true;
            session_start();
            
            // Store user information in session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['email'] = $row['email'];
            
            // Redirect to the index page
            header("Location: index.php");
            exit();
        } else {
            $alertMessage = "Invalid password";
        }
    } else {
        $alertMessage = "Invalid username";
    }

    $stmt->close();
    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'partials/_nav.php'; ?>
    
    <?php if ($login): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif ($alertMessage): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= htmlspecialchars($alertMessage) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="cont">
        <h1 style="text-align:center;">Login page</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="username" aria-describedby="usernameHelp">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="password">
            </div>
            <p style="color: #fff;">Don't know the password? <a href="signUp.php">SignUp</a></p>
            <button type="submit" class="btn btn-primary" id="btn">Log in</button>
        </form>
    </div>

    <style>
        body {
            background-image: url("img/bg1.jpg");
            background-position: center;
            background-size: cover;
            backdrop-filter: blur(3px);
        }
        .cont {
            height: 400px;
            width: 500px;
            color: #fff;
            position: relative;
            top: 73px;
            margin: auto;
            background: rgba(117, 112, 112, 0.13);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(9.5px);
            -webkit-backdrop-filter: blur(9.5px);
            border: 1px solid rgba(117, 112, 112, 0.63);
        }
        #btn {
            width: 100%;
        }
        .cont p {
            color: #fff;
            font-size: 15px;
            font-weight: 400;
        }
        .cont a {
            font-size: 15px;
            font-weight: 400;
            color: #fff;
        }
        .cont form {
            height: 400px;
            width: 400px;
            margin: auto;
        }
    </style>
</body>
</html>
