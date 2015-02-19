$(document).ready(function() {

    $(".place-state").phantomSelect({
                      arOptions: ['Новый','Дан ответ','Ошибка'],
                      });


    $('.td-question-name span').click(function() {
        $('.td-question-content').hide();
        $(this).parents('div').next().slideDown('fast');
    });

});
    
