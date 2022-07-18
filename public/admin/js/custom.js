$(document).ready(function() {

    //checar se a senha do admin esta correta ou não
    $("current_password").keyup(function() {
        var current_password = $("#current_password").val();
        /*alert(current_password); */
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/checkAdminPassword',
            data: {current_password: current_password},
            succes: function(resp) {
                if(resp == "false") {
                    $("#checkPassword").html("<font color='red'> Senha atual se encontra incorreta! </font>");
                } else if (resp == "true") {
                    $("#checkPassword").html("<font color='green'> Senha atual correta! </font>");
                }
            },error:function() {
                alert('Error');
            }
        });
    })
});