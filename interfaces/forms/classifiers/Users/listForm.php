<?php
    $data = $GLOBALS['thisOject']->table;

    echo '<table border=1 cellspacing=0 cellpadding=0 width=100%>';
    echo '<tr><td></td><td>Физлицо</td><td>Логин</td><td>Пароль</td></tr>';
    foreach($data as $element){
        $dataElement = $element->__get('data');
        echo '<tr class="TR_hover">';
            echo '<td>'.$element->id.'</td>';
            echo '<td><a style="cursor:pointer;" onclick=createForm("element","'.$GLOBALS['thisOject']->name.'","'.get_class($GLOBALS['thisOject']).'","'.$element->id.'") >'.$dataElement['FizFace']['value'].'</a></td>';
            echo '<td>'.$dataElement['login']['value'].'</td>';
            echo '<td>'.$dataElement['password']['value'].'</td>';
        echo '</tr>';
    }
    echo '</table>';


?>

