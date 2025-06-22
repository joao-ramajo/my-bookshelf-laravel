<?php 

namespace App\Services;

use Illuminate\Support\Facades\Log;

class LogService{
    protected static string $channel = 'books';

    public static function info(string $message){
        Log::channel(self::$channel)->info($message);
    }
}

?>