$(document).ready(function() {

  $("select").styler();
  $('#btn-close-panel').hide();

  var k;
  if($.cookie('show_search_panel')=='1') { 
    $('#search_panel').show(); 
    k = 2;
  } else { k = 1; }
  activateTab(k);

  $('.secondary-navigation ul li a.clckable').click(function(event){
      event.preventDefault();

      if($(this).attr('id') == 'toggle_search_panel') { 
        k = 2; 
        $('#search_panel').show();
        $.cookie("show_search_panel", '1', { path: '/'});
      } else {
        k = 1;
        $('#search_panel').hide(); 
        $.cookie("show_search_panel", '0', { path: '/'});
      }
      activateTab(k);
  });


  function activateTab(k) {
    $('.secondary-navigation ul li').removeClass('active');
    $('.secondary-navigation ul li').eq(k).addClass('active')
  }


  $(".place-state span, .place-is_yml span").phantomDot();


});
    
