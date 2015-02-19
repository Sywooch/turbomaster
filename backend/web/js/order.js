$(document).ready(function() {

    $('select').styler();

    $('select').change(function(){
        this.form.submit();
    })

});  