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
                echo '
                        <li>
                            <b>'.$device->name.'</b><br>
                            <input type="checkbox" name="my-checkbox" cheked>
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
