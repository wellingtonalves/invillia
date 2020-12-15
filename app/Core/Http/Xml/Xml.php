<?php

namespace App\Core\Http\Xml;


use App\Core\Contracts\Xml\XmlContract;

class Xml
{

    private $file;
    private $xml;
    private static $instance;

    /**
     * Xml constructor.
     * @param $xml
     */
    public function __construct($xml)
    {
        $this->file = $xml;
    }

    /**
     * @param $file
     * @return mixed|void
     */
    public static function load($file)
    {
        if (!isset(self::$instance)) {
            self::$instance = new Xml($file);
        }
        return self::$instance;
    }

    /**
     * @param XmlContract $xmlContract
     */
    public function next(XmlContract  $xmlContract)
    {
        $xmlContract->handle($this->file);

        return $this;
    }
}
