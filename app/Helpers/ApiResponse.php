<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success(
        $data = null,
        string $message = 'Success',
        int $status = 200
    ) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error(
        string $message = 'Error',
        int $status = 400,
        $errors = null
    ) {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }

    public static function paginated(
    $collection,
    string $message = 'Success'
) {
    return response()->json([
        'success' => true,
        'message' => $message,
        'data' => $collection->items(),
        'meta' => [
            'current_page' => $collection->currentPage(),
            'last_page' => $collection->lastPage(),
            'per_page' => $collection->perPage(),
            'total' => $collection->total()
        ]
    ]);
}
public static function exception(
    string $message,
    int $status = 500,
    $errors = null
) {
    return response()->json([
        'success' => false,
        'message' => $message,
        'errors' => $errors
    ], $status);
}
}