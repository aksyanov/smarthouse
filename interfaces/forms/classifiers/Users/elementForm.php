<?php
$data = $GLOBALS['thisOject']->__get('data');

echo 'Физическое лицо:'.$data['FizFace']['value'].'<br>';
echo 'Логин: '.$data['login']['value'].'<br>';
echo 'Пароль: '.$data['password']['value'].'<br>';


?>

