<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <p>Send E-mail</p>
        <form action="contactform.php" method="post">
            <input type="text" name="name" placeholder="Full name">
            <input type="text" name="email" placeholder="Your e-mail">
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" placeholder="Message"></textarea>
            <button type="submit" name="submit">SEND MAIL</button>
            
        </form>
    </main>
</body>
</html>