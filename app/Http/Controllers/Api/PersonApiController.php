<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Support\Facades\Log;

class PersonApiController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = Person::all();
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
            $data = Person::findOrFail($id);
            return response()->json(['data' => $data, 'message' => 'List', 'status' => 200]);
        } catch (\Exception $exception) {
            return response()->json(['data' => '', 'message' => 'Error', 'status' => 500]);
        }
    }
}
