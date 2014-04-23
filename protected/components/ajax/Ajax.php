<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aksyanovs
 * Date: 17.09.13
 * Time: 21:18
 * To change this template use File | Settings | File Templates.
 */

Class Ajax{
    static function getCalcTempalates(){
        if(!isset($_GET['idGroupCalc']))
            return array();

        $allTemplates = CalcTemplates::model()->findAll('calc_groups_id=? AND show_menu=?',array($_GET['idGroupCalc'],1));

        $returnArray = array();
        $count = 0;
        foreach($allTemplates as $template){
            foreach($template as $key => $value){
                $returnArray[$count][$key] = $value;
            }
            $count++;
        }

        return $returnArray;
    }

    static function GetCalcElements(){
        if(!isset($_GET['idTemplateCalc']))
            return array();

        $allTemplates = CalcElements::model()->findAll('calc_groups_id=?',array($_GET['idTemplateCalc']));

        $returnArray = array();
        $count = 0;
        foreach($allTemplates as $template){
            foreach($template as $key => $value){
                $returnArray[$count][$key] = $value;
            }
            $count++;
        }

        return $returnArray;
    }
}
