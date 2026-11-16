<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    /**
     * Format response sukses standar RESTful API
     */
    protected function sendResponse($data, $message = 'Data berhasil diambil', $code = 200, $extra = [])
    {
        $response = array_merge([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $extra);

        return response()->json($response, $code, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Format response error standar RESTful API
     */
    protected function sendError($message = 'Data tidak ditemukan', $code = 404, $errors = [])
    {
        $response = [
            'success' => false,
            'message' => $message,
            'data'    => null,
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
