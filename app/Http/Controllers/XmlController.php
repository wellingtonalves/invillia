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
        try {
            $file = json_encode(simplexml_load_file($request->file('file')));
            XmlJob::dispatch($file);

            return redirect()->back()->with('message', 'Successful upload');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Error on upload');
        }
    }
}
