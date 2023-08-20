<?php
namespace App\Trait;
use Illuminate\Http\Response;
trait ApiResponseTrait
{
    public function notFoundResponse($message = 'Resource not found')
    {
        return response()->json([
            'message' => $message,
        ], Response::HTTP_NOT_FOUND);
    }

    public function validateErrorResponse($message = 'Validation Faild',$details = [])
    {
        return response()->json([
            'message' => $message,
            'details' => $details
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse($data = [],$message = '')
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], Response::HTTP_OK);
    }

    public function unauthorizedResponse($message = 'Unauthorized')
    {
        return response()->json([
            'message' => $message,
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function serverException($message = 'Server Error',$details='')
    {
        return response()->json([
            'message' => $message,
            'details' => $details
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
