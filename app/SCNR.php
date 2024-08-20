<?php

namespace CryptoScanner;

use classes\Shortcodes;
use CryptoScanner\admin\AdminActions;
use CryptoScanner\admin\AdminMenus;
use eftec\bladeone\BladeOne;

class SCNR
{
    public static BladeOne $blade;

    public function __construct()
    {
        self::$blade = new BladeOne(SCNR_VIEWS_DIR, SCNR_CACHE_DIR, BladeOne::MODE_DEBUG);
        $this->shortCodes();

        add_action('admin_menu', [$this,'adminMenus']);
        $this->adminActions();
    }

    public function shortCodes(): void
    {
        Shortcodes::addShortcodes();
    }

    public function adminMenus(): void
    {
         add_menu_page(
             'افزونه اسکنر', 'کریپتو اسکنر',
             'manage_options', 'crypto_scanner',
             [new AdminMenus(), 'run']
         );
//         add_submenu_page(
//             'efc_manage_exchange', 'تنظیمات',
//             'تنظیمات', 'manage_options',
//             'efc_manage_exchange', [],
//         );
    }

    public function adminActions(): void
    {
        new AdminActions();
    }
}