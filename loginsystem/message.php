<?php
    session_start();
    include 'includes/database.inc.php';
    include 'header.php';
?>

<main class="messages">

    <div class="contact-list">

        <h1>Messages</h1>
        <div class="friends">
            <?php
            
                include 'includes/fetch_friends.php';
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo  <<<_END
                            <div class="user-message">
                                <div class="userImg-message">
                                    <img src="uploads/profile24.jpg" alt="profile_image">
                                </div>
                                <div class="userInfo-message">
                                    <h4>User</h4>
                                    <p class="last-message">Lorem ipsum dolor sit amet consectetur</p>
                                </div>
                            </div>
                        _END;
                    }  
                }  
            ?>
        </div>
        
    </div>

    <div class="text-area">
        <div class="user-info">
            <div class="userImg">
                <img src="uploads/profiledefault.jpg" alt="profile" class="">
            </div>
            <p class="uname">Username</p>
        </div>
        <div class="message-area">
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="received">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
            <div class="received">
                <p> Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="received">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="received">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
        </div>
        <div class="send-area">
            <!-- <div class="message-form"> -->
                <form action="">
                    <textarea name="message" id="message"></textarea>
                    <button type="submit" name="send-message" class="send-message"><i class="fas fa-paper-plane"></i></button>
                </form>
            <!-- </div> -->
        </div>
    </div>

</main>

<?php include 'footer.php'; ?>