<?php

namespace CryptoScanner\admin;

class AdminActions extends AdminMenus
{
    public function __construct()
    {
        add_action( 'wp_ajax_nopriv_get_log_content', [new LogsInfo(), 'get_log_content'] );
        add_action( 'wp_ajax_get_log_content', [new LogsInfo(), 'get_log_content'] );
    }

//    public function get_log_content()
//    {
//
//        wp_send_json_success($this->files);
//    }


}