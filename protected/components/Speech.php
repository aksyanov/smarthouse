<?php

class Speech
{
    static public function init(){

        $htmlText = '';
        //Получаем запрос и разбивам по пробелам на массив
        $text = $_GET['speechText'];
        $arrayText = explode(" ",$text);
        $arrayTextCopy = $arrayText;
        $readyCommand = false;

        //Проверяем, присутсвует ли ключевое слово компьютера
        foreach($arrayText as $el){
            $brain = VoiceActions::model()->with('VoiceSynonyms')->findAll(array("condition"=>"t.desc LIKE 'brain' AND VoiceSynonyms.word LIKE '".$el."'"));

            if(empty($brain)){
                $readyCommand = false;
            }else{
                $el = '';
                $readyCommand = true;
                break;
            }
        }
        if($readyCommand)
            $htmlText.='Готов к запросу!<br>';
        else{
            $htmlText.='Не запрос к Чарльзу';
            return array('htmlText'=>$htmlText,'status'=>'ok');
        }

        //Ищем есть ли ключевое слово действия
        $readyDo = false;
        foreach($arrayText as $el){
            $do = VoiceActions::model()->with('VoiceSynonyms','VoiceTypes')->findAll(array("condition"=>"VoiceTypes.type LIKE 'do' AND VoiceSynonyms.word LIKE '".$el."'"));

            if(empty($do)){
                $readyDo = false;
            }else{
                $readyDo = true;
                $_actionDo = $do[0]['desc'];
                break;
            }
        }

        if($readyDo)
            $htmlText.="Найдено дейсвтие $_actionDo <br>";
        else{
            $htmlText.='Не найдено действие';
            return array('htmlText'=>$htmlText,'status'=>'ok');
        }


        //Ищем есть ли ключевое слово над чем выполнить операцию
        $ready = false;
        foreach($arrayText as $el){

            $what = VoiceActions::model()->with('VoiceSynonyms','VoiceTypes')->findAll(array("condition"=>"VoiceTypes.type LIKE 'what' AND VoiceSynonyms.word LIKE '".$el."'"));

            if(empty($what)){
                $ready = false;
            }else{
                $ready = true;
                $_actionWhat = $what[0]['desc'];
                break;
            }
        }

        if($ready)
            $htmlText.="Найдено над чем выполнить дейсвтие $_actionWhat <br>";
        else{
            $htmlText.='Не найдено над чем выполнить действие';
            return array('htmlText'=>$htmlText,'status'=>'ok');
        }


        //Ищем есть ли ключевое слово где выполнить действие
        $ready = false;
        foreach($arrayText as $el){

            $where = VoiceActions::model()->with('VoiceSynonyms','VoiceTypes')->findAll(array("condition"=>"VoiceTypes.type LIKE 'where' AND VoiceSynonyms.word LIKE '".$el."'"));

            if(empty($where)){
                $ready = false;
            }else{
                $ready = true;
                $_actionWhere = $where[0]['desc'];
                break;
            }
        }

        if($ready)
            $htmlText.="Найдено где выполнить дейсвтие $_actionWhere <br>";
        else{
            $htmlText.='Не найдено где выполнить действие';
            return array('htmlText'=>$htmlText,'status'=>'ok');
        }

        //Если находим выводим текст команды и выполняем её
        $htmlTextCommand = $_actionDo.' '.$_actionWhat.' '.$_actionWhere;
        $htmlTextAnswer = self::doAction($_actionDo,$_actionWhat,$_actionWhere);
        return array('htmlText'=>$htmlText,'status'=>'ok','htmlTextAnswer'=>$htmlTextAnswer,'htmlTextCommand'=>$htmlTextCommand);
    }


    static public function doAction($_actionDo,$_actionWhat,$_actionWhere){
        if($_actionDo == 'turnoff')
            return self::turnOff($_actionWhat,$_actionWhere);
        else if($_actionDo == 'turnon')
            return self::turnOn($_actionWhat,$_actionWhere);
        else{
            return 'Действие неверно';
        }
    }

    static public function turnOn($_actionWhat,$_actionWhere){
        if($_actionWhat == 'light')
            return self::turnOnLight($_actionWhere);
        else if($_actionWhat == 'power')
            return self::turnOnPower($_actionWhere);
        else{
            return 'Над чем действие неверно';
        }
    }

    static public function turnOff($_actionWhat,$_actionWhere){
        if($_actionWhat == 'light')
            return self::turnOffLight($_actionWhere);
        else if($_actionWhat == 'power')
            return self::turnOffPower($_actionWhere);
        else{
            return 'Над чем действие неверно';
        }
    }




    static public function turnOnLight($_actionWhere){
        if($_actionWhere=='kitchen'){
            OWFS::setValueByDesc('Свет в кухне',1);
            return 'Я включил свет на кухне';
        }else if($_actionWhere=='bedroom'){
            return 'Я включил свет в спальне';
        }else{
            return 'Где сделать неверно';
        }
    }

    static public function turnOffLight($_actionWhere){
        if($_actionWhere=='kitchen'){
            OWFS::setValueByDesc('Свет в кухне',0);
            return 'Я выключил свет на кухне';
        }else if($_actionWhere=='bedroom')
            return 'Я выключил свет в спальне';
        else{
            return 'Где сделать неверно';
        }
    }

    static public function turnOnPower($_actionWhere){
        if($_actionWhere=='kitchen')
            return 'Я включил электричество на кухне';
        else if($_actionWhere=='bedroom')
            return 'Я включил электричество в спальне';
        else{
            return 'Где сделать неверно';
        }
    }

    static public function turnOffPower($_actionWhere){
        if($_actionWhere=='kitchen')
            return 'Я выключил электричество на кухне';
        else if($_actionWhere=='bedroom')
            return 'Я выключил электричество в спальне';
        else{
            return 'Где сделать неверно';
        }
    }

}
