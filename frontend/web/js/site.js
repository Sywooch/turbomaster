$(document).ready(function() {

    // $('.stylerize').styler();
    
    var hideTableColumns = function(target, columns, toggleWidth = 768) {
        
        alert('hello')

       $.each(columns, function(i, column) {

            var els =  $(target +  ' td:nth-child(' + column + '), ' + target + ' th:nth-child(' + column + ')');
            if($('html').width() < toggleWidth) {
                els.hide();
            }  else {
                els.show();
            }
        });
    }
    
    hideTableColumns('#table-popular', [1, 3, 6]);
    // $('window').resize(function(){
    //      hideTableColumns('#table-popular', [1, 3, 6]);
    // });


    // $('nav li.col').hover(
    //     function(){
    //         $(this).children('a').addClass('active');
    //         $(this).find('ul').slideDown('fast'); 
    //     },
    //     function(){
    //         $(this).children('a').removeClass('active');
    //         $(this).find('ul').slideUp('fast'); 
    //     }
    // ); 


    // $("#inputPartnumber").css('visibility', 'visible');

    $("#dropDownBrands").change(function(e) {
    var s = this.value;
    var params = {
        action:       '/brand/modellist',
        targetId:     'dropDownModels',
        prompt:       'Выберите модель автомобиля',
        warpTargetId: 'warpDropDownModels',
      };

    $.get(params.action, {'id': s}, 
      
      function(data){    
        var $targetId     = $('#' +params.targetId);
        var $warpTargetId = $('#' +params.warpTargetId);

        $targetId[0].options.length = 0;     
        $('#' +params.warpTargetId +' .selectbox').remove();

        if(data.length > 0)  {
          $targetId.append($('<option/>').attr('value', '').text(params.prompt));
          $.each(data, function(i, val) {
            $targetId.append($('<option/>').attr('value', val.id).html(val.name)); 
          })
          
          $targetId.styler(); 
        } 

      }); // end get
    });  
    

    $("#question-phone-mask, #order-phone-mask").mask("+7(999) 999-99-99");

    // $('.banners-rotator .bxslider').bxSlider({
    //     slideWidth: 335,
    //     maxSlides: 2,
    //     moveSlides: 1,
    //     slideMargin: 10,

    //     auto: true,
    //     controls: false,
    //     pager: false,
    //     captions: false,

    //     speed: 800,
    //     pause: 6000,
    //   });


    // $('.gallery-rotator .bxslider').bxSlider({
    //     slideWidth: 330,
    //     maxSlides: 2,
    //     moveSlides: 1,
    //     slideMargin: 2,

    //     auto: true,
    //     controls: false,
    //     pager: false,
    //     captions: true,

    //     speed: 800,
    //     pause: 4000,
    //   });


    var  openPopup = function(id) {
        createBlackScreen();
        $(id).appendTo('body').show().center();
    }


    $('input,textarea').focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'))
        $(this).attr('placeholder','');
    });
    $('input,textarea').blur(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });


    $("#search-form-submit").on("click", function (event) {
        yaCounter27743625.reachGoal('TARGET_SEARCH');
        $("#search-form").submit();
    });   

    $(document).on('click', '.onicon_chat-s3-btn', function () {
        yaCounter27743625.reachGoal('TARGET_CHAT');
    });


    $("#question_submit").on("click", function (event) {
        event.preventDefault();
        
        var hasErrors = false;
        var $btn = $(this);
        var $form = $btn.parents('form');

        $form.find('input:not([type=submit]),textarea').each(function () {
            if($(this).val() == 0) {
                hasErrors = true;
            }
        });    
        if(hasErrors) {
            alert('Заполните все поля');
        }  else {
        
            $btn.prop('disabled', true);
            // $form.submit();

            var $popup = $('#question-popup-wrap .popup-inner');
            var $h3    = $popup.children('h3');

            $.ajax({
                url: "/question/create",
                type: "post",
                data: $form.serialize(),
                success: function (response) {
                    if(response.state == 'success') {
                        $form.css('visibility', 'hidden');
                        $h3.text('Вопрос отправлен');
                        $('<p/>').css('margin', '80px 0 -80px 0').text('В ближайшее время оператор  магазина ответит на ваш вопрос.').insertAfter($h3);

                        var yaCounter = new Ya.Metrika({id: 27743625});
                        yaCounter27743625.reachGoal('TARGET_QUESTION');
                    }
                }
            });
        }    
    });


    // order_form block .....................................

    $("table").on("click", ".quantity_block a", function (event) {
        event.preventDefault();
        var lineId  = $(this).parents('tr').data('lineId');
        var sign    = ($(this).attr('class') == 'increase') ? 'plus' : 'minus';
        var input   = $('#input-quantity-' +lineId);
        var inputValue = parseInt(input.val());

        if(sign == 'minus' && inputValue == 1) {
            return;
        }
        $.ajax({
            url: '/cart/quantity',
            type: 'post',
            data: { 
                'line_id': lineId,
                'sign': sign 
            },
            success: function (response) { 
                input.val(response.quantity);
                $('#cart-total-price').text(moneyFormat(response.totalPrice) + ' руб.');
           }     
        });
    }); 

    $("body").on( "click", "a.cart-remove-line", function (event) {
        event.preventDefault();
        var parentTr    = $(this).parents('tr');
        var lineId      = parentTr.data('lineId');
        var countRows   = $('.cart-list-table tbody tr').length;

        $.ajax({
            url: '/cart/delete_row',
            type: 'post',
            data: { 'line_id': lineId },
            success: function(response) { 
                $('#cart-total-price').text(moneyFormat(response.totalPrice) + ' руб.');
                parentTr.remove();
                if($('.cart-list-table tbody tr').length == 0) {
                    $('#order-popup-wrap').fadeOut();
                    $('#blackScreenOverlay').remove(); 
                }
           }     
        });
    }); 


    $("a.cart-add-product-link, #order.a").click(function (event) {
        event.preventDefault();
        var productId =  $(this).data('productId');
        $.ajax({
            url: '/cart/create',
            type: 'post',
            data: { 
                'product_id': productId,
                'X-CSRF-Token': $('meta[name=csrf-token]').prop('content') 
            },
            success: function (response) {                                       
                if(response.lines.length > 0)  {
                    var $tbody = $('#cart-list tbody'), $tr, $td, $input, $div, price;
                    $tbody.children('tr').remove();

                    $.each(response.lines, function(i, val) {
                        price = (val.price > 0) ? moneyFormat(val.price) : 'цена по запросу';

                        $tr = $('<tr/>').attr({'data-line-id': val.line_id});
                        $('<td/>').text(val.name + "\n" + val.partnumber).appendTo($tr);

                        $td = $('<td/>');
                            $input = $('<input/>').attr({'type': 'text', 'readonly': 'readonly', 'id': 'input-quantity-' +val.line_id}).val(val.quantity).addClass('quantity_value').appendTo($td);
                            $div = $('<div/>').addClass('quantity_block');
                                $('<a/>').addClass('increase').text('+').appendTo($div); 
                                $('<a/>').addClass('decrease').text('-').appendTo($div); 
                            $div.appendTo($td);
                        $td.appendTo($tr);

                        $('<td/>').text(price).addClass('center').appendTo($tr);
                        $('<td/>').addClass('center').append($('<a/>').addClass('cart-remove-line')).appendTo($tr);

                        $tr.appendTo($tbody);
                    })
                    $('#cart-total-price').text(moneyFormat(response.totalPrice) + ' руб.');
                    openPopup('#order-popup-wrap');
                } 
            }
       });                              
       return false;
    });

    
    $('#form-order-submit').click(function (event) {
        event.preventDefault();
        var hasErrors = false;
        var $btn = $(this);
        var $form = $btn.parents('form');

        $form.find('input:not([type=submit]),textarea').each(function(){
                if($(this).val() == 0) {
                    hasErrors = true;
                }
        });    
        if(!hasErrors) {
            yaCounter27743625.reachGoal('TARGET_ORDER');
            $btn.prop('disabled', true);
            $form.submit();
        }  
        else {
            alert('Заполните все поля');
        }
    });


    $("a.question-add-link").click(function (event) {
        event.preventDefault();
        
        var type = $(this).data('questionType');
        var h3 = $('#question-popup-wrap h3');
        var inputType = $('#question-form-type');
        var inputProductId = $('#question-form-product_id');
        
        inputProductId.val($(this).data('productId'));

        if(type == 'common_question') {
            h3.text('Задать вопрос о товаре');
            inputType.val(1);
        } else if(type == 'price_request') {
            h3.text('Запросить цену');
            inputType.val(2);
        }

        openPopup('#question-popup-wrap'); 
    });
    
    $("a#popup-diagn").click(function (event) {
        event.preventDefault();
        openPopup($('#diagnostics_table'));
     }); 

    $('.popup-close').click(function () {
        $(this).parents('div.popup-wrap').hide();
        $('#blackScreenOverlay').remove(); 
    });


    //opinion form
    $('#show-opinion-form').click(function (event) {
        
        event.preventDefault();
        $('#opinion-popup-wrap').show();
        openPopup('#opinion-popup-wrap');
    });


    $("#opinion_submit").on("click", function (event) {
        event.preventDefault();
        var hasErrors = false;
        var $btn = $(this);
        var $form = $btn.parents('form');

        $form.find('input[type=text]:not("#input-company"), textarea').each(function(){
            if($(this).val() == 0) {
                hasErrors = true;
            }
        });    
        if(hasErrors) {
            alert('Заполните все поля');
        }  else {
        
            $btn.prop('disabled', true);
            // $form.submit();
            var $popup = $('#opinion-popup-wrap .popup-inner');
            var $h3    = $popup.children('h3');

            $.ajax({
                url: "/opinion/create",
                type: "post",
                data: $form.serialize(),
                success: function(response) {
                    if(response.state == 'success') {
                        $form.css('visibility', 'hidden');
                        $h3.text('Спасибо за отзыв!');
                        $('<p/>').css('margin', '80px 0 -80px 0').text('Сразу после модерации ваш отзыв будет опубликован на этой странице.').insertAfter($h3);
                    }
                }
            });
        }    
    });
    //............................

        
    function moneyFormat(val) {
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }

    function createBlackScreen() {   
      $('<div id="blackScreenOverlay"></div>')
       .addClass('blackScreen')
       .prependTo('html');
    }
   

    jQuery.fn.center = function () {
        this.css("position","absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 3) + $(window).scrollTop()) + "px");
        // this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 40) + $(window).scrollTop()) + "px");
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) - 70 + "px");
        // this.css("left", "20px");
        return this;
    }


    // // mSlidebox
    // $('.slidebox').mSlidebox({
    //     autoPlayTime:7000,
    //     animSpeed:500,
    //     easeType:'easeInOutQuint',
    //     controlsPosition:{
    //         buttonsPosition:'inside',
    //         thumbsPosition:'inside'
    //     },
    //     pauseOnHover:true,
    //     numberedThumbnails:false
    // });

    // fancybox
    // $("a.fancyble").fancybox();
    // $('a.zoom').fancybox({ nextEffect:'none', prevEffect:'none', helpers:{ overlay:{ locked:false } } });
    // $('.photogallery li a').fancybox({ openEffect:'none', closeEffect:'none', nextEffect:'fade', prevEffect:'fade', helpers:{ overlay:{ locked:false } } });

  
    // jcarousel
    // $('.jcarousel').jcarousel();

    // remove 'control-prev', 'control-next', if count of photo less 6
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

    // columnize
    // $('.columns').columnize({columns:3});
    
}); 



