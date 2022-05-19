<?php
include 'header.php';
?>


<main>

    <?php if (isset($_SESSION['userName'])) : ?>
        <div class="profileImg">
            <?php
            $id = $_SESSION['userId'];
            $img = $_SESSION['userImage'];

            if ($img === 1) :
                $fileActualExt = display_pic($_SESSION['userId']);
            ?>
                <img src="<?php echo 'uploads/profile' . $id . '.' . $fileActualExt . '?' . mt_rand(); ?>" alt="Profile Image">
            <?php endif; ?>
            <?php if ($img !== 1) : ?>
                <img src="uploads/profiledefault.jpg" alt="Profile Image">
            <?php endif; ?>

            <p>Username: <?php echo $_SESSION['userName'] ?> </p>
            <p>Email: <?php echo  $_SESSION['userEmail'] ?> </p>

            <div class="profileForm">
                <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profile" accept="image/png image/jpg image/jpeg" class="profile-input">
                    <label for="profile">Choose File</label>
                    <button type="submit" name="submit-upload" class="profile-button">Add Image</button>
                </form>
            </div>

            <div>
                <form action="includes/delete.inc.php" method="POST">
                    <button type="submit" name="submit-delete">Remove Image</button>
                </form>
            </div>
        </div>
    <?php endif; ?>

</main>

<?php require 'footer.php'; ?>
</body>

</html>