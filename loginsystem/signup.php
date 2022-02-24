<?php
    require 'header.php';
?>

    <main>
        <div>
            <section class="input-page">
                <h1 class="input-page-head">Signup</h1>
                <form action="includes/signup.inc.php" method="post" class="input-form">
                    <?php
                        if (isset($_GET['signup'])) {
                            $signupVal = $_GET['signup'];
                        }

                        if(!isset($_GET['uid'])) {
                            echo  '<input type="text" name="uid" placeholder="Username">';
                        }
                        else {
                            $uid = $_GET['uid'];
                            echo '<input type="text" name="uid" value="'.$uid.'">';
                            if ($signupVal == "userNameTaken") {
                                echo '<p class="perror">User name unavailable</p>';
                            }
                        }
                        if(!isset($_GET['mail'])) {
                            echo  '<input type="text" name="mail" placeholder="E-mail">';
                        }
                        else {
                            $mail = $_GET['mail'];
                            echo '<input type="text" name="mail" value="'.$mail.'">';
                            if ($signupVal == "emailRegistered") {
                                echo '<p class="perror">There is an account with this email already</p>';
                            }
                        }
                    ?>
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Confirm password">
                    <button type="submit" name="signup-submit" class="submit-button"> Signup </button>
                </form>
                <section class="error">
                    <?php 
                        if (isset($_GET['signup'])) {
                            $signupVal = $_GET['signup'];

                            if ($signupVal == "nomatch") {
                                echo '<p>Passwords do not match!!</p>';
                                exit();
                            }
                            else if ($signupVal == "empty") {
                                echo '<p>Fill up all fields!</p>';
                                exit();
                            }
                            else if ($signupVal == "email") {
                                echo '<p>Incorrect format for email!</p>';
                                exit();
                            }
                            else if ($signupVal == "error") {
                                echo '<p>Submit the form!!!</p>';
                                exit();
                            }
                        }
                    ?>
                </section>
            </section>
        </div>
    </main>

<?php
    require 'footer.php';
?>