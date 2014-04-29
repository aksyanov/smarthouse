<?
class WTemps extends CWidget
{
    public $params = array('all'=>false);

    public function init()
    {
        echo '<h3>
                Температура
            </h3>';

        if($this->params['all']){
            $types = DevicesType::model()->with('DevicesCatalog')->findAll(array("condition"=>"t.name LIKE 'temperature'"));
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
                            '.$device->name.': <b>59&deg</b>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                                <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                                <div class="progress-bar progress-bar-success" style="width: 10%"></div>
                                <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                                <div class="progress-bar progress-bar-danger" style="width: 15%"></div>
                            </div>
                        </li>
                ';
            }
            echo '</ul>';


        }

    }

    public function run()
    {
    }

}

/*<li>
    Гостинная: <b>25&deg</b>
    <div class="progress">
        <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
        <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
        <div class="progress-bar progress-bar-success" style="width: 7%"></div>
    </div>
</li>*/