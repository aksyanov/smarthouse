<!DOCTYPE html>
<html>
<head>
    <title>Умный дом</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/style/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <a class="navbar-brand" href="#">SmartHouse</a>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="active"><a href="http://localhost/smarthouse">Главная</a></li>
                <li><a href="controls">Управление</a></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Датчики<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Температура</a></li>
                        <li><a href="#">Видео</a></li>
                    </ul>
                </li>
                <li><a href="settings">Настройки</a></li>
            </ul>
        </div>
    </nav>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jQuery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jqueryScrollTo.js"></script>
</body>
</html>




