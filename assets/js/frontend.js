/*------------------------ 
Backend related javascript
------------------------*/

jQuery( ".dldc-btn" ).click(function(e) {
    e.preventDefault();
    
    var change = jQuery(this).attr('data-type') == 'like' ? 1 : -1;
    alert( dldc.endpoint );
    jQuery.ajax({
        url: dldc.endpoint,
        type: 'POST',
        data: {
            'nonce' : dldc.nonce,
            'id'    : jQuery(this).attr('data-comment-id') ,
            'change': change
        },
        success: function( response ) {

            if( response.hasOwnProperty('error') ){
                alert( response.msg );
            }

            jQuery('#likes-counter-'.response.data,id).text( response.data.counter );


        },
    });

});