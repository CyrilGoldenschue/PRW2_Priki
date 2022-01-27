<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'practice_id',
        'reason',
        'previously',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
