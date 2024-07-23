<?php

/*
 * Plugin Name: Crypto Scanner
 * Plugin URI: https://t.me/mind_coder
 * description: a plugin that shows crypto txs info
 * Version: 1.0
 * Author: Mostafa Hoseiny
 * Author URI: https://t.me/mind_coder
 * License: GPL2
*/

use CryptoScanner\SCNR;

//use CryptoScanner\ActiveDeactivate;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

define('SCNR_ROOT_DIR', plugin_dir_path(__FILE__));
define('SCNR_ROOT_URL', plugin_dir_url(__FILE__));

const SCNR_RESOURCES_DIR = SCNR_ROOT_DIR.'resources';
const SCNR_RESOURCES_URL = SCNR_ROOT_URL.'resources';
const SCNR_VIEWS_DIR = SCNR_RESOURCES_DIR.'/views';
const SCNR_STORAGE_DIR = SCNR_ROOT_DIR.'storage';
const SCNR_CACHE_DIR = SCNR_STORAGE_DIR.'/cache';
const SCNR_VERSION = 0.1;

require_once __DIR__.'/vendor/autoload.php';

new SCNR();