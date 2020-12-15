<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Log;

class LogApiController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = Log::all();
            return response()->json(['data' => $data, 'message' => 'List', 'status' => 200]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['data' => '', 'message' => 'Error', 'status' => 500]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $data = Log::findOrFail($id);
            return response()->json(['data' => $data, 'message' => 'List', 'status' => 200]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['data' => '', 'message' => 'Error', 'status' => 500]);
        }
    }
}
