<?php

namespace CryptoScanner;

use classes\scanners\tronScan;
use eftec\bladeone\BladeOne;

class SCNR
{
    public static BladeOne $blade;

    public function __construct()
    {
        self::$blade = new BladeOne(SCNR_VIEWS_DIR, SCNR_CACHE_DIR, BladeOne::MODE_DEBUG);
        $this->shortCodes();
    }

    public function shortCodes(): void
    {
        add_shortcode('test', [new tronScan(), 'tronsShow']);
    }
}