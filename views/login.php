<?php

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: /dashboard.php');
        exit;
    } 
    else {
        $error = 'Kullanıcı adı veya şifre hatalı.';
    }
}
?>

<div class="container mt-3" style="width: min(600px, 100%);">
    <h5 class="text-center">Giriş yap</h5>
    <hr>

    <form method="POST">
        <div class="mb-3">
            <label>Kullanıcı adı</label>
            <input class="form-control" type="mail" name="username" />
        </div>

        <div class="mb-3">
            <label>Şifre</label>
            <input class="form-control" type="password" name="password" />
        </div>

        <button class="btn btn-success mb-3" style='width: 100px;'>Giriş</button>
    </form>  

    <?php
        if ($error) {
            echo
            "<div class='alert alert-danger' role='alert'>
                ". $error ."
            </div>";
        }
    ?>
</div>