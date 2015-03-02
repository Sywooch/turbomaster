$(document).ready(function() {



    var fadeRotator = function(paneBox, options) {
        
        var defaults = {
            mode: 'fade',               // 'fade', 'none', default: 'fade'
            // CONTROLS
            outControls: true,          // default: false
            outControlsBox: '',         // eg '#controls-wrap',  
            createNavigation: false,    // default: false
            // AUTO
            infiniteLoop: true,         // default: true
            auto: true,                 // default: true
            pause: 2000,
            autoStart: true,
            delay: 10000,
        };

        var panes = $(paneBox +' > .pane-item'),
            countItems = panes.length,
            controls = false,
            currentIndex = 0,
            intervalId,
            currentPane;

  
        var init = function() {
            options = $.extend(defaults, options);
            if(options.outControls && options.outControlsBox) {
                controls = $(options.outControlsBox + ' > li');
            }

            if(options.infiniteLoop === true) {
                startLoop();
            }
        }

        var nextPane = function(index) {
            currentPane = panes.eq(index);
            panes.animate({opacity: 0}, 300);
            setTimeout(function() {
                panes.hide();
                currentPane.show().animate({opacity: 1}, 600);
            }, 300); 
        }

        var changeControlElement = function(index) {
            if(controls) {
                console.log('controls.eq = ' + index)  ////

                controls.removeClass('active');
                controls.eq(index).addClass('active');
            }
        }

        var startLoop = function() {
            clearInterval(intervalId);
            console.log('options.outControls = ' + options.outControls);
            
            intervalId = setInterval(function() {
                currentIndex = (currentIndex < countItems ) ? currentIndex : 0;
                if(options.outControls === true) {
                    changeControlElement(currentIndex);
                }
                nextPane(currentIndex);
                currentIndex += 1;
            }, options.pause);
        }

        init();
    };   

    var rotator = new fadeRotator('#paneBox', {outControls: true, outControlsBox: '#controls-wrap'});


    // =====================================


    var TabRotatorPrev = function(tabItems, targetBlock, options) {
        
        var $tabItems = $(tabItems),
            countItems = options.countItems || $tabItems.length,
            intervalID,
            currentIndex = 0,
            prevIndex = 0,
            alink, 
            li, 
            targetItem, 
            $targetBlock = $(targetBlock + ' > .pane-item'),
            defaults = {
                timeOut: 5000,
                delayAfterClick: 24000,
            },
            options = $.extend(defaults, options);

        $($tabItems).on('click', function(event) {
            event.preventDefault();
            currentIndex = $(this).closest('li').index();
           
            activate(currentIndex);
            clearInterval(intervalID);
            setTimeout(function() {
                    startRotator();
                }, options.delayAfterClick);
        });
           
        var activate = function(index) {
            alink = $tabItems.eq(index);
            li = alink.parent('li');
            targetItem = $(alink.attr('href'));

            li.siblings().removeClass('active');
            li.addClass('active');

            $targetBlock.animate({opacity: 0}, 300);
            setTimeout(function() {
                $targetBlock.hide();
                targetItem.show().animate({opacity: 1}, 600);
            }, 300);
        }

        var startRotator = function(delay) {
            clearInterval(intervalID);
            intervalID = setInterval(function() {
                currentIndex += 1;
                currentIndex = (currentIndex < countItems) ? currentIndex : 0;
                activate(currentIndex);
            }, options.timeOut);
        }
        startRotator();
    }
    
    // var player = new TabRotator('.panenable li a', '#paneBox', {timeOut: 5000});
    
    // var player2 = new TabRotator('.panenable2 li a', '#paneBlockquote', {timeOut: 1000, countItems: 2});
    

    // ......................

    $('.stylerize').styler();

    $("#select-cascade-brand").change(function(e) {
        $.get('/brand/modellist', {'id': this.value }, 
            function(data) {
                var sel = $('#select-cascade-model');    
                sel[0].options.length = 0;

                if(data.length > 0)  {
                    sel.append($('<option/>').attr('value', '').text('Выберите модель автомобиля'));
                    $.each(data, function(i, val) {
                        sel.append($('<option/>').attr('value', val.id).html(val.name)); 
                    })
                    sel.trigger('refresh'); 
                } 
            }
        ); // end get
    });  

     $( "#input-partnumber" ).autocomplete({
      source: function(request, response){
        $.ajax({
          url: "/search/index",
          data:{
            'brand_id':   $('#select-cascade-brand').val(),
            'model_id':   $('#select-cascade-model').val(),
            'partnumber': $('#input-partnumber').val(),
          },
          success: function(data){
            // приведем полученные данные к необходимому формату 
            response($.map(data, function(item){
              return{
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
        // yaCounter27743625.reachGoal('TARGET_SEARCH');
        window.location = '/goods/' +ui.item.brand_alias +'/' +ui.item.model_alias +'/' +ui.item.partnumber;
      },
      minLength: 3
    });

    function hideTableColumns(target, columns) {
        var toggleWidth = 768;
        for(var i = 0, size = columns.length; i < size; i++) {
            var $items =  $(target + ' td:nth-child(' + columns[i] + '), ' + target + ' th:nth-child(' + columns[i] + ')');
            if($(window).width() < toggleWidth) {
                $items.hide();
            }  else {
               $items.show();
            }
        }
    }

    hideTableColumns('#table-popular', [1, 3, 6]);
    hideTableColumns('#table-products', [2, 5]);

    $(window).resize(function(){
        hideTableColumns('#table-popular', [1, 3, 6]);
        hideTableColumns('#table-products', [2, 5]);
    });


    // columnize
    var countModelList = $('.models-list a').length;
    if(countModelList > 7) {
        $('.columns').columnize({columns: 3});
    } else if(countModelList > 3) {
        $('.columns').columnize({columns: 2});
    }

    // fancybox
    $("a.fancyble").fancybox();
    $('a.zoom').fancybox({ nextEffect:'none', prevEffect:'none', helpers:{ overlay:{ locked:false } } });
    $('.photogallery li a').fancybox({ openEffect:'none', closeEffect:'none', nextEffect:'fade', prevEffect:'fade', helpers:{ overlay:{ locked:false } } });

  
    // // jcarousel
    // $('.jcarousel').jcarousel();

    // // remove 'control-prev', 'control-next', if count of photo less 6
    // $('.jcarousel').each(function (index) {
    //     var $this = $(this),
    //         wrapper = $this.parent(),
    //         itemCount = $this.find('li').size();
    //     if(itemCount < 6) {
    //         wrapper.css('margin-left', 0).children('.jcarousel-control-prev, .jcarousel-control-next').hide();
    //     }
    // });

    // $('.jcarousel-control-prev').on('active.jcarouselcontrol', function () { jQuery( this ).removeClass('inactive'); } ).on( 'inactive.jcarouselcontrol', function(){ jQuery( this ).addClass('inactive' ); } ).jcarouselControl({ target:'-=1' });

    // $('.jcarousel-control-next').on('active.jcarouselcontrol', function () { jQuery( this ).removeClass('inactive'); } ).on( 'inactive.jcarouselcontrol', function(){ jQuery( this ).addClass('inactive' ); } ).jcarouselControl({ target:'+=1' });

    // $('.jcarousel-pagination').on('active.jcarouselpagination', 'a', function () { jQuery( this ).addClass('active'); } ).on( 'inactive.jcarouselpagination', 'a', function(){ jQuery( this ).removeClass('active' ); } ).jcarouselPagination();

  

}); 



