$(document).ready(function() {

    $('input[type="file"]').styler();
    $("span.dotted").phantomDot();

    var h = 0;
    var iconTopShift = 24;   // смещение иконки фотоап. от верхн. края абзаца
    var flagSubmitted = false;
    var paragraphBackground = '#f7f7f7';

    $("#icon_photo, p.overme").click(function() { showPhotoForm(); });
    $("#icon_video").click(function() { showVideoForm(); });

    $(".overme").mouseenter( function(){ 
        if(flagSubmitted == false)  {    
            $('#photo-input-pos').val($(this).data('parag'));

            // h = $(this).offset().top + $paragraph.outerHeight() - $('.content:eq(0)').offset().top - iconTopShift;
            $(this).css({'background': '#ddd'});
            h = $(this).offset().top - $('.content:eq(0)').offset().top -iconTopShift;

            $("#icon_photo").css({"top": h, "left": "750px"});                      
            $("#icon_video").css({"top": h, "left": "766px"});                      
        }  
    });

    $(".overme").mouseleave( function() { 
        $(this).css({'background': paragraphBackground});
    });

    //.................
    $("#photo-btn-submit").click( function(event){
        $('#wrap-form-photo textarea').css('height', '30px');
        $('.media-form').css({'left':'-10000px' })
    });

    $(".btn-cancel").click( function(event){
        event.preventDefault();
        flagSubmitted = false;
        $('#wrap-form-photo textarea').css('height', '30px');
        $('.media-form').css({'left':'-10000px' })
    });
    
    //................
    $(".subscribe-area").click( function(){ 

        var curentId = $(this).data('id');
        var $div = $(this); 
        var divHeight = $div.height();
        var tempText = $div.text();

        var newDiv = $('<div />');
        var $warpDiv = $(this).parent('div.wrap-image')
        var subscribeWidth = $warpDiv.width();
              
        flagSubmitted = true;
        hideIcon();
        $div.hide();

        var textArea = $('<textarea/>').addClass('textarea-subscribe')
                          .css({'height': divHeight +30, 'width': subscribeWidth -18 })
                          .val(tempText)
                          .appendTo(newDiv);
        $('<div/>').appendTo(newDiv);

        var btnCancel = $('<a />').appendTo(newDiv)
            .addClass('btn-mini micro')
            .text('Отмена')
            .click(function(){ 
                newDiv.remove();
                $div.show();
                flagSubmitted = false;
            }); 

        var btnOK = $('<a />').appendTo(newDiv)
            .addClass('btn-mini micro').text('Изменить')
            .click(function() {
                btnOK.remove();
                btnCancel.remove();
                $.post('/ajax/universal',  {
                        'model':    'photo_article',           
                        'field':    'subscribe',           
                        'id':       curentId,
                        'newvalue': textArea.val(), 
                    },
                    function(data){          
                        if(data.state == 'success'){
                            newDiv.remove();
                            $div.text(data.newvalue).show();
                            flagSubmitted = false; 
                        } 
                    }  
                );
            });    

        newDiv.appendTo($warpDiv);
        textArea.focus();    
    });
  


    function showPhotoForm()   {
        flagSubmitted = true;
        $('#wrap-form-photo').css({'top': h+50, 'left':'180px'});
        $('#wrap-form-photo textarea')
            .focus(function(){
                $(this).css('height', '70px');
            });
        hideIcon();
    } 
  
    function showVideoForm()    {
        flagSubmitted = true;
        $('#wrap-form-video').css({'top': h+54, 'left':'220px'});
        hideIcon();
    } 

    function hideIcon()  { 
        $("#icon_photo, #icon_video").css('left', -10000); 
    }

    $('.youTybe-wrap iframe').each(function(){
        var w = 480;
        var h = Math.round(w / $(this).attr('width') * $(this).attr('height'));
        $(this).attr({'width': w, 'height': h});
        $(this).parents('div').show();
    }); 

});  