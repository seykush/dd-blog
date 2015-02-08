$(function() {


    var error = getParameterByName('error');
    var success_msg = getParameterByName('success_msg');
    if(error == 'access'){
        new PNotify({
            title: 'Ошибка!',
            text: 'У вас недостаточно прав',
            styling: 'bootstrap3',
            type: 'error'
        });
        history.pushState('', '', location.pathname);
    }
    if(success_msg != ''){
        new PNotify({
            title: 'Успешно!',
            text: success_msg,
            styling: 'bootstrap3',
            type: 'success',
            delay: 1000
        });
        history.pushState('', '', location.pathname);
    }
});


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}