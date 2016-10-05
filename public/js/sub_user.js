
    var socket = io(window.location.origin + ':6001');

    socket.on("user_"+ userid + ":Sp\\Events\\Article\\ArticleWasApproved", function(message){

        // console.log(message.article);

        notifyUserArticleWasPublished(message.article, message.data)

     });

    socket.on("user_"+ userid + ":Sp\\Events\\Messages\\MessageWasReceived", function(message){
        console.log(message);
     });

    socket.on("user_"+ userid + ":Sp\\Events\\Users\\UserFollowedYou", function(message){
        console.log(message);
     });

    socket.on("user_"+ userid + ":Sp\\Events\\Article\\NewArticleFromFollowedUser", function(message){
        notifyUserArticleByFollowedUserWasPublished(message.article, message.data)

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
    
    function notifyUserArticleWasPublished(article, data)
    {
        var container = $('#notify-dropdown');

        var markup = '<li data-id="' + data.notification_id + '" class="' + data.type + '"><a href="' + window.location.origin + data.url + '" class="notification-link">Il tuo articolo "' + article.title +'" è stato approvato</a></li>'

        container.prepend( $(markup) );

        incrementCounter();

    }

    function notifyUserArticleByFollowedUserWasPublished(article, data)
    {
        var container = $('#notify-dropdown');

        var markup = '<li data-id="' + data.notification_id + '" class="' + data.type + '"><a href="' + window.location.origin + data.url + '" class="notification-link">' + data.user_name +' ha pubblicato un nuovo articolo.</a></li>'

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




