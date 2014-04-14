<?php
    echo '<h1>Главная</h1>';
    Widgets::render('wLights',array('param1'=>'Пурум пум пум'));
    echo '<br>'.$param1;
?>