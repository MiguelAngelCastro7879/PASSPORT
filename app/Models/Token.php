<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    public static function getToken(){
        return $token = "aio_DPgi10k95LH29VekJw0JYGvq3z6C";
    }

}
