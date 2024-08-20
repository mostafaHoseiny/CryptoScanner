
(function($){
    let log_file_name = '';
    let html = '';

    $('.log-file-name').on('click', (e) => {
        log_file_name = e.currentTarget.innerText;
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: scnr_admin_panel_ajax.ajax_url,
            data: {
                action: "get_log_content",
                log_file: log_file_name
            },
            success: function(data){
                showLogs(data.data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            }
        });
    })

    // function showLogs(logs) {
    //
    //     html += '<table class="table">';
    //     logs.forEach(log => {
    //         log = $.parseJSON(log);
    //         html +=
    //             '<div><tr>'+
    //                 '<td>'+ log.channel +'</td>'+
    //                 '<td>'+ log.datetime +'</td>'+
    //                 '<td>'+ log.level_name +'</td>'+
    //                 '<td>'+ log.message +'</td>'+
    //             '</tr></div>'+
    //         '';
    //     })
    //     html += '</table>';
    //     $('.logs-list').html(html);
    // }

    function showLogs(logs) {

        html += '<ul class="table">';
        logs.forEach(log => {
            log = $.parseJSON(log);
            html +=
                '<li>'+
                    '<span>'+ log.channel +'</span>'+
                    '<span>'+ log.datetime +'</span>'+
                    '<span>'+ log.level_name +'</span>'+
                    '<span>'+ log.message +'</span>'+
                '</li>'+
            '';
        })
        html += '</ul>';
        $('.logs-info').html(html);
    }
})(jQuery);


