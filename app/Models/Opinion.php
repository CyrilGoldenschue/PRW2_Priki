<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'practice_id',
        'user_id',
        'created_at'
    ];


    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class)->withPivot('comment', 'points');
    }

    public function getDownVote(){
        $count = $this->comments()->get()->countBy(function($item){
            return $item->pivot->points;
        });
        return array_key_exists(-1,$count->toArray()) ? $count[-1] : 0;
    }
    public function getUpVote(){
        $count = $this->comments()->get()->countBy(function($item){
            return $item->pivot->points;
        });
        return array_key_exists(1,$count->toArray()) ? $count[1] : 0;
    }

}
