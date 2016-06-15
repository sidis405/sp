$(document).ready(function(){
    $('.post-img').find('img').hover(function() {
        $(this).addClass('transition');
    
    }, function() {
        $(this).removeClass('transition');
    });
});

$(document).on("change", "#dashboard-category-filter", function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $("#dashboard-category-filter option:selected" ).val(), count = 0;

        // console.log(filter);
 
        // Loop through the comment list
        $('.article-list-table').find('tr.article-list-row').each(function(){

            if(filter !== 'all')
            {
                // If the list item does not contain the text phrase fade it out
                if ($(this).find('.article-list-category').text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide();
     
                // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show();
                    count++;
                }
            }else{
                $(this).show();
                count++;
            }

        });
 
    });

$(document).on("change", "#dashboard-state-filter", function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $("#dashboard-state-filter option:selected" ).val(), count = 0;

        // console.log(filter);
 
        // Loop through the comment list
        $('.article-list-table').find('tr.article-list-row').each(function(){

            // if($(this).css('display') !== 'none'){
                
                if(filter !== 'all')
                {
                    // console.log('s');
                    // If the list item does not contain the text phrase fade it out
                    if ($(this).find('.article-list-state').text().search(new RegExp(filter, "i")) < 0) {
                        $(this).hide();
                
                    // Show the list item if the phrase matches and increase the count by 1
                    } else {
                        $(this).show();
                        count++;
                    }
                }else{
                    $(this).show();
                    count++;
                }

            // }

        });
 
    });

$(document).on("click", '.article-list-reset-filter', function(event){
    event.preventDefault();
    $('#dashboard-category-filter').prop('selectedIndex',0);
    $('#dashboard-category-filter').trigger('change');
    $('#dashboard-state-filter').prop('selectedIndex',0);
    $('#dashboard-state-filter').trigger('change');
});

$('.cat-select').on('change', function(){

    var target_btn = $(this).parent().find('button').first();

    target_btn.removeAttr('class');
    target_btn.addClass('btn');
    target_btn.addClass('dropdown-toggle');
    target_btn.addClass( $(".cat-select option:selected" ).data("class"));


});


function ajaxCall(payload, route, method,  message, callback) {

    var token = $('meta[name="_token"]').attr('content');

    $.ajax({
        url: '/admin/' + route,
        type: 'POST',
        data: {
            payload: payload,
            _method: method,
            _token: token
        },
        success: function(data) {
            if(callback != false)
            {
                eval(callback);
            }
        },
        error: function(XMLHttpRequest, textstatus, error) {

            return false;

        }
    });

}

function goto(destination){
    window.location.href = destination;
}
