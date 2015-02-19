$(document).ready(function()    {
  
  $("a[rel='colorBox']").colorbox({width:"80%", height:"80%", maxWidth:"700px" });  
  $('input[type=file]').styler();


  var count = 1;
  
  $('#photoArea span#add_input_file').click(function(e)   
  { 
    if(count<4)
    {  
      $('<input>').attr({'type': 'file', 'name': 'Photo[photo_' +count +']' })
                  .appendTo('#photoArea');             
      $('input[name=count]').val(parseInt($('input[name=count]').val())+1);

      $('input[type=file]').styler();
      e.preventDefault();
    } 
    ++count;
  })

 $('#btn_photo-submit, .btn_photo_arrow').click(function(){
                                        createBlackScreen();
                                        return true; 
                                        });


}); 


