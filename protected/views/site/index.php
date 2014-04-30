<div class="row">
    <div class="col-md-2">
        <h2>
            Датчики
        </h2><hr>

        <?php
            $this->widget('WTemps',array('params'=>array('all'=>true)));
        ?>

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
        </h2><hr>
        <?php
            $this->widget('WLight',array('params'=>array('all'=>true)));
        ?>
    </div>
</div>

<script>
    $("[name='my-checkbox']").bootstrapSwitch(function(){alert(1)});
    $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
        changeValueOfSwitch(this.value,state);
    });
</script>