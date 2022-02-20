<?php
    include_once './head.php';
    $_SESSION['name'] = 'Tambe';
    echo $_SESSION['name'];
    if (!isset($_SESSION['name'])) {
        echo " You are not logged in!";
    }
    else {
        echo " You are logged in!";
    }
?>
</body>
</html>