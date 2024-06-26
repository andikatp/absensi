<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'date_permission',
        'time_in',
        'time_out',
        'latlon_in',
        'latlon_out',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
