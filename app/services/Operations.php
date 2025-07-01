<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    public static function decrypyId($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return null;
        }
        return $id;
    }

    public static function print($obj){
        echo "<pre>";
        print_r($obj);
        echo "</pre>";
    }
}
