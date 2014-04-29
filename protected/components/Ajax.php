<?php
Class Ajax{
    static function deleteDevice(){
         if(!isset($_GET['idDevice']))
            return array('status'=>'error');

        $device=DevicesCatalog::model()->findByPk($_GET['idDevice']);
        if($device == null)
            return array('status'=>'error');

        $device->delete();
        return array('status'=>'ok');
    }

    static function GetDevicesCatalog(){
        if(!isset($_GET['idDevice']))
            return array('status'=>'error');

        $device=DevicesCatalog::model()->findByPk($_GET['idDevice']);
        if($device == null)
            return array('status'=>'error');

        $device->delete();
        return array('status'=>'ok');
    }
}



/*foreach($allTemplates as $template){
    foreach($template as $key => $value){
        $returnArray[$count][$key] = $value;
    }
    $count++;
}*/
