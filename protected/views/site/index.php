<div id="mainPanel">
    <div class="row">
        <div class="col-md-2">
            <h2>
                Датчики <button id="btn_renew_datch" type="button" class="btn btn-default">Обновить</a></button>
            </h2><hr>
            <div id="mainPanelDatch">
            <?php
                $this->widget('WTemps',array('params'=>array('all'=>true)));
            ?>
            </div>
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
                Управление <button id="btn_renew_light" type="button" class="btn btn-default">Обновить</a></button>
            </h2><hr>
            <div id="mainPanelLight">
            <?php
                $this->widget('WLight',array('params'=>array('all'=>true)));
            ?>
            </div>
        </div>
        <div class="col-md-3" style="margin-left: 50px">
            <h2>
                Голосовое управление
            </h2><hr>
            <?php
                $this->widget('WSpeechControl');
            ?>
        </div>
    </div>
</div>

