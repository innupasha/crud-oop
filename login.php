<?php

// Lampirkan dbconfig
require_once "auth/dbconfig.php";

// Cek status login user
if ($user->isLoggedIn()) {
    header("location: index.php"); //redirect ke index
}

//jika ada data yg dikirim
if (isset($_POST['kirim'])) {
    $email = $_POST['email'];

    $password = $_POST['password'];

    // Proses login user
    if ($user->login($email, $password)) {
        header("location: index.php");
    } else {
        // Jika login gagal, ambil pesan error
        $error = $user->getLastError();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="auth/style.css">
    <title>Login CRUD OOP</title>
</head>
<body>
<div class="login-page">

<div class="form">

    <form class="login-form" method="post">

        <?php if (isset($error)) : ?>

            <div class="error">

                <?php echo $error ?>

            </div>

        <?php endif; ?>

        <input type="email" name="email" placeholder="email" required />

        <input type="password" name="password" placeholder="password" required />

        <button type="submit" name="kirim">login</button>

        <p class="message">Not registered? <a href="registrasi.php">Create an account</a></p>

    </form>

</div>

</div>

</body>
</html>