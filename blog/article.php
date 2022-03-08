<?php 
    include 'header.php';
?>


<h1>Article Page</h1>

<div class="article-container">
    <?php
        $title = mysqli_real_escape_string($conn, $_GET['title']);
        $date = mysqli_real_escape_string($conn, $_GET['date']);
    
        $sql = "SELECT * FROM article WHERE a_title=? AND a_date=?;";

        $stmt =  mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'SQL Error!';
        }
        mysqli_stmt_bind_param($stmt, "ss", $title, $date);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="article-box">
                    <h3>'.$row['a_title'].'</h3>
                    <p>'.$row['a_text'].'</p>
                    <p>'.$row['a_date'].'</p>
                    <p>'.$row['a_author'].'</p>
                </div>';
            }
        }
        else {

        }
    ?>
</div>

</body>
</html>