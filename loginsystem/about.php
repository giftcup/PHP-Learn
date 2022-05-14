<?php
include 'header.php';

echo '<main>';

if (isset($_SESSION['userName'])) {
    echo '<div class="profileImg">';
    $id = $_SESSION['userId'];
    $img = $_SESSION['userImage'];


    if ($img === 1) {
        $fileActualExt = display_pic($_SESSION['userId']);

        echo '<img src="uploads/profile' . $id . '.' . $fileActualExt . '?' . mt_rand() . '" alt="Profile Image">';
    } else {
        echo '<img src="uploads/profiledefault.jpg" alt="Profile Image">';
    }
    echo '<p>Username: ' . $_SESSION['userName'] . '</p>';
    echo '<p>Email: ' . $_SESSION['userEmail'] . '</p>';
    echo '
                <div class="profileForm">
                    <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile" accept="image/png image/jpg image/jpeg" class="profile-input">
                        <!-- <label for="profile">Choose File</label> --!>
                        <button type="submit" name="submit-upload" class="profile-button">Add Image</button>
                    </form>
                </div>';
    echo '
                <div>
                    <form action="includes/delete.inc.php" method="POST">
                        <button type="submit" name="submit-delete">Remove Image</button>
                    </form>
                </div>';
    echo '</div>';
}

echo '</main>';

require 'footer.php';
?>
</body>

</html>