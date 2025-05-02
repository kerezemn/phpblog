<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success-subtle">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-success-emphasis" href="/">kblog</a>

            <button class="navbar-toggler shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($page === 'home' ? 'active' : '') ?>" href="/">Hakkımda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page === 'cv' ? 'active' : '') ?>" href="/">CV</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page === 'contact' ? 'active' : '') ?>" href="/contact">İletişim</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page === 'my_city' ? 'active' : '') ?>" href="/my-city">Şehrim</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page === 'harage' ? 'active' : '') ?>" href="/contact">Mirasımız</a>
                    </li>
                </ul>

                <ul class="navbar-nav d-flex gap-2">
                    <?php
                        if (!is_user_logged()) {
                            echo "<li class='nav-item'>
                                <a class='nav-link ". ($page === 'login' ? 'active' : '') ."' href='/login'>
                                    ". file_get_contents(__DIR__ . '/../icons/login.svg') ."Giriş yap
                                </a>
                            </li>";
                        }
                        else {
                            echo "<li class='nav-item'>
                                <a class='nav-link' href='/logout'>
                                    ".  file_get_contents(__DIR__ . '/../icons/logout.svg') ."Çıkış yap
                                </a>
                            </li>";
                        };
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <?php include $view; ?>

    <footer class="bd-footer py-4 py-md-5 mt-5 bg-dark-subtle">
        <div class="form-text text-center">kblog © Tüm hakları saklıdır.</div>
    </footer>
</body>
</html>