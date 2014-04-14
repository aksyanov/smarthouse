<!DOCTYPE html>
<html>
<head>
    <title>Умный дом</title>
    <link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-default">
    <a class="navbar-brand" href="#">SmartHouse</a>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">

            <li <?php if(UrlManager::$curPage == '') echo 'class="active"' ?>><a href="http://localhost/smarthouse">Главная</a></li>
            <li <?php if(UrlManager::$curPage == 'controls') echo 'class="active"' ?>><a href="controls">Управление</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Датчики<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Температура</a></li>
                    <li><a href="#">Видео</a></li>
                </ul>
            </li>
            <li <?php if(UrlManager::$curPage == 'settings') echo 'class="active"' ?>><a href="settings">Настройки</a></li>
        </ul>
    </div>
</nav>




