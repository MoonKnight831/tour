<?php
$showAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
  
    $name = $_POST['name'];

    // Check if username already exists
    $sql = "SELECT * FROM `data` WHERE `username` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $alertMessage = "Username already exists";
        $showAlert = true;
    } else {
        // Check if passwords match
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute insert statement
            $sql = "INSERT INTO `data` (`name`, `username`, `email`, `password`, `phone`, `address`, `date`) VALUES (?, ?, ?, ?, ?, ?, current_timestamp())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $name, $username, $email, $hash, $phone, $address);

            if ($stmt->execute()) {
                $showAlert = true;
                $alertMessage = "Your account has been created successfully.";
            } else {
                $alertMessage = "An error occurred. Please try again.";
                $showAlert = true;
            }
        } else {
            $alertMessage = "Passwords do not match.";
            $showAlert = true;
        }
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
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require 'partials/_nav.php'; ?>
    <?php
    if ($showAlert) {
        if (isset($alertMessage)) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ' . $alertMessage . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account is created.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="cont my-4">
        <h1 style="text-align:center;">Sign Up Page</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" maxlength="50" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" maxlength="50" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" maxlength="255" required>
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" maxlength="255" required>
                <div id="passwordHelp" class="form-text">Make sure your password matches.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" maxlength="15" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary col-md-12">Submit</button>
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
            height: 100vh;
            color: #f1f1d1;
            width: 600px;
            margin: auto;
            position: relative;
            top: -16px;
            background: rgba(37, 76, 38, 0.45);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(9.5px);
            border-radius: 10px;
        }
    </style>



</body>
</html>
