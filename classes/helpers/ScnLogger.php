<?php

namespace classes\ScnLogger;

use DateTime;
use DateTimeZone;
use Monolog\Formatter\JsonFormatter;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class ScnLogger
{
    public static function saveLog($message, $type = 'error')
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Tehran'));
        $now->format("Y-m-d");

        $log = new logger('SCN');
        $stream = new StreamHandler(SCNR_LOG_DIR . $now->format("Y-m-d") . '.log', Level::Debug);
//        $formatter = new LineFormatter("{'%datetime%', '%level_name%', %message%\n", "Y-m-d H:i:s");
//        $formatter = new LineFormatter("%datetime% > %level_name% > %message%\n", "Y-m-d H:i:s");
//        $formatter = new LineFormatter("%datetime% > %level_name% > %message%\n", "Y-m-d H:i:s");
        $stream->setFormatter((new JsonFormatter())->addJsonEncodeOption(FILE_IGNORE_NEW_LINES));
        $log->pushHandler($stream);
        $log->setTimezone(new DateTimeZone('Asia/Tehran'));

        switch ($type) {
            case 'error':
                $log->error($message);
                break;
            case 'warning':
                $log->warning($message);
                break;
            case 'notice':
                $log->notice($message);
                break;
            default:
                $log->info($message);
        }
        $log->close();
    }
}