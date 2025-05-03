<?php

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: /dashboard.php', true, 301);
        exit;
    } 
    else {
        $error = 'Kullanıcı adı veya şifre hatalı.';
    }
}
?>

<div class="container mt-3" style="width: min(600px, 100%);">
    <div class="card shadow-lg mb-3">
        <div class="card-header bg-primary text-light">
            <h5 class="card-title">Giriş yap</h5>
        </div>

        <div class="card-body">
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
        </div>
    </div>

    <?php
        if ($error) {
            echo
            "<div class='alert alert-danger' role='alert'>
                ". $error ."
            </div>";
        }
    ?>
</div>