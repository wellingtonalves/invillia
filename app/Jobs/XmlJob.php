<?php

namespace App\Jobs;

use App\Core\Http\Xml\Xml;
use App\Core\Http\Xml\XmlPerson;
use App\Core\Http\Xml\XmlShipOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class XmlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $xml;

    /**
     * Create a new job instance.
     *
     * @param $xml
     */
    public function __construct($xml)
    {
        $this->xml = $xml;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Xml::load(json_decode($this->xml))
            ->next(app(XmlPerson::class))
            ->next(app(XmlShipOrder::class));
    }
}
