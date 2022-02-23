<?php
    require 'header.php';
?>

    <main>
        <div>
            <section class="input-page">
                <h1 class="input-page-head">Login</h1>
                <form action="includes/login.inc.php" method="post" class="input-form">
                    <input type="text" name="mailuid" placeholder="Username/E-mail...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="login-submit" class="submit-button">Login</button>
                </form>
            </section>
        </div>
    </main>

<?php
    require 'footer.php';
?>