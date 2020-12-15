<?php


namespace App\Core\Contracts\Xml;


interface XmlContract
{

    /**
     * Handle
     * @param $xml
     * @return mixed
     */
    public function handle($xml);

    /**
     * Next
     * @param $log
     * @param $status
     * @return mixed
     */
    public function log($log, $status);
}
