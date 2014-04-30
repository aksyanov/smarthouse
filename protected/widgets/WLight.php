<?
class WLight extends CWidget
{
    public $params = array('all'=>false);

    public function init()
    {
        echo '<h3>
                Освещение
            </h3>';

        if($this->params['all']){
            $types = DevicesType::model()->with('DevicesCatalog')->findAll(array("condition"=>"t.name LIKE 'key_light'"));
            if(count($types) == 0) return;

            $devices = $types[0]->DevicesCatalog;
            if(count($devices) == 0){
                echo 'Нет датчиков температуры';
                return;
            }

            echo '<ul>';
            foreach($devices as $device){
                $check = '';
                if($device->cur_value == 1)
                    $check = 'checked';

                echo '
                        <li>
                            <b>'.$device->name.'</b><br>
                            <input id="switchId_'.$device->id.'" type="checkbox" name="my-checkbox" value="'.$device->id.'" '.$check.'>
                        </li>
                        <br>
                ';
            }
            echo '</ul>';


        }
    }

    public function run()
    {
    }

}
