function setMessage(formName,id,msg,msgType)
{
    var el = $('#'+formName+' [name="'+id+'"]');
    switch (msgType)
    {
        case "error":
            if(el.next('.help-block').length > 0){
                el.next('.help-block').html(msg);
            }else{
                el.parent().next('.help-block').html(msg);
            }
            el.closest(".form-group").removeClass("has-warning has-success").addClass("has-error");
            break;
        case "warning":
            el.next('.help-block').html(msg);
            el.closest(".form-group").removeClass("has-error has-success").addClass("has-warning");
            break;
        case "success":
            if(el.next('.help-block').length > 0){
                el.next('.help-block').html(msg);
            }else{
                el.parent().next('.help-block').html(msg);
            }
            el.closest(".form-group").removeClass("has-warning has-error").addClass("has-success");
            break;
    }
}
