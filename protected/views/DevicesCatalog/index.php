<div class="btn-group">
    <button type="button" class="btn btn-default">Добавить</button>
    <button id="btn_renew_device" type="button" class="btn btn-default btn_renew_device">Обновить<img id="prelod_renew" style="display: none;width: 17px;margin-left: 10px;" src="<?php echo Yii::app()->request->baseUrl;?>/img/preloader.gif"></a></button>
</div>
<div id="tableDevicesCatalog">
<?php
    echo General::GetDevicesCatalogInHtmlTable();
?>
</div>


