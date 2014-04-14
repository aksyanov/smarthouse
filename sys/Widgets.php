<?php
class Widgets {
    public $name = '';
    public $params;

    public function __construct($name,$params){
        $this->name = $name;
        $this->params = $params;

    }
    static function render($name,$params=null){
        $widgObj = new Widgets($name,$params);
        $widgObj->renderObj();
    }
    protected function renderObj(){
        $dir = ROOT_PATH.'/widgets/'.$this->name.'.php';
        if($this->params){
            foreach($this->params as $key=>$value){
                $$key = $value;
            }
        }
        include_once($dir);
    }
}