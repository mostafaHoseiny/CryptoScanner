<?php

namespace classes\scanners\TronScan;

use classes\ScnLogger\ScnLogger;
use CryptoScanner\SCNR;

class Statistics extends TronScan
{
    public function showStatistics(): string
    {
        $statistics = $this->getStatistics();
        return SCNR::$blade->run('tronScan.show_statistics', ['statistics' => $statistics]);
    }

    public function getStatistics()
    {
        $url = $this->baseUrl . '/block/statistic?randomNum=0.8298443045221746';
        $res = wp_remote_get($url);
        wp_remote_retrieve_body($res);

        $request = wp_remote_get($url);
        if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
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
                    'message' => 'Statistics data is unavailable!'
                ];
            }
        }

        return json_decode(json_encode($res));
    }
}