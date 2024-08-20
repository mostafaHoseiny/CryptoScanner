<?php

namespace classes\scanners\TronScan;

class TronScan
{
    public $baseUrl = 'https://apilist.tronscanapi.com/api';

    public function __construct()
    {}
    public function init($attr): string
    {
        $area = $attr[0];
        $view = '';
        $hash = '';

        switch ($area){
            case 'lastBlocks':
                $view = (new LastBlocks())->showLastBlocks();
                break;
            case 'statistics':
                $statistics = new Statistics();
                $view = $statistics->showStatistics();
                break;
            case 'tx':
                $tx = new Transactions();
                if(isset($_GET['hash']) && $_GET['hash'] !== '') {
                    $hash = $_GET['hash'];
                    $view = $tx->showTxInfo($hash);
                } else {
                    $view = $tx->showError();
                }
                break;
        }
        return $view;
    }
}