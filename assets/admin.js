jQuery(document).ready(function(){

    jQuery('.show_more_text').click(function (e) {
        if(!jQuery(this).parent().children('.show_more_content').is(":visible"))
        {
            jQuery(this).parent().children('.show_more_content').show();
            jQuery(this).html("Show less");
        }else{
            jQuery(this).parent().children('.show_more_content').hide();
            jQuery(this).html("Show more");
        }
    });


})