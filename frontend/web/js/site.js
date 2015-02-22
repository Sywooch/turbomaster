$(document).ready(function() {

    $('.stylerize').styler();

    function hideTableColumns(target, columns) {
        var toggleWidth = 768;
        for(var i = 0, size = columns.length; i < size; i++) {
            var $items =  $(target + ' td:nth-child(' + columns[i] + '), ' + target + ' th:nth-child(' + columns[i] + ')');
            if($(window).width() < toggleWidth) {
                $items.hide();
            }  else {
               $items.show();
            }
        }
    }

    hideTableColumns('#table-popular', [1, 3, 6]);

    $(window).resize(function(){
         hideTableColumns('#table-popular', [1, 3, 6]);
    });





}); 



