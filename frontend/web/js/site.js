$(document).ready(function() {

    $('.stylerize').styler();

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
    $('.columns').columnize({columns:3});

    // fancybox
    $("a.fancyble").fancybox();
    $('a.zoom').fancybox({ nextEffect:'none', prevEffect:'none', helpers:{ overlay:{ locked:false } } });
    $('.photogallery li a').fancybox({ openEffect:'none', closeEffect:'none', nextEffect:'fade', prevEffect:'fade', helpers:{ overlay:{ locked:false } } });

  
    // jcarousel
    $('.jcarousel').jcarousel();

    // remove 'control-prev', 'control-next', if count of photo less 6
    $('.jcarousel').each(function (index) {
        var $this = $(this),
            wrapper = $this.parent(),
            itemCount = $this.find('li').size();
        if(itemCount < 6) {
            wrapper.css('margin-left', 0).children('.jcarousel-control-prev, .jcarousel-control-next').hide();
        }
    });

    $('.jcarousel-control-prev').on('active.jcarouselcontrol', function () { jQuery( this ).removeClass('inactive'); } ).on( 'inactive.jcarouselcontrol', function(){ jQuery( this ).addClass('inactive' ); } ).jcarouselControl({ target:'-=1' });

    $('.jcarousel-control-next').on('active.jcarouselcontrol', function () { jQuery( this ).removeClass('inactive'); } ).on( 'inactive.jcarouselcontrol', function(){ jQuery( this ).addClass('inactive' ); } ).jcarouselControl({ target:'+=1' });

    $('.jcarousel-pagination').on('active.jcarouselpagination', 'a', function () { jQuery( this ).addClass('active'); } ).on( 'inactive.jcarouselpagination', 'a', function(){ jQuery( this ).removeClass('active' ); } ).jcarouselPagination();



}); 



