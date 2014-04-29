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
	}

    public function actionDeleteDevice()
    {
        echo json_encode(Ajax::deleteDevice());
    }

    public function actionGetDevicesCatalogInHtmlTable()
    {
        echo Ajax::GetDevicesCatalogInHtmlTable();
    }
}
