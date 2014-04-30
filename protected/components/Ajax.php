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

    static function GetDevicesCatalogInHtmlTable(){
        $html = General::GetDevicesCatalogInHtmlTable();
        return $html;
    }

    static function ChangeValueOfSwitch(){
        if(!isset($_GET['idDevice'])||!isset($_GET['value']))
            return array('status'=>'error');

        $device=DevicesCatalog::model()->findByPk($_GET['idDevice']);
        if($device == null)
            return array('status'=>'error');

        if($_GET['value'] == 'true')
            $curValue = 1;
        else if($_GET['value'] == 'false')
            $curValue = 0;

        //OWFS::setValueByID($_GET['idDevice'], $curValue);
        $device->cur_value=$curValue;
        $device->save();

        return array('status'=>'ok');
    }

    static public function SpeechAction(){
        return Speech::init();
    }
}



/*foreach($allTemplates as $template){
    foreach($template as $key => $value){
        $returnArray[$count][$key] = $value;
    }
    $count++;
}*/
