// var and function for search_panel.handler.js:

var inputProductId = 'popular-product_id';

function responsePartnumberAutocomplete(event, ui) {
    $('#popular-product_id').val(ui.item.product_id); 
    $('#form-create-popular').submit();
}

function responseSubmitSearchPanel() {
    $('#form-create-popular').submit();
}


////////////////////////////////////////////////

$(document).ready(function() {
    $('.show_hidden_form').addClass('show-search-panel');

});  