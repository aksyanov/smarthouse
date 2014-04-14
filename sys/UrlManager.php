<?php
class UrlManager{
    static $curPage = '';
	static function getRouteFromUrl(){
		
		$url = $_SERVER['REQUEST_URI'];

        $test = true;
        if($test){
            $urls = explode('/',$url);
            unset($urls[1]);
            $url = implode('/',$urls);
        }

		$url = explode('?',$url);
		$url1 = $url[count($url)-1];
        $url = implode('?',$url);
		if($url1 == '' || $url1 == '/'){
			Controller::init('index');
            self::$curPage = '';
        }else{
			$url_parts = explode('/',$url);
			if($url_parts)
				if($url_parts[1] != ''){
					$class = $url_parts[1];
					$controller = ucfirst(strtolower($class)).'Controller';
					self::$curPage = strtolower($class);
					if(count($url_parts)==2)
						$controller::init($class);
					else if(count($url_parts)==3){
						$controller::init(ucfirst(strtolower($class)),$url_parts[2]);
                    }
				}else
					Controller::init('index');
		}		
	}
}
?>