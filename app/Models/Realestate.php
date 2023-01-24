<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
    use HasFactory;

    //protected $timestamps = false;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        "user_id",
        "address",
        "area",
        "room_count",
        "rent",
        "cost"
    ];
}
