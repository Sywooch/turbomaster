// function for search_panel.handler.js:

var inputProductId = 'mainpage-product_id';

function responsePartnumberAutocomplete(event, ui) {
    $('#mainpage-product_id').val(ui.item.product_id); 
    $('#place-for-product_name').text(ui.item.label);
}

function responseSubmitSearchPanel() {
    var el = $('input[name=product_id]:checked', '#form-search-panel');
    var tr = el.parents('tr');
    var fullname =  tr.children('td').first().text() + ', ' +
                    tr.children('td').eq(1).text();

    $('#place-for-product_name').text(fullname);
}


//......................



$(document).ready(function() {

    $('input[type="file"]').styler();

});  



