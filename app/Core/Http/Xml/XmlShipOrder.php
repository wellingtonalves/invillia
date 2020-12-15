<?php


namespace App\Core\Http\Xml;


use App\Core\Contracts\Xml\XmlContract;
use App\Core\Traits\XmlLogger;
use App\Models\ShipOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class XmlShipOrder implements XmlContract
{
    use XmlLogger;

    private $log = [];

    /**
     * @param $xml
     * @return mixed|void
     */
    public function handle($xml)
    {
        if (!isset($xml->shiporder)) {
            return new static;
        }

        try {
            DB::beginTransaction();
            foreach ($xml->shiporder as $order) {
                if (!ShipOrder::find($order->orderid)) {
                    array_push($this->log, $order);
                    ShipOrder::create([
                        'id' => $order->orderid,
                        'person_id' => $order->orderperson,
                        'ship_to' => json_encode($order->shipto),
                        'items' => json_encode($order->items),
                    ]);
                }
            }
            $this->log('success', $this->log);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error on XmlShipOrder:', [$exception->getMessage()]);
            $this->log('error', 'Error on upload');
            return $exception->getMessage();
        }
    }
}
