<?php

namespace classes\scanners;

//use CryptoScanner\SCNR;

use CryptoScanner\SCNR;

class tronScan
{
    public function __construct()
    {

    }

    public function tronsShow(): string
    {
        return SCNR::$blade->run('test', ['']);
    }
}