<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        "mark", "model", "price", "description", "status", "user_id", "vendor_id", "agency_id"
    ];
}
