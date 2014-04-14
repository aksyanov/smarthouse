<?php
class IndexController extends Controller
{

	static function actionIndex(){
		self::render('index','index',array('oneParam'=>'one','twoParam'=>'two'));
	}
	
	static function actionQwe(){
		self::render('index','index',array('param1'=>'sd','twoParam'=>'two'));
	}
}
 
?>