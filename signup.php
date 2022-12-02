<?php
session_start();
require 'config/constants.php';

//get back the data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'];
$lastname = $_SESSION['signup-data']['lastname'];
$username = $_SESSION['signup-data']['username'];
$email = $_SESSION['signup-data']['email'];
$createpassword = $_SESSION['signup-data']['createpassword'];
$confirmpassword = $_SESSION['signup-data']['confirmpassword'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

</head>
<body>
<section class="form_section">
    <div class="container form_section-conainer">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['signup'];
                    unset($_SESSION['signup']);
                    ?>
                </p>
            </div>
            <?php endif ?>
    <!-- "multipart/form-data" because we have file upload -->
        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
            <input type="text" name="username"  placeholder="Userame">
            <input type="email" name="email"  placeholder="Email">
            <input type="password" name="createpassword" placeholder="Create Password">
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>
</body>
</html>