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

    <?
        if(!Yii::app()->user->isGuest){
    ?>
        <div id="userInfoWidget">
            <?php
                $this->widget('WLight',array('params'=>array('param1'=>'param1text')));?>
            ?>
            <div class="clear"></div>
        </div>
    <?
        }
    ?>

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
        </div>
    </nav>

    <div class="container">
    <?php
        echo $content;
        //$this->widget('WLight',array('params'=>array('param1'=>'param1text')));
    ?>
    </div>

    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jqueryScrollTo.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>




