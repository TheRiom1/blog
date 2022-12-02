<?php
session_start();
require 'config/database.php';

//get signup form data if signup button was clicked
if(isset($_POST['submit']))
{
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword= filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];


    //check input values
    if (!$firstname) {
        $_SESSION['signup'] = "Podaj imię";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Podaj nazwisko";
    } elseif (!$username) {
        $_SESSION['signup'] = "Podaj nazwę użytkownika";
    } elseif (!$email) {
        $_SESSION['signup'] = "Podaj email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Hasło powinno mieć min 8 znaków";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Proszę dodaj zdjęcie profilowe";
    } else {
        //check if passwords don't match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Hasła nie są jednakowe";
        } else {
            //hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            //check if username or emial already exist
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection,$user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "Email już był wykorzystany do założenia konta";

            } else {
                //work on avatar
                //rename avatar
                $time = time(); //make each name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;
                

                //make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if(in_array($extension, $allowed_files)) {
                    //make sure image is not too large (1mb+) 
                    if($avatar['size'] < 1000000) {
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = 'File size too big. Should be less that 1mb';
                    }
                } else {
                    $_SESSION['signup'] = 'Zły format';
                }
         
            }  
         }
          
    }
    //redirect back to signup if there was any problem
    if($_SESSION['signup']) {
        //pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
     die();
    } else {
        //insert new user into db
        $inset_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname',
        '$username', '$email', 0";
        if(!mysqli_errno($connection)) {
            //redirect to login page with succes message
            $_SESSION['signup-succes'] = "Zarejestrowano pomyślnie. Zaloguj się";
            header('location' . ROOT_URL . 'signin.php');
            die();
        }
    }

} else {
    //if button wasn't clicked, bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
