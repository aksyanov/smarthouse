_sitePref = "/porfolio/index.php/";

$('.btn_delete_device').click(function(){deleteDevice(this)});
$('.btn_renew_device').click(function(){renewDevicesCatalog()});
$('#renewMainPanel').click(function(){renewMainPanel()});
$('#btn_renew_datch').click(function(){renewMainPanelEl('datch')});
$('#btn_renew_light').click(function(){renewMainPanelEl('light')});


$("[name='my-checkbox']").bootstrapSwitch(function(){alert(1)});
$('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
    changeValueOfSwitch(this.value,state);
});

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

function changeValueOfSwitch(id,value){
    $("#switchId_"+id).attr('disabled','true');
    //$('#prelod_renew').show();

    $.ajax({url: "ajax/ChangeValueOfSwitch",dataType:"json",data:{"idDevice":id,"value":value},success: function(answer){
        if(answer['status'] == 'error')
            alert('Some error');
        $("#switchId_"+id).removeAttr('disabled');
    }})
}

function speechAction(){
    $('#prelod_renew_main').fadeIn();
    speech = $("#speechInput");
    $.ajax({url: "ajax/SpeechAction",dataType:"json",data:{"speechText":speech.val()},success: function(answer){
        if(answer['status'] == 'error'){
            alert('Some error');
            $('#prelod_renew_main').fadeOut();
        }
        else{
            $('#prelod_renew_main').fadeOut();
            var htmlText = answer['htmlText'];
            var htmlTextCommand = answer['htmlTextCommand'];
            var htmlTextAnswer = answer['htmlTextAnswer'];
            if(htmlTextAnswer == undefined)
                htmlTextAnswer = 'Нет результата';
            if(htmlText == undefined)
                htmlText = 'Нет результата';
            if(htmlTextCommand == undefined)
                htmlTextCommand = 'Нет результата';

            var html = '<div class="alert alert-warning alert-dismissable">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                            htmlText+'<br>'+htmlTextCommand+
                        '</div>';

            var html2 = '<div class="alert alert-success alert-dismissable">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                            '<strong>Ответ:</strong> '+htmlTextAnswer+
                        '</div>';

            $("#speechAnswer").prepend(html+html2);
            renewMainPanelEl('light');

        }
    }})
}


//don`t use
function renewMainPanel(){
    $('#prelod_renew_main').fadeIn();

    $.ajax({url: "ajax/GetMainPanel",success: function(answer){
        $('#mainPanel').html(answer);
        $('#prelod_renew_main').fadeOut();

        $("[name='my-checkbox']").bootstrapSwitch(function(){alert(1)});
        $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
            changeValueOfSwitch(this.value,state);
        });
    }})
}

function renewMainPanelEl(type){
    $('#prelod_renew_main').fadeIn();

    if(type == 'datch')
        $.ajax({url: "ajax/GetDatchWidget",success: function(answer){
            $('#mainPanelDatch').html(answer);
            $('#prelod_renew_main').fadeOut();
        }})
    else if(type == 'light')
        $.ajax({url: "ajax/GetLighthWidget",success: function(answer){
            $('#mainPanelLight').html(answer);
            $('#prelod_renew_main').fadeOut();

            $("[name='my-checkbox']").bootstrapSwitch(function(){alert(1)});
            $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
                changeValueOfSwitch(this.value,state);
            });
        }})
}