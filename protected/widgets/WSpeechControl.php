<?
class WSpeechControl extends CWidget
{
    public function init()
    {
        echo '<input id="speechInput" type="text" style="font-size:25px;width: 100%" x-webkit-speech onchange=speechAction() onwebkitspeechchange=speechAction() />
        <br><br>
        <div id="speechAnswer">
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Внимание!</strong> Команда не введена
            </div>
        </div>';
    }

    public function run()
    {
    }

}