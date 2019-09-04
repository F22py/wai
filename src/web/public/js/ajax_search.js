$(function(){
    $('.live_search').bind("change keyup input click", function() {
        $.ajax({
            type: 'post',
            url: "gallery/search/live",
            data: {'referal':this.value},
            response: 'text',
            success: function(data){
                $(".search_result").html(data).fadeIn(); //output
            }
        })
    })

    $(".search_result").hover(function(){
        $(".live_search").blur();
    })


})
