<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="./sobrenos.css" />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- /Bootstrap Icon -->
    <title><?= $titulo ?></title>

    <?php if ($titulo === "Loot Box Geek | Website"): ?>
        <style>
            header .menu-desktop a,
            header .menu-desktop__btn i {
                color: #fff !important;
            }
        </style>
    <?php endif; ?>
</head>

<body>
    <header>
        <div class="interface">
            <section class="logo">
                <a href="./index.php" style="cursor:pointer"><img src="./img/global/logo-removebg-preview.png" alt="logotipo" id="logo_header" /></a>
                <h2 class="title__logo">Loot Box Geek</h2>
            </section>


            <section class="menu-desktop">
                <nav>
                    <ul>
                        <li><a href="index.php">início</a></li>
                        <li><a href="./index.php#destaques">destaques</a></li>
                        <li><a href="#">eventos</a></li>
                        <li><a href="./sobrenos.php">sobre nós</a></li>
                    </ul>
                </nav>
            </section>
            <section class="menu-desktop__btn">
                <a href="./login.php">
                    <i class="bi bi-person-circle"> login</i>
                </a>

                <a href="./cadastro.php">
                    <i class="bi bi-door-open-fill">cadastro</i>
                </a>
            </section>
        </div>
    </header>
    <!-- /navbar -->