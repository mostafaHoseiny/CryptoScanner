<?php

namespace CryptoScanner\admin;

class LogsInfo
{
    public function get_log_content()
    {
        if ($_GET['log_file'] !== ''){
            $file_content = file(SCNR_LOG_DIR.$_GET['log_file'].'.log', FILE_IGNORE_NEW_LINES);
            wp_send_json_success($file_content);
        } else {
            wp_send_json_error('file not found!',404);
        }
    }
}