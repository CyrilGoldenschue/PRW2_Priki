<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }

    public function published_practices(){
        return $this->practices()->whereHas('publication_state', function ($q){
            $q->where("slug", "PUB");
        });
    }

}
