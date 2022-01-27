<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
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

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function publish()
    {
        $this->publication_state()->associate(PublicationState::where('slug', 'PUB')->first());
        $this->save();
    }

    public function opinionOf (User $user) : ?Opinion
    {
        return $this->opinions()->where('user_id',$user->id)->first('description');
    }
}
