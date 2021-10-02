jQuery(document).ready(function(){

    jQuery('.show_more_text').click(function (e) {
        if(!jQuery('.hide_text').is(":visible"))
        {
            jQuery('.hide_text').show();
            jQuery(this).html("Show less");
        }else{
            jQuery('.hide_text').hide();
            jQuery(this).html("Show more");
        }
    });

})