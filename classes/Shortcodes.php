<?php

namespace classes;

use classes\scanners\TronScan\TronScan;

class Shortcodes
{
    public static function addShortcodes(): void
    {
        add_shortcode('tronScan', [new TronScan(), 'init']);
    }
}