<?php

namespace App\Helpers;

class ApiResponse {

    public static function send(int $code, bool $status, string $msg, $data=null,){
        return response()->json([
            'code' => $code,
            'status' => $status,
            'message' => $msg,
            'data' => $data
        ],$code);
    }

}