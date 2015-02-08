$(function() {
    $('#loginForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'POST',
            url : '/admin/main/ajax_login',
            data :$('#loginForm').serialize(),
            dataType: 'json',
            error : function()
            {
                alert("Что-то пошло не так :(");
            },
            success :function(data){
                showFormResult('loginForm',data,data['fields']);
            }
        });
    });
});