jQuery(function($){
    $( document ).ready(function() {
        $.ajax({
            url: WP.AJAX_URL,
            cache: false,
            type: 'POST',
            data: {
                'action' : 'nd_random_testimonial_ajax' // Used by wp_ajax_nopriv etc
            },
            dataType: 'html'
        })
        .success(function(results) {
            $('.testimonial').html(results);
            //console.log( "success" );
        })
        .fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
    });
});
