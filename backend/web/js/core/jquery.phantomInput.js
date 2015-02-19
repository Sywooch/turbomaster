(function($) {

  $.fn.phantomInput = function(options) {
    
    var defaults = {
      urlPrefix:     '',
      urlController: '/ajax/universal',
      fieldName:     'name',
      btnOkText:     'Ok',
      btnCancelText: 'Cancel',
      inputCss:      'phantom-input',
      btnCss:        'phantom-button',
      createCss:     false
      };
       
    var o = $.extend(defaults, options);

    return this.each(function() {
      $(this).click( function(e) { 

        if($('.ph-identifier').size() ==0 && !$(e.target).closest('a')[0] )
        {
          var $this       = $(this);
          var tempText    = $this.text();
          var argums =  this.id.split('-');

          $this.empty(); 
          var $warp = $('<span />').appendTo($this);

          var $newInput = $('<input />')
                .attr('type', 'text')
                .addClass('ph-identifier')
                .val(tempText)
                .appendTo($warp)
                .focus();

          $('<a />')
            .text(o.btnOkText)
            .appendTo($warp)
            .bind('click', function() { 

              $warp.hide();

              $.post(o.urlPrefix + o.urlController, 
                {
                 'model':    argums[0],           
                 'field':    argums[1],           
                 'id':       argums[2],
                 'newvalue': $newInput.val(), 
                },
                function(data) {          
                  if(data.state == 'success'){
                    $this.text(data.newvalue);
                  } 
                }  
              );
            });  


          $('<a />')
            .text(o.btnCancelText)
            .appendTo($warp)
            .bind('click', function() {   
                  $warp.hide();
                  $this.text(tempText); 
                });

          $('<div />').css({'clear': 'both'}).appendTo($warp); 
    
          createCss($this);
          tuningInputWidth($this);
        }
      });
    });


    function  createCss($this) {

      if(o.createCss ==false)  {

        $('.ph-identifier').addClass(o.inputCss);
        $this.find('a').addClass(o.btnCss);

      } else {  
        $('.ph-identifier').css({
          'display':    'block', 
          'float':      'left',
          'width':      '70px',
          'margin':     '0 8px 0 0',
          'font':       '14px Arial,sans-serif', 
          'padding':    '2px',  
          'border':     '1px solid #51cbee',
          'box-shadow': '0 0 3px #51cbee'
        });

        $this.find('a').css({
          'display':    'block', 
          'float':      'left', 
          'height':     '18px',  
          'cursor':     'pointer', 
          'margin':     '-2px 0px 0px 8px', 
          'padding':    '4px 8px 0 8px',
          'background': '#f1f1f1',
          'border':     '1px solid #ccc', 
          'border-radius': '2px',
          'box-shadow': '0 1px 2px rgba(0, 0, 0, 0.2)',
          'font':       'bold 12px Tahoma,sans-serif', 
          'color':      '#777', 
          'text-align': 'center'   
        });
      }
    }


    function tuningInputWidth($this) {
 
      var btnsWidth =0, w =0;
      $this.find('a').each(function() { 
                      btnsWidth += $(this).outerWidth(true);
                      })
      w = $this.outerWidth(true) - (btnsWidth +38);
      w = (w > 370) ? 370 : w;
      $('.ph-identifier').outerWidth(w);
    }

  } 
})(jQuery);