<?php

namespace App\Http\Controllers;

use App\Http\Requests\XmlRequest;
use App\Jobs\XmlJob;

class XmlController extends Controller
{
    /**
     * @param XmlRequest $request
     */
    public function upload(XmlRequest $request)
    {
        $file = json_encode(simplexml_load_file($request->file('file')));
        XmlJob::dispatch($file);
    }
}
