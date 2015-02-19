$(document).ready(function()    {

  $('.place-call-status').addSelectPhantom({
                    arOptions: ['Перезвонить','Выполнен', 'Ошибка'],
                    urlPrefix: urlPrefix,
                    urlController: '/admin/index/ajaxDotUniversal',
                    });


}); 



