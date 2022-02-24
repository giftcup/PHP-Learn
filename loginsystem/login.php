<?php
    require 'header.php';
?>

    <main>
        <div>
            <section class="input-page">
                <h1 class="input-page-head">Login</h1>
                <form action="includes/login.inc.php" method="post" class="input-form">
                    <?php 
                        if (isset($_GET['mailuid'])) {
                            $mailuid = $_GET['mailuid'];
                            echo '<input type="text" name="mailuid" value="'.$mailuid.'">';
                        }
                        else {
                            echo '<input type="text" name="mailuid" placeholder="Username/E-mail...">';
                        }
                    ?>
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="login-submit" class="submit-button">Login</button>
                </form>
                <section class="error">
                    <?php
                        if (isset($_GET['login'])) {
                            $loginVal = $_GET['login'];

                            if ($loginVal == "empty") {
                                echo '<p>Fill all inputs</p>';
                            }
                            else if ($loginVal == "failed") {
                                echo '<p>Username or password is incorrect!</p>';
                                echo '<p>Don\'t have an account? <a href="signup.php">Sign up</a></p>';
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