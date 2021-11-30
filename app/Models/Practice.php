<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'domain_id',
        'publication_state_id',
        'user_id',
        'updated_at'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publication_state()
    {
        return $this->belongsTo(PublicationState::class);
    }
}
