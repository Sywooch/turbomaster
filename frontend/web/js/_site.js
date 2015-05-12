$(document).ready(function() {


    $('#paneBox').unoslider( {outControls: true, outControlsBox: '#controls-wrap', pause: 10000});
    $('.blockquote-rotator').unoslider( {pause: 12000});
    $('#photo-rotator').unoslider( {mode: 'shift', createNavigation: true});

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
                    });
                    sel.trigger('refresh'); 
                } 
            }
        ); // end get
    });  

    $( "#input-partnumber" ).autocomplete({


        source: function (request, response) {
            var name,
                url,
                categories = [1, 2, 3, 5, 6];
   
            $.ajax({
                url: "/search/index",
                data: {
                    brand_id:   $('#select-cascade-brand').val(),
                    model_id:   $('#select-cascade-model').val(),
                    partnumber: $('#input-partnumber').val(),
                },
            success: function (data) {
                // приведем полученные данные к необходимому формату 
                response($.map(data, function (item) {
                    
                    name = item.name;
                    if(item.partnumber) {
                        name += ", " + item.partnumber;
                    }   
                    return {
                        label:        name,
                        product_id:   item.id,
                        category_id:  item.category_id,
                        brand_alias:  item.brand_alias,
                        model_alias:  item.model_alias,
                        partnumber:   item.partnumber
                    };
                }));
              }
            });
        },
        select: function(event, ui) {
            yaCounter27743625.reachGoal('TARGET_SEARCH');

            switch(ui.item.category_id) {
            case '4':
                url = '/tuning/' + ui.item.product_id;
                break;
            case '5':
                url = '/sparepart/' + ui.item.product_id;
                break;
            case '6':
                url = '/sparepart/' + ui.item.product_id;
                break;
            default:
                url = '/goods/' + ui.item.brand_alias + '/' + ui.item.model_alias + '/' + ui.item.partnumber;
            } 
            window.location = url;
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
    $("a.fancyble, a.zoom, .gallery-items a").fancybox({ openEffect:'none', closeEffect:'none', nextEffect:'fade', prevEffect:'fade', helpers:{ overlay:{ locked:false } } });
   
    // inputMask
    $("#question-phone-mask, #order-phone-mask").mask("+7(999) 999-99-99");
   
    var  openPopup = function(id) {
        var el = $(id);
        el.appendTo('body').show().center();
        createBlackScreen();
    };


    $('input,textarea').focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'));
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
            if($(this).val() === 0) {
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
                        $('#question-popup-wrap ul.phones').hide();
                        $h3.text('Вопрос отправлен');
                        $('<h4/>').css('marginn', '0').text('В ближайшее время оператор  магазина ответит на ваш вопрос.').insertAfter($h3);

                        // var yaCounter = new Ya.Metrika({id: 27743625});
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
                if($('.cart-list-table tbody tr').length === 0) {
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
                    var $tbody = $('#cart-list tbody'), 
                        $tr, 
                        $td, 
                        $input, 
                        $div,
                        name,
                        price;
                        
                    $tbody.children('tr').remove();

                    $.each(response.lines, function(i, val) {
                        price = (val.price > 0) ? moneyFormat(val.price) : 'цена по запросу';
                        name = val.name;
                        if(val.partnumber) {
                            name += "\n" + val.partnumber;
                        }

                        $tr = $('<tr/>').attr({'data-line-id': val.line_id});
                        $('<td/>').text(name).appendTo($tr);

                        $td = $('<td/>');
                            $input = $('<input/>').attr({'type': 'text', 'readonly': 'readonly', 'id': 'input-quantity-' +val.line_id}).val(val.quantity).addClass('quantity_value').appendTo($td);
                            $div = $('<div/>').addClass('quantity_block');
                                $('<a/>').addClass('increase').text('+').appendTo($div); 
                                $('<a/>').addClass('decrease').text('-').appendTo($div); 
                            $div.appendTo($td);
                        $td.appendTo($tr);

                        $('<td/>').text(price).addClass('center').appendTo($tr);
                        $('<td/>').addClass('center').append($('<a href="#" class="cart-remove-line"><i class="fa fa-times"></i></a>')).appendTo($tr);

                        $tr.appendTo($tbody);
                    });
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
                if($(this).val() === 0) {
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


    $("#opinion-submit").on("click", function (event) {
        event.preventDefault();
        
        var hasErrors = false,
            $btn = $(this),
            $form = $btn.parents('form'),
            $popup = $('#opinion-popup-wrap .popup-inner'),
            $h3 = $popup.children('h3');

        $form.find('input[type=text]:not("#input-company"), textarea').each(function(){
            if($(this).val().length === 0) {
                hasErrors = true;
            }
        });    
        if(hasErrors) {
             $h3.text('Заполните все поля');
        }  else {
            $btn.prop('disabled', true);
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
    
    function moneyFormat(val) {
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }

    function createBlackScreen() {   
        $('<div id="blackScreenOverlay"></div>')
        .addClass('blackscreen')
        .prependTo('html');
    }
   

    jQuery.fn.center = function () {
        this.css("position","absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 4) + $(window).scrollTop()) + "px");

        var width = $(window).width();
         if(width < 768) {
             this.width(width - 30);
         }

        var left = width > 768 ? (width - $(this).outerWidth()) / 2 + $(window).scrollLeft() - 70 : 10;
        this.css("left", left + "px");
        return this;
    };
  

}); 


