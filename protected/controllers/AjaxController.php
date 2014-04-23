<?php

class AjaxController extends CController
{
    public function filters()
    {
        return array();
    }

    public function accessRules()
    {
        return array();
    }

	public function actionIndex()
	{
        echo json_encode(Ajax::getCalcTempalates());
	}

    public function actionGetCalcTemplates()
    {
        echo json_encode(Ajax::getCalcTempalates());
    }

    public function actionGetCalcElements()
    {
        echo json_encode(Ajax::GetCalcElements());
    }
    public function actionSaveCalc()
    {
        var_dump($_GET);
        //echo json_encode(Ajax::GetCalcElements());
    }
}
