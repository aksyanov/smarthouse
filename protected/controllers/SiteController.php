<?php

class SiteController extends CController
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
            /*array('deny',
                'actions'=>array('index'),
                'users'=>array('?'),
            ),

            array('allow',
                'actions'=>array('index'),
                'users'=>array('@'),
            ),

            array('allow',
                'actions'=>array('logout'),
                'users'=>array('*'),
            ),*/

        );
    }

	public function actionIndex()
	{
        $this->render('index');
	}

    public function actionLogin(){

        if(isset($_POST['login_b'])){
            $identity = new UserIdentity($_POST['login'],$_POST['password']);
            if($identity->authenticate()){
                Yii::app()->user->login($identity);
                $this->redirect(Yii::app()->user->returnUrl);
            }else{
                echo $identity->errorCode;
            }
        }
        $this->render('login');
    }


    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /*public function getMainPanel(){
        echo '

        <div class="row">
        <div class="col-md-2">
            <h2>
                Датчики
            </h2><hr>';

        $this->widget('WTemps',array('params'=>array('all'=>true)));

        echo '
            <br>
            <h3>
                Протечка (демо)
            </h3>
            <ul>
                <li>
                    <p class="bg-success">Ванная комната : Всё в норме</p>
                </li>
                <li>
                    <p class="bg-danger">Гостинная : <b>Прочтечка</b></p>
                </li>
            </ul>
        </div>
        <div class="col-md-2" style="margin-left: 50px">
            <h2>
                Управление
            </h2><hr>';

        $this->widget('WLight',array('params'=>array('all'=>true)));

        echo '
        </div>
        <div class="col-md-3" style="margin-left: 50px">
            <h2>
                Голосовое управление
            </h2><hr>';

        $this->widget('WSpeechControl');

        echo '
        </div>
    </div>';
    }*/



}
