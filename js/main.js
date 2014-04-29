_sitePref = "/porfolio/index.php/";

$('.btn_delete_device').click(function(){deleteDevice(this)});
$('.btn_renew_device').click(function(){renewDevicesCatalog()});

function deleteDevice(elem){
    $(elem).attr('disabled','true');
    $('#btn_renew_device').attr('disabled','true');
    $('#prelod_renew').show();

    $.ajax({url: "ajax/deleteDevice",dataType:"json",data:{"idDevice":elem.value},success: function(answer){
        if(answer['status'] == 'error'){
            alert('Some error');
            $('#btn_renew_device').removeAttr('disabled');
            $('#prelod_renew').hide();
            $(elem).removeAttr('disabled');
        }else
           renewDevicesCatalog();
    }});
}

function renewDevicesCatalog(){
    $('#btn_renew_device').attr('disabled','true');
    $('#prelod_renew').show();

    $.ajax({url: "ajax/GetDevicesCatalogInHtmlTable",success: function(answer){
        $('#tableDevicesCatalog').html(answer);
        $('#btn_renew_device').removeAttr('disabled');
        $('#prelod_renew').hide();

        $('.btn_delete_device').click(function(){deleteDevice(this)});
        $('.btn_renew_device').click(function(){renewDevicesCatalog()});
    }})
}

