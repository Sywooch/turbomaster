$(document).ready(function()    {

    $('#input-title').syncTranslit({destination: 'input-alias'});
    $("select").styler();

    $('#toggle-brief').click(function() {
        $('#wrap-brief').toggle('fast');
    });

    $('#toggle-meta').click(function() {
        $('#wrap-meta').toggle('fast');
    });
   

    $("#dropDownMainRubrics").on('change', function() {
        var s = $(this).val();
        var params = {
            'action':'/rubric/mainlist',
            'targetId':'dropDownRubrics',
            'prompt': '--Рубрика--',
            'warpTargetId':'warpDropDownRubrics',
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

}); 



