  $(document).ready (function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#search_button").bind("click",function(){
      $.ajax({
        url:'/searchroom',
        type: 'POST',
         data: ({_token: CSRF_TOKEN, 'dormitory_for_search': $("#dormitory_for_search").val(),'floor_for_search': $("#floor_for_search").val(),'free_for_search': $("#free_for_search").val()}),
        
        dataType: 'html',
        beforeSend: function(){
          $("#searchroom_result").text("Ожидание данных");
        },
        success: function(data){
            
          $("#searchroom_result").html(data).fadeIn();
          
        }
      });
    });
  });