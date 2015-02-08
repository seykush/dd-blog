function setMessage(formName,id,msg,msgType)
{
    var el = $('#'+formName+' [name="'+id+'"]');
    var status = el.hasClass('no-status');
    if(status){
        return false;
    }
    switch (msgType) {
        case "error":
            if(el.next('.help-block').length > 0){
                el.next('.help-block').html(msg);
            }else{
                el.parent().next('.help-block').html(msg);
            }
            el.closest(".form-group").removeClass("has-success").addClass("has-error");
            break;
        case "success":
            if(el.next('.help-block').length > 0){
                el.next('.help-block').html(msg);
            }else{
                el.parent().next('.help-block').html(msg);
            }
            el.closest(".form-group").removeClass("has-error").addClass("has-success");
            break;
    }
}

function showFormResult(formName, data, errorFields)
{
    if(data['status'] === 'success') {
        document.location.href = data['success_url'];
    }
    if(data['form_error'] != '') {
        new PNotify({
            title: 'Ошибка!',
            text: data['form_error'],
            styling: 'bootstrap3',
            type: 'error'
        });
        if(typeof errorFields !== 'undefined')
        {
            $.each(errorFields,function(key,val){
                setMessage(formName,val,'','error');
            });
            return false;
        }
    }
    $.each(data['fields'],function(key,val){
        if(typeof data['errors'][val] !== 'undefined'){
            setMessage(formName,val,data['errors'][val],'error');
            new PNotify({
                title: 'Ошибка!',
                text: data['errors'][val],
                styling: 'bootstrap3',
                type: 'error'
            });
        }else{
            setMessage(formName,val,'','success');
        }
    });
}
