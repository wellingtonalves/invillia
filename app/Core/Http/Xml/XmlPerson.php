<?php


namespace App\Core\Http\Xml;


use App\Core\Contracts\Xml\XmlContract;
use App\Core\Traits\XmlLogger;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class XmlPerson implements XmlContract
{
    use XmlLogger;

    private $log = [];

    /**
     * @param $xml
     * @return mixed|void
     */
    public function handle($xml)
    {
        if (!isset($xml->person)) {
            return $this;
        }
        try {
            DB::beginTransaction();
            foreach ($xml->person as $person) {
                if (!Person::find($person->personid)) {
                    array_push($this->log, $person);
                    Person::create([
                        'id' => $person->personid,
                        'name' => $person->personname,
                        'phones' => json_encode($person->phones),
                    ]);
                }
            }
            $this->log('success', $this->log);

            DB::commit();
            return $this;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error on XmlPerson:', [$exception->getMessage()]);
            $this->log('error', 'Error on upload');
            return $exception->getMessage();
        }
    }
}
