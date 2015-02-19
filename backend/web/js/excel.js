$(document).ready(function() {

    $('input[type=file]').styler();
 
    $('#file-submit-button').click(function(event){
       $('#form-excel-upload').submit();
    });

});  