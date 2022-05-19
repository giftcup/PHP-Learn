<?php
require 'header.php';

if (isset($_SESSION['userName'])) {
    header("Location: index.php?redirect");
    exit();
}
?>

<main>
    <div>
        <section class="input-page">
            <h1 class="input-page-head">Login</h1>
            <form action="includes/login.inc.php" method="post" class="input-form">
                <?php

                if (isset($_GET['mailuid'])) :
                    $mailuid = $_GET['mailuid'];
                ?>
                    <input type="text" name="mailuid" value="<?php echo $mailuid ?>">
                <?php else : ?>
                    <input type="text" name="mailuid" placeholder="Username/E-mail...">
                <?php endif; ?>
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="login-submit" class="submit-button">Login</button>
            </form>
            <section class="error">
                <?php
                if (isset($_GET['login'])) :
                    $loginVal = $_GET['login'];

                    if ($loginVal == "empty") :
                ?>
                        <p>Fill all inputs</p>
                    <?php elseif ($loginVal == "failed") : ?>
                        <p>Username or password is incorrect!</p>
                        <p>Don\'t have an account? <a href="signup.php">Sign up</a></p>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
        </section>
    </div>
</main>

<?php
require 'footer.php';
?>
</body>

</html>