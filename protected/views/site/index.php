<div class="row">
    <div class="col-md-2">
        <h2>
            Датчики
        </h2><hr>

        <?php
            $this->widget('WTemps',array('params'=>array('param1'=>'param1sdaasda')));
        ?>

        <h3>
            Температура
        </h3>
        <ul>
            <li>
                Гостинная: <b>25&deg</b>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                    <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                    <div class="progress-bar progress-bar-success" style="width: 7%"></div>
                </div>
            </li>
            <li>
                Кухня: <b>59&deg</b>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                    <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                    <div class="progress-bar progress-bar-success" style="width: 10%"></div>
                    <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                    <div class="progress-bar progress-bar-danger" style="width: 15%"></div>
                </div>
            </li>
            <li>
                Ванная комната: <b>20&deg</b>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                    <div class="progress-bar progress-bar-warning" style="width: 18%"></div>
                </div>
            </li>
        </ul>
        <br>
        <h3>
            Протечка
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
        </h2><hr>
        <h3>
            Освещение
        </h3>
        <ul>
            <li>
                <b>Гостинная</b><br>
                <input type="checkbox" name="my-checkbox">
            </li>
            <br>
            <li>
                <b>Кухня</b><br>
                <input type="checkbox" name="my-checkbox" checked>
            </li>
        </ul>
    </div>
</div>

<script>$("[name='my-checkbox']").bootstrapSwitch();</script>