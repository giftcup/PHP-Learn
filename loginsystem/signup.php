<?php
require 'header.php';
?>

<main>
    <div>
        <section class="input-page">
            <h1 class="input-page-head">Signup</h1>
            <form action="includes/signup.inc.php" method="post" class="input-form">
                <?php
                if (isset($_GET['signup'])) :
                    $signupVal = $_GET['signup'];
                endif;

                if (!isset($_GET['uid'])) :
                ?>
                    <input type="text" name="uid" placeholder="Username">
                <?php else :
                    $uid = $_GET['uid'];
                ?>
                    <input type="text" name="uid" value=" <?php echo $uid; ?>">
                    <?php if ($signupVal == "userNameTaken") : ?>
                        <p class="perror">User name unavailable</p>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!isset($_GET['mail'])) : ?>
                    <input type="text" name="mail" placeholder="E-mail">
                <?php else : $mail = $_GET['mail']; ?>
                    <input type="text" name="mail" value="<?php echo $mail; ?>">
                    <?php if ($signupVal == "emailRegistered") : ?>
                        <p class="perror">There is an account with this email already</p>
                    <?php endif; ?>
                <?php endif; ?>
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Confirm password">
                <button type="submit" name="signup-submit" class="submit-button"> Signup </button>
            </form>
            <section class="error">
                <?php
                if (isset($_GET['signup'])) :
                    $signupVal = $_GET['signup'];

                    if ($signupVal == "nomatch") :
                ?>
                        <p>Passwords do not match!!</p>
                        <?php exit();
                    elseif ($signupVal == "empty") :
                        ?>
                        <p>Fill up all fields!</p>
                        <?php exit();
                    elseif ($signupVal == "email") :
                        ?>
                        <p>Incorrect format for email!</p>
                        <?php exit();
                    elseif ($signupVal == "error") :
                        ?>
                        <p>Submit the form!!!</p>
                        <?php exit();
                    endif;
                endif;
                ?>
            </section>
        </section>
    </div>
</main>

<?php
require 'footer.php';
?>
</body>

</html>