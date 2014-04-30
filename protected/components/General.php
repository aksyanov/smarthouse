<?php
class General
{
    static function GetDevicesCatalogInHtmlTable(){

        $html = '<table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th style="width: 20px">Action</th>
                    </tr>
                    </thead>
                    <tbody>';


        $devices = DevicesCatalog::model()->findAll();
        $count = 0;
        foreach($devices as $device){
            $count++;
            $html.='<tr>';
            $html.='<td>'.$count.'</td>';

            $html.='<td>'.$device->name.'</td>';
            $html.='<td>'.$device->DevicesType->name.'</td>';
            $html.='<td>'.$device->address.'</td>';

            $html.='<td><button type="button" class="btn btn-default btn_delete_device" value="'.$device->id.'">Удалить</button></td>';

            $html.='</tr>';
        }

        $html.='    </tbody>
                </table>';

        return $html;
    }

}
