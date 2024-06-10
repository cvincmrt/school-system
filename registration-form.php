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
    <title>Registration</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
  
    <main>
        <section class="registration-form">
            <h1>Registration</h1>
            
            <form action="admin/after-registration-form.php" method="POST">
                <input type="text" name="first-name" id="first-name" placeholder="Meno" required><br>
                <input type="text" name="second-name" id="second-name" placeholder="Priezvisko" required><br>
                <input type="email" name="email" id="email" placeholder="hrasko@gmail.com" required><br>
                <input type="password" name="password" id="password" placeholder="Heslo" required><br>
                <input type="password" name="password-again" id="password-again" placeholder="Heslo znovu" required><br><br>

                <input type="submit" value="Registration">
            </form>
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
    <script src="js/header.js"></script>
</body>
</html>