<?php

// Lampirkan dbconfig
require_once "auth/dbconfig.php";

// Cek status login user
if($user->isLoggedIn()) {
    header("location: index.php"); //Redirect ke index
}

//Cek adanya data yang dikirim
if(isset($_POST['kirim'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Registrasi user baru
    if($user->register($email, $password)) {
        // Jika berhasil set variable success ke true
        $success = true;
    } else {
        // Jika gagal, ambil pesan error
        $error = $user->getLastError();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="auth/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon"  a href="img/icon.png" type="image/gif" sizes="12x12">
</head>
<body>
<div class="container">
<div class="login-page">
    <div class="form">
        <form class="register-form" method="post">
            <?php if (isset($error)): ?>
                <div class="error">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="success">
                    Berhasil mendaftar. Silakan <a href="login.php">login</a>.
                </div>
            <?php endif; ?>

            <input type="email" name="email" placeholder="email address" required/>
            <input type="password" name="password" placeholder="password" required/>
            <button type="submit" name="kirim">create</button>
            <p class="message">Already registered? <a href="login.php">Sign In</a></p>

        </form>
            </div>
    </div>
</div>
</body>
</html>
