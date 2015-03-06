(function($) {

$.fn.unirotator = function(options) {

    var defaults = {
            mode: 'fade',               // 'fade', 'shift', default: 'fade'

            outControls: false,         // default: false
            outControlsBox: '',         // eg '#controls-wrap',  
            createNavigation: false,    // default: false

            autoLoop: true,             // default: true
            pause: 5000,
            autoStart: true,            // after click
            delay: 20000,
        },
        options = $.extend(defaults, options);

    return this.each(function () {

        var $this = $(this),
            panes = $this.find('> .pane-item'),
            countItems = panes.length,
            controls = false,
            currentIndex = 0,
            intervalId,
            currentPane;

  
        var init = function() {

            if(options.mode == 'shift') {
                prepareShiftLayout();
            }

            if(options.outControls && options.outControlsBox) {
                controls = $(options.outControlsBox + ' > li');
                clickControlHandler();
            }
            if(options.autoLoop === true) {
                startLoop();
            }
        }

        var next = function() {
            currentIndex += 1;
            currentIndex = (currentIndex < countItems ) ? currentIndex : 0;
            currentPane = panes.eq(currentIndex);

            if(options.outControls === true) {
                changeControlElement(currentIndex);
            }
            
            goToNextPane();
        }

        var goToNextPane = function() {
            if(options.mode == 'fade') {
                fadeTransition();
            }  else if(options.mode == 'shift') {
                shiftTransition();
            }
        }

        var changeControlElement = function(index) {
            if(controls) {
                controls.removeClass('active');
                controls.eq(index).addClass('active');
            }
        }

        var pause = function() {
            clearInterval(intervalId);
            if(options.autoStart) {
                setTimeout(function() {
                    startLoop();
                }, options.delay);
            }
        }

        var clickControlHandler = function() {
            controls.find('a').on('click', function(event) {
                event.preventDefault();
                currentIndex = $(this).closest('li').index();
                changeControlElement(currentIndex);
                goToNextPane();
                pause();
            });
        }


        var fadeTransition = function() {
            currentPane = panes.eq(currentIndex);
            panes.animate({opacity: 0}, 300);

            setTimeout(function() {
                panes.hide();
                currentPane.show().animate({opacity: 1}, 600);
            }, 300); 
        }

        var shiftTransition = function() {
            // ..............
        }

        var prepareShiftLayout = function() {
            var paneBox =  $(paneBox),
                pane = panes.first(),
                paneWidth = pane.width(),
                paneHeight = pane.height(),
                divFrame,
                divRibbon;

            // paneBox.css({position: 'relative',
                         // 'z-index': 3});

            // divFrame = $('div').attr('id', 'div-frame').css({
           paneBox.css({
                position: 'relative',
                'z-index': 2,
                width: paneWidth + 'px',
                height: paneHeight + 'px',
                overflow: 'hidden',
            // }).insertTo(paneBox);
            }).addClass('hello');

            // divRibbon = $('div').css({
            //     position: 'absolute',
            //     top: '0px',
            //     left: '0px',
            //     'z-index': 1,
            //     width: paneWidth * countItems + 'px',
            //     height: paneHeight + 'px',
            //     overflow: 'hidden',
            // }).appendTo(divFrame);

            // $.each(panes, function(i, el){
            //     el.css({
            //         display: 'block',
            //         opacity: '1',
            //         float: 'left',
            //     }).insertTo(divRibbon);

            // });

        }


        var startLoop = function() {
            clearInterval(intervalId);
            intervalId = setInterval(function() {
                next();
            }, options.pause);
        }

        init();

    });

  } 
})(jQuery);