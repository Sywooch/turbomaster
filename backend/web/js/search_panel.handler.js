$(document).ready(function() {

    $("select").styler();

    function closeSearchPanel()  {
        $('#table-find-products thead tr').hide();
        $('#table-find-products tbody tr').remove();
        $('#btn-add-product').hide();
        $('.flying-block').hide();
        removeOverlay();
    }

    function showSearchPanel()  {
        if($('#table-find-products tbody tr').length > 0) {
            $('#table-find-products thead tr').show();
        }
        createOverlay();
        var leftPos = ($(window).width() /2) - ($('.flying-block').outerWidth() /2);
        $('.flying-block').css({left: leftPos, top: 90}).show().appendTo('body');
    }    

    
    $('.hide-search-panel').click(function(event){
        event.preventDefault();
        closeSearchPanel();
    });
    $('.show-search-panel').click(function(event){ 
        event.preventDefault();
        showSearchPanel(); 
    });


    $('#btn-add-product').click(function(event){ 
        event.preventDefault();


        var productId = $('input[name=product_id]:checked', '#form-search-panel').val();

        if(productId) {
            $('#' +inputProductId).val(productId);

            if (typeof responseSubmitSearchPanel == 'function') {
                responseSubmitSearchPanel();
            }
            closeSearchPanel();
        }
    });


    $("#dropDownBrands").on('change', function() {
        var s = $(this).val();
        var params = {
            action:       '/brand/modellist',
            targetId:     'dropDownModels',
            prompt:       '--Модель--',
            warpTargetId: 'warpDropDownModels',
            };
        $.get(params.action, {'id': s}, 
        function(data) {    
            var $targetId     = $('#' +params.targetId);
            var $warpTargetId = $('#' +params.warpTargetId);
            $targetId[0].options.length = 0;     

            if(data.length > 0)  {
                $targetId.append($('<option/>').attr('value', '').text(params.prompt));
                $.each(data, function(i, val) {
                    $targetId.append($('<option/>').attr('value', val.id).html(val.name)); 
                })
                $targetId.trigger('refresh'); 
            } 
        }); // end get
    });  

     $( "#inputPartnumber" ).autocomplete({
      source: function(request, response){
        $.ajax({
          url: "/product/index",
          data:{
            'brand_id':           $('#dropDownBrands').val(),
            'model_id':           $('#dropDownModels').val(),
            'manufacturer_id':    $('#manufacturer_id').val(),
            'type':               $('#type_id').val(),
            'state':              $('#state_id').val(),
            'partnumber':         $('#inputPartnumber').val(),
          },
          success: function(data){
            // приведем полученные данные к необходимому формату 
            response($.map(data, function(item){
              return {
                label:        item.name + ", " + item.partnumber,
                product_id:   item.id,
                product_name: item.name,
                brand_alias:  item.brand_alias,
                model_alias:  item.model_alias,
                partnumber:   item.partnumber
              }
            }));
          }
        });
      },
      select: function(event, ui) { 
        if (typeof responsePartnumberAutocomplete == 'function') {
            responsePartnumberAutocomplete(event, ui);
            closeSearchPanel();
        }
      },
      minLength: 3
    });
        
    $('#submit-search-panel').click(function(event){
        event.preventDefault();
        $.ajax({
            url: '/product/index',
            type: 'get',
            data:{
                'brand_id':           $('#dropDownBrands').val(),
                'model_id':           $('#dropDownModels').val(),
                'manufacturer_id':    $('#manufacturer_id').val(),
                'type':               $('#type_id').val(),
                'state':              $('#state_id').val(),
                'partnumber':         $('#inputPartnumber').val(),
            },
            success: function(response){
                var tbl = $('#table-find-products');
                var tbody = tbl.children('tbody');
                var tr, td;

                tbody.children('tr').remove();
                
                if(response.length > 0)  {
                    $.each(response, function(i, val) {
                        tr = $('<tr/>');
                        $('<td/>').text(val.name).appendTo(tr);
                        $('<td/>').text(val.partnumber).appendTo(tr);
                        td = $('<td/>');
                        $('<input/>', { type: 'radio', name: 'product_id', value: val.id }).appendTo(td);
                        td.appendTo(tr);  
                        tr.appendTo(tbody);  
                        $('input[type="radio"]').styler();
                    });
                    tbl.show();
                    $('#btn-add-product').show();
                } 
              }
        });
    });
 

});  