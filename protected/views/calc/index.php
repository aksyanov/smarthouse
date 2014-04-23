<div id="c_mainClac" xmlns="http://www.w3.org/1999/html">

    <div id="calc_mainMenu">
        <div class="clac_header1">Что Вы желаете создать?</div>
        <?php
            foreach($groups as $group){
                echo ' <div class="clac_header2 calcGroup" id="calc_group_id_'.$group->id.'" idGroupCalc="'.$group->id.'">'.$group->sinonym.'</div>';
            }
        ?>
    </div>
    <div id="calc_chooseMenu">
        <div class="clac_header1">Создать с чистого листа</div>
        <div id="calc_template_id_-1" idTemplateCalc="-1" class="clac_header2 calc_template">Создать с чистого листа</div>
        <div class="clac_header1">... Или из шаблона</div>
        <div id="calc_templates"></div>
    </div>
    <div id="calc_createMenu">
        <div id="calc_elements">
            <div class="clac_header1 floatLeft">Элементы</div>
            <div id="calc_elementsSearch">
                Поиск
                <input type="text">
            </div>
            <div class="clear"></div>
            <div id="calc_elements_checkbox">
            </div>
        </div>
        <div id="calc_preview">
            <div class="clac_header1">Предпросмотр</div>
            <input id="calc_saveB" type="button" value="Сохранить">
        </div>
    </div>

</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/calc.js"></script>