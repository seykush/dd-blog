$(function() {
    // Validation
    $('#loginForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'POST',
            url : '/admin/main/ajax_login',
            data :$('#loginForm').serialize(),
            dataType: 'json',
            error : function()
            {
                alert("Ajax");
            },
            success :function(data){
                if(data['status'] === "success"){
                    document.location.href = "/admin/";
                } else if (data['errors']['system_error'] != "") {
                    alert(data['errors']['system_error']);
                } else{
                    $.each(data['field_data'],function(key,val){
                        if(val['error'].length !== 0){
                            setMessage("loginForm",val['field'],val['error'],"error");
                        } else {
                            setMessage("loginForm",val['field'],val['error'],"success");
                        }
                    });
                }
            }
        });
    });
});