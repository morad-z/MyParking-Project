<?php
session_start();

include('config.php');

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: index1.php"); // Redirect to the dashboard page
    exit();
}

// Login functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_email']) && isset($_POST['login_password'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $sql = "SELECT * FROM tbl_216_users1 WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header("Location: index1.php"); // Redirect to the dashboard page
        exit();
    } else {
        $loginErrorMessage = "Incorrect email or password";
    }
}

// Signup functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup_name']) && isset($_POST['signup_email']) && isset($_POST['signup_password'])) {
    $name = $_POST['signup_name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM tbl_216_users1 WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        $signupErrorMessage = "Email already exists. Please use a different email.";
    } else {
        $role = $email==='morad@gmail.com' ? 'Admin' : 'User';
        $sql = "INSERT INTO tbl_216_users1 (name, email, password,role) VALUES ('$name', '$email', '$password','$role' )";
        if (mysqli_query($conn, $sql)) {
            $signupSuccessMessage = "Signup successful";
        } else {
            $signupErrorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login and Signup Page</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<h1>AMIN amin AMIN</h1>

<div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Log in</div>
                     <form class="flip-card__form" action="index.php" method="POST">
                        <input class="flip-card__input" placeholder="Email" type="email" id="login_email" name="login_email" required>
                        <input class="flip-card__input" placeholder="Password" type="password" id="login_password" name="login_password" required>
                        <button class="flip-card__btn">Let`s go!</button>
                        <?php if(isset($loginErrorMessage)): ?>
                        <div class="error-message"><?php echo $loginErrorMessage; ?></div>
                        <?php endif; ?>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Sign up</div>
                     <form class="flip-card__form" action="index.php" method="POST">
                        <input class="flip-card__input" placeholder="Name" type="name" id="signup_name" name="signup_name" required>
                        <input class="flip-card__input" id="signup_email" name="signup_email" required placeholder="Email" type="email">
                        <input class="flip-card__input"  placeholder="Password" type="password" id="signup_password" name="signup_password" required>
                        <button class="flip-card__btn">Confirm!</button>
                        <?php if(isset($signupErrorMessage)): ?>
                        <div class="error-message"><?php echo $signupErrorMessage; ?></div>
                        <?php elseif(isset($signupSuccessMessage)): ?>
                        <div class="success-message"><?php echo $signupSuccessMessage; ?></div>
                        <?php endif; ?>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
   </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
