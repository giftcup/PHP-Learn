<?php
session_start();
require 'includes/get_user_picture.php';
require 'includes/get_users.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <header class="header">
        <nav class="nav-header">
            <ul class="ul-nav-header">
                <li class="ul-nav-header-li"><a href="index.php">Home</a></li>
                <?php
                if (isset($_SESSION['userId'])) : ?>
                    <li class="ul-nav-header-li"><a href="message.php">Messages</a></li>
                <?php endif; ?>

                <li class="ul-nav-header-li"><a href="./about.php">About Me</a></li>
                <li class="ul-nav-header-li"><a href="./contacts.php">Contacts</a></li>
            </ul>
            <div class="pages-nav-header">

                <?php

                if (isset($_SESSION['userName']) && isset($_SESSION['userId'])) : ?>
                    <div class="profile">
                        <?php
                        $id = $_SESSION['userId'];
                        $img = $_SESSION['userImage'];

                        if ($img === 1) :
                            $fileActualExt = display_pic($_SESSION['userId']); ?>

                            <img src="<?php echo 'uploads/profile' . $id . '.' . $fileActualExt . '?' . mt_rand() ?>" alt="Profile Image">
                        <?php else : ?>
                            <img src="uploads/profiledefault.jpg" alt="Profile Image">
                        <?php endif; ?>
                        <p><?php echo $_SESSION['userName']; ?></p>
                    </div>
                    <form action="includes/logout.inc.php" method="post" class="logout-button">
                        <button type="submit" name="logout-submit" class="submit-button">Logout</button>
                    </form>
                <?php else : ?>
                    <a href="login.php">Login</a>
                    <a href="signup.php">Signup</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>