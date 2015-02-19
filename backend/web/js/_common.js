
$(document).ready(function()    {

  
    $('#main-navigation li.root').mouseenter(function(event) {
        event.preventDefault();
        $(this).children('ul').slideDown('fast');
    }) 

    $('#main-navigation li.root').mouseleave( function(event) { 
        // if( !$(event.target).is($(this)) ) {
            $(this).children('ul').slideUp('fast');
        // }
    });

    $(".confirmDeletion").click( function() { 
        if (confirm('Удалить этот элемент?'))   {
            createOverlay();          
            return true;
        } else {  
            return false; 
        }
    });
  

    // toggle header.......................
    if($.cookie('show_header')=='no') { $('#header').hide(); }

        $('#toggle_header').click( function()   { 
        $('#header').toggle();

        if($.cookie('show_header') =='no')  { 
            $.cookie("show_header", 'yes', { path: '/'});
        } else {
            $.cookie("show_header", 'no', { path: '/'});    
        }
    });


    $('.toggle_hidden_form').click( function(event) { 
        event.preventDefault();
        $('.toggle_form').toggle();
        $('.focus_on_me').focus();
    });


    setTimeout( function() { 
        $('#notice').fadeOut('2000')}, 
        '3000' );

  
    $('a.arrows, .create-overlay').click(function(event) {
        $(this).toggleDisabled();  
        createOverlay({color: 'rgba(255,255,255,0.7)', add_icon: true });
    }); 

    $("form").submit(function() {
        $(this).toggleDisabled();  
        createOverlay({color: 'rgba(255,255,255,0.7)', add_icon: true });
    }); 

}); // $.ready



(function($) {
    $.fn.toggleDisabled = function(){
        return this.each(function(){
            this.disabled = !this.disabled;
            // $(this).prop("disabled",!$(this).prop("disabled"));
        });
    };
})(jQuery);



// options = { color: 'rgba(0,0,0,0.5)', add_icon: false }
function createOverlay(options)  {
    var color = (options !== undefined && options.color !== undefined) ? options.color : 'rgba(0,0,0,0.5)';
    
    $('<div />')
    .attr('id', 'overlay')
    .css({
      'position': 'fixed',
      'top': 0,
      'left': 0,
      'width':  '100%',
      'height': '100%',
      'background': color,        
      'z-index': '200',
     })
    .appendTo('body');

    if(options !== undefined && options.add_icon === true) {
        $('<div />')
        .attr('id', 'loading_icon')
        .css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 40) + $(window).scrollTop()) + "px")
        .appendTo('body');
    }
}


function removeOverlay()  {
    $('#overlay, #loading_icon').remove();
}