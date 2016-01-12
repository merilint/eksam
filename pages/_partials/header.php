<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Orienteerumine</title>
    <link href="http://bootswatch.com/superhero/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?page=index">Orienteerumine</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= isset($page) && $page == 'index' ? 'active' : null ?>">
                    <a href="index.php?page=index">Avaleht</a>
                </li>
                <li class="<?= isset($page) && $page == 'register' ? 'active' : null ?>">
                    <a href="index.php?page=register">Registreerumine</a>
                </li>
                <li class="<?= isset($page) && $page == 'checkpoint' ? 'active' : null ?>">
                    <a href="index.php?page=checkpoint">Kontrollpunkt</a>
                </li>
                <li class="<?= isset($page) && $page == 'admin' ? 'active' : null ?>">
                    <a href="index.php?page=admin">Admin</a>
                </li>
                <?php if (isLoggedIn()): ?>
                    <li>
                        <a href="index.php?page=logout">Logi välja</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="container" id="main">
