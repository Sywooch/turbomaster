$(document).ready(function () {

    $(".variants span").on("click", function () {
        
        var $span = $(this), 
            priceId = $span.data('id'),
            price = $span.text(),
            $tdConfirmed = $span.parent('td').next();

        $.ajax({
            url: "/price/confirm",
            type: "post",
            data: { id: priceId,price: price },
            success: function (data) {
                if (data.price) {
                    var price = data.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                    $tdConfirmed.text(price).css({background: '#d5e1e6'});

                }
            }
        });

    });  
    

});  