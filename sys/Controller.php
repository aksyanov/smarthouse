<?php

class Controller{

	static function init($class,$index = false){
		$class.='Controller';
		if(!$index){
			$class::actionIndex();
		}else{
			$index = 'action'.$index;
			$class::$index();
		}
	}
	
	static protected function render($controller,$view,$params = null,$layout = 'main'){
		if($params){
			foreach($params as $key=>$value){
				$$key = $value;
			}
		}
        $interface = str_replace('Controller','',$controller);

        include_once(ROOT_PATH.'/interfaces/layout/'.$layout.'.php');
		include_once(ROOT_PATH.'/interfaces/'.$interface.'/'.$view.'.php');
        include_once(ROOT_PATH.'/interfaces/layout/'.$layout.'END.php');
	}
}

?>