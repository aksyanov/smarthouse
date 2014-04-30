<?
//30% Очень холодно
//30% Холодно 60
//10% Норма 70
//20% Жарко 90
//10% Очень жарко 100
//
//25 градусов = норма (65%)
//-40 градусов = минимум (0%)
//1 градус = 1 процент
class WTemps extends CWidget
{
    public $params = array('all'=>false);
    public $normTemp = 25;
    public $minTemp = -40;

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
                $curValue = OWFS::getValueByID($device->id);
                if($curValue<0)
                    $curProc = ($this->minTemp - $curValue)*-1;
                else
                    $curProc = ($this->minTemp*-1) + $curValue;


                $progressBar = '';
                if($curProc>30)
                    $progressBar.=$this->getHtml(30,'danger');
                else
                    $progressBar.=$this->getHtml($curProc,'danger');

                if($curProc>30 && $curProc>60)
                    $progressBar.=$this->getHtml(30,'warning');
                else if($curProc>30 && $curProc<=60)
                    $progressBar.=$this->getHtml($curProc-30,'warning');

                if($curProc>60 && $curProc>70)
                    $progressBar.=$this->getHtml(10,'success');
                else if($curProc>60 && $curProc<=70)
                    $progressBar.=$this->getHtml($curProc-60,'success');

                if($curProc>70 && $curProc>90)
                    $progressBar.=$this->getHtml(20,'warning');
                else if($curProc>70 && $curProc<=90)
                    $progressBar.=$this->getHtml($curProc-70,'warning');

                if($curProc>90 && $curProc>100)
                    $progressBar.=$this->getHtml(10,'danger');
                else if($curProc>90 && $curProc<=100)
                    $progressBar.=$this->getHtml($curProc-90,'danger');



                echo '
                        <li>
                            '.$device->name.': <b>'.$curValue.'&deg</b>
                <div class="progress">
                '.$progressBar.'
                </div>
                        </li>';
            }

            echo '</ul>';


        }

    }

    public function getHtml($proc,$style){
        return '<div class="progress-bar progress-bar-'.$style.'" style="width: '.$proc.'%"></div>';
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