$(document).ready(function () {


var app = setInterval(function() {
/*
    $.post(
        '../../../api/web-exams/timer')
    .done(function(data) {
        console.log('done');
    })
    .fail(function() {
        console.log('fail');
    })
    .always(function() {
        console.log('always');
    });
*/
        var csrf = $('input[name=_csrfToken]').val();
        $.ajax({
            url: '../../../api/web-exams/timer',
            type: "POST",
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-Token', csrf);
            },
            dataType: "JSON",
            success : function(data, dataType){
                console.log('成功');
                console.log(data);
            },
            error: function(data, dataType){
                console.log('失敗');
                console.log(data);
            }
        });

} , 5000 );

});
