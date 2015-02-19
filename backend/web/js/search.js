$(document).ready(function() {

    $("select").styler();

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
                brand_alias:  item.brand_alias,
                model_alias:  item.model_alias,
                partnumber:   item.partnumber
              }
            }));
          }
        });
      },
      select: function(event, ui) { 
        window.location = '/product/update/' +ui.item.product_id;
      },
      minLength: 3
    });


});  //// $(document).ready


