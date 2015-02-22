$(document).ready(function() {

   

    function hideTableColumns(target, columns, toggleWidth = 768) {
       
       var total = '';

       for(var i = 0, size = columns.length; i < size; i++) {
            total += columns[i];
       }

       $('#test-a').text(total)

       // $.each(columns, function(i, column) { 
       //      var els =  target + ' td:nth-child(' + column + '), ' + target + ' th:nth-child(' + column + ')';
       //      if($(window).width() < toggleWidth) {
       //          // els.hide();
       //          alert('less')
       //      }  else {
       //          alert('bigger')
       //          // els.show();
       //      }
       //  });
    }

    hideTableColumns('#table-popular', [1, 3, 6]);

    // $(window).resize(function(){
    //      hideTableColumns('#table-popular', [1, 3, 6]);
    // });





}); 



