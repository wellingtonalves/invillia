<?php


namespace App\Core\Traits;


trait XmlLogger
{
    /**
     * Log
     * @param $log
     * @param $status
     * @return mixed|void
     */
    public function log($status, $log = [])
    {
        \App\Models\Log::create([
            'data' => json_encode($log),
            'status' => $status,
        ]);
    }
}
