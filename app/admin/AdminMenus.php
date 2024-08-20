<?php

namespace CryptoScanner\admin;

use CryptoScanner\SCNR;

class AdminMenus
{
    public $files;

    public function run()
    {
        $this->assets();
        $this->getLogsFile();
        $this->show_logs();
//        $yourArray = file(SCNR_LOG_DIR.'logs', FILE_IGNORE_NEW_LINES);
//        echo SCNR::$blade->run('admin.show_logs');
    }

    public function show_logs(): void
    {
        echo SCNR::$blade->run('admin.show_logs', ['files' => $this->files]);
    }

    public function getLogsFile(): void
    {
        $this->files = scandir(SCNR_LOG_DIR);
        unset($this->files[0], $this->files[1]);
    }

    public function assets(): void
    {
        wp_enqueue_script('scnr_admin_panel',SCNR_RESOURCES_URL.'/assets/admin/scnr_admin_panel.js',[], SCNR_VERSION);
        wp_localize_script( 'scnr_admin_panel', 'scnr_admin_panel_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

        wp_enqueue_style('scnr_admin_panel',SCNR_RESOURCES_URL.'/assets/admin/scnr_admin_panel.css',[], SCNR_VERSION);
    }
}