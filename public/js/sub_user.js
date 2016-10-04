
    var socket = io(window.location.origin + ':6001');

    socket.on("user_"+ userid + ":Sp\\Events\\Article\\ArticleWasApproved", function(message){

        // console.log(message.article);

        notifyUserArticleWasPublished(message.article)

     });

    socket.on("user_"+ userid + ":Sp\\Events\\Messages\\MessageWasReceived", function(message){
        console.log(message);
     });

    socket.on("user_"+ userid + ":Sp\\Events\\Users\\UserFollowedYou", function(message){
        console.log(message);
     });

    socket.on("user_:Sp\\Events\\Users\\NewUserCommunication", function(message){
        console.log(message);
     });

    socket.on("ping", function(message){
         console.log(message.payload);
     });


    // NOTIFIERS
    // 
    
    function notifyUserArticleWasPublished(article)
    {
        var container = $('#notify-dropdown');

        var markup = '<li><a href="' + window.location.origin + '/' + article.slug + '">Il tuo articolo "' + article.title +'" è stato approvato</a></li>'

        console.log(markup);

        container.prepend( $(markup) );

        incrementCounter();

    }

    function incrementCounter()
    {
        var counter = parseInt($('#notification-count').text());
        
        if(isNaN(counter))
        {

            $('#notification-count').html(1);
        
        }else{

            $('#notification-count').html(counter+1);
            
        }


    }




