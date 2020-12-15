<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\ShipOrder;
use Illuminate\Support\Facades\Log;

class ShipOrderApiController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = ShipOrder::with('person')->get();
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
            $data = ShipOrder::with('person')->findOrFail($id);
            return response()->json(['data' => $data, 'message' => 'List', 'status' => 200]);
        } catch (\Exception $exception) {
            return response()->json(['data' => '', 'message' => 'Error', 'status' => 500]);
        }
    }
}
