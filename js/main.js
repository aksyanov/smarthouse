_sitePref = "/porfolio/index.php/";

$('.btn_delete_device').click(function(){deleteDevice(this)});
function deleteDevice(elem){
    var answer = $.ajax({url: "ajax/deleteDevice",async:false,dataType:"json",data:{"idDevice":elem.value}}).responseJSON;
    if(answer['status'] == 'error')
        alert('Some error');
    else ;


}

function renewDevicesCatalog(){

}

