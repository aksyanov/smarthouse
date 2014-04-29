<div class="btn-group">
    <button type="button" class="btn btn-default">Добавить</button>

</div>
<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Type</th>
        <th>Address</th>
        <th style="width: 20px">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $count = 0;
        foreach($devices as $device){
            $count++;
            echo '<tr>';
            echo '<td>'.$count.'</td>';

            echo '<td>'.$device->name.'</td>';
            echo '<td>'.$device->DevicesType->name.'</td>';
            echo '<td>'.$device->address.'</td>';

            echo '<td> <button type="button" class="btn btn-default btn_delete_device" value="'.$device->id.'">Удалить</button></td>';

            echo '</tr>';
        }
    ?>
    </tbody>
</table>

