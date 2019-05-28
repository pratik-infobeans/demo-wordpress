jQuery(document).ready(function($){
    $(document).on('change','.simple-alert-checkboxes', function(){
        var post_type = $(this).attr('data-post-type');
        if($(this).prop("checked") == true){
            $('#panel-'+post_type).show();
        }
        else if($(this).prop("checked") == false){
            $('#panel-'+post_type).hide();
            $.each($("#panel-"+post_type+" select option:selected"), function() { 
                $(this).prop('selected', false);
            });
        }
    })
})
