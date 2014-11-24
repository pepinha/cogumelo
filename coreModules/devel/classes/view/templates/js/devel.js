
$(document).ready(function(){
  $( "#logs_tabs" ).tabs(); 
  readLogs();
  autoLoadDebugger();
  
  botonBinds();
});


function readLogs(){
  setInterval(function(){
    $.ajax({
      type: "GET",
      url: "/devel/read_logs",
      data : "",
      dataType: "json"
      
    }).done(function(e){

      $.each(e, function(index, val) {
        $("#"+val.log_name).prepend('<div class="cll_container">'+val.data_log+'</div>');
        $("#"+val.log_name).find("div.cll_container").animate({ color : 'green'}, 15000).removeClass('cll_container');        
      });
    }).fail(function(e){
      console.log("Ajax no finish data load");
    });
  },5000);
    
}


function autoLoadDebugger(){
  setInterval(function(){
    loadDebugger();
  }, 10000);
}

function loadDebugger(){
  $.ajax({
    type: "POST",
    url: "/devel/get_debugger",
    dataType: "json",
    cache: false      
  }).done(function(e){
    $.each( e , function( key, val ) {
      $('.debugItemsContainer').append('<div class="headerDebugItem"><h3>'+val.comment+'</h3><span>'+val.date+'</span></div><div class="debugItemContainer">'+val.debuging+'</div>');   
    });      
  }).fail(function(e){
    console.log("fallo ou baleiro");
  });
}


function botonBinds(){
  $('.refreshDebugger').on('click', function(){
    loadDebugger();
  });
  $('.clearDebugger').on('click', function(){
    $('.debugItemsContainer').html('');
  });
}