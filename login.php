<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="query-css/header-query.css">
    <link rel="stylesheet" href="css/footer.css">

    <script src="https://kit.fontawesome.com/9b7133f7b6.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
  
    <main>
        <section class="login-form">
            <h1>Login</h1>
            
            <form action="admin/after-login.php" method="POST">
                <input type="email" name="emailF" id="email" placeholder="hrasko@gmail.com" required><br>
                <input type="password" name="passwordF" id="password" placeholder="Heslo" required><br><br>
                <input type="submit" value="Login">
            </form>
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
    <script src="js/header.js"></script>
</body>
</html>