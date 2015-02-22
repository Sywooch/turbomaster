$(document).ready(function() {

    // $('.stylerize').styler();
    alert('two')
    var hideTableColumns = function(target, columns, toggleWidth = 768) {
       
       $(target).remove();
       return;

       $.each(columns, function(i, column) { 
            var els =  $(target + ' td:nth-child(' + column + '), ' + target + ' th:nth-child(' + column + ')');
            if($(window).width() < toggleWidth) {
                els.hide();
            }  else {
                els.show();
            }
        });
    }

    hideTableColumns('#table-popular', [1, 3, 6]);

    $(window).resize(function(){
         hideTableColumns('#table-popular', [1, 3, 6]);
    });





}); 



