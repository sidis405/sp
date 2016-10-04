    var socket = io(window.location.origin + ':6001');
    socket.on("admin_:App\\Events\\Articles\\ArticleWasSubmitted", function(message){
         

        console.log(message);

         // if(message.data.command == 'reload')
         // {
         //    $('#page-processing').hide();
         //    $('#page-refresher').show();
         // }
         
     });


    socket.on("ping", function(message){
         console.log(message.payload);
     });
