<?php
class OWFS
{
    public static $ow;

    public static function init(){
        if(!function_exists('bcadd')){
            if (file_exists("/opt/owfs/bin/bcadd.php"))
                require "/opt/owfs/bin/bcadd.php";
            elseif (file_exists("bcadd.php"))
                require "bcadd.php";
            else
                die("File 'bcadd.php' is not found.");
        }

        if(file_exists("/opt/owfs/bin/ownet.php"))
            require "/opt/owfs/bin/ownet.php";
        elseif (file_exists("ownet.php"))
            require "ownet.php";
        else
            die("File 'ownet.php' is not found.");

        self::$ow = new OWNet("tcp://localhost:3000");
    }

    public static function getValueByID($device_id = "", $key_ch = ""){
//        if(self::$ow == undefined)
//            self::init();

        $device = DevicesCatalog::model()->findByPK($device_id);
        if($device == null)
            return 'Don`t find device';

        $key_addr = $device->address;
        $curValue = $device->cur_value;

        if ( empty($key_ch) )
            $key_ch = "PIO";
        else
            $key_ch = "PIO.".$key_ch;

//        $cpio = self::$ow->get("$key_addr/$key_ch");
//        return $cpio;
        return $curValue;
    }

    public static function setValueByID($device_id = "", $value, $key_ch = ""){
//      if(self::$ow == undefined)
//            self::init();

        $device = DevicesCatalog::model()->findByPK($device_id);
        if($device == null)
            return 'Don`t find device';

        $key_addr = $device->address;

        if ( empty($key_ch) )
            $key_ch = "PIO";
        else
            $key_ch = "PIO.".$key_ch;

        //self::$ow->set("$key_addr/$key_ch", $value);
        $device->cur_value = $value;
        $device->save();
    }



    //Метод для примера
    public static function key_switch($key_label = "", $key_pio = 0, $key_ch = ""){
        $cpio = self::getValueByID($key_label, $key_ch );
        if ( $cpio != $key_pio ){
            //self::$ow->set("$key_addr/$key_ch", $key_pio);
            // Запись состояния устройства в БД (для вывода информации на домашнем сайте)
            //write_list($keys_id, "key_pio='$key_pio'", "key_label='$key_label'");
            // Запись события в журнал
            //write_list(get_id_cl("keys_journal", 1), "SYSDATE(), $key_tmpID, '$key_pio'");
        }
    }

}
