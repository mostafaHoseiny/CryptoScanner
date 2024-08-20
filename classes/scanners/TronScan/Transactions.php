<?php

namespace classes\scanners\TronScan;

use classes\ScnLogger\ScnLogger;
use CryptoScanner\SCNR;

class Transactions extends tronScan
{
    public function showTxInfo($hash): string
    {
        $tx_info = $this->getTxInfo($hash);
        return SCNR::$blade->run('tronScan.show_tx_info', ['tx_info' => $tx_info]);
    }

    public function getTxInfo($hash)
    {
        $url = $this->baseUrl . '/transaction-info?hash=' . $hash;
        $res = wp_remote_get($url);
        wp_remote_retrieve_body($res);

        $request = wp_remote_get($url);
        if (is_wp_error($request) || wp_remote_retrieve_response_code($request) !== 200) {
            ScnLogger::saveLog(__CLASS__ . ' => ' . __FUNCTION__ . '  ' . 'cannot get data with api: ' . $url . ' ' . $request->get_error_code());
        } else {
            $body = wp_remote_retrieve_body($request);

            if (!empty($body)) {
                $res = [
                    'error' => false,
                    'data' => json_decode($body, 1)
                ];
            } else {
                ScnLogger::saveLog(__CLASS__ . '_' . __FUNCTION__, 'cannot decode this data: ' . $body);
                $res = [
                    'error' => true,
                    'message' => 'Transaction data is unavailable!'
                ];
            }
        }

        return json_decode(json_encode($res));
    }

    public function showError()
    {
        return SCNR::$blade->run('tronScan.show_error', ['error' => 'آدرس تراکنش (هش) را ارسال نکرده اید!']);
    }
}