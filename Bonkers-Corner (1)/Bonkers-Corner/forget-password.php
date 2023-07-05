<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <title>Forget-password</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/forget-password.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <?php include './header.php'; ?>
    </header>
    <div class="container">
        <div class="header">
            <h1>Lost password</h1>
            <p>Lost your password? Please enter your username or email address. You will receive a link to create a new
                password via email.</p>
            <label for="username" class="user-text-usename"><br>USERNAME OR EMAIL ADDRESS<span
                    class="star">*</span></br> </label>
            <input type="text" placeholder="username or mail" name="username or mail" required>
            <br>
            <button type="submit">Reset password</button>
            </br>
        </div>
    </div>
    <footer>
        <?php include './footer.php'; ?>
    </footer>
</body>

</html>