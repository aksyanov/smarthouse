<!DOCTYPE html>
<html>
<head>
    <title>Умный дом</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/style/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/style/bootstrap-switch.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/style/main.css">

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jQuery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-switch.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-default">
        <a class="navbar-brand" href="#">SmartHouse</a>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://localhost/smarthouse">Главная</a></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="DevicesCatalog">Справочник устройств</a></li>
                    </ul>
                </li>
            </ul>

            <img id="prelod_renew_main" src="<?php echo Yii::app()->request->baseUrl;?>/img/preloader.gif">
        </div>
    </nav>

    <div class="container">
    <?php
        echo $content;
    ?>
    </div>

    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jqueryScrollTo.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>




