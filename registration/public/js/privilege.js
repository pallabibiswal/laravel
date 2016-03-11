$(document).ready(function () { 
    $("#selectrole").on("change",function() {
        var role_id = $("#selectrole").val();
        var request = 'postprivilege';
        $.ajax({
            method: 'GET',
            url: request,
            dataType: 'html',
            data: {
              role: role_id
            },
            success: function( htmldata ) {
                $("#display").html(htmldata);
            }
        }); 
    });
});


function editPrivilege(result,role_id,resource_id,operation_id)
{  
    $.ajax({
        method: 'POST',
        url: 'editprivilege',
        dataType: 'json',
        data: {
        result:result,
        role_id: role_id,
        resource_id: resource_id,
        operation_id: operation_id
        },
        success: function(response){

        }
    }); 
}