<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function created($data = null, $message = 'Created')
    {
        return self::success($data, $message, 201);
    }

    public static function noContent($message = 'No content')
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], 204);
    }

    public static function error($message = 'Something went wrong', $code = 500, $errors = null)
    {
        $response = [
            'status' => 'error',
            'message' => $message,
        ];

        if (!is_null($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }

    public static function validationError($errors, $message = 'Validation failed')
    {
        return self::error($message, 422, $errors);
    }

    public static function notFound($message = 'Data not found')
    {
        return self::error($message, 404);
    }

    public static function unauthorized($message = 'Unauthorized')
    {
        return self::error($message, 401);
    }

    public static function forbidden($message = 'Forbidden')
    {
        return self::error($message, 403);
    }

    public static function badRequest($message = 'Bad Request')
    {
        return self::error($message, 400);
    }
}
