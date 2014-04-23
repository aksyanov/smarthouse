<?php

class CalcController extends CController
{
	public $layout='main';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

    public function accessRules()
    {
        return array(
        );
    }

	public function actionIndex()
	{
        $groups = CalcGroups::model()->findAll();
		$this->render('index',array('groups'=>$groups));
	}

}
