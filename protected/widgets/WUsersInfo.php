<?
class WUsersInfo extends CWidget
{
    //Yii::app()->clientScript->registerCssFile('css/CUserStatusBars.css');
    public function init()
    {
        $allHtml = 'Здравствуйте, ';
        if(Yii::app()->user->isGuest){
            $allHtml.= 'БОМЖ';
        }else{
            $user = Users::model()->findByPk(Yii::app()->user->getId());
            if($user == null) return;
            $allHtml.= $user->login;
        }

        echo $allHtml;
    }

    public function run()
    {
    }

}