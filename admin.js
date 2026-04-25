jQuery(document).ready(function($) {
    $('#generate').click(function() {
        let prompt = $('#prompt').val();

        $.post(ai_ajax.ajax_url, {
            action: 'generate_ai_content',
            prompt: prompt
        }, function(response) {
            $('#result').html(response);
        });
    });
});