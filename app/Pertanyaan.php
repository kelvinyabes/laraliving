<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //
    protected $table = "pertanyaan";

    public function likes(){
        return $this->belongsToMany('App\Like', 'like_tag');
    }
}
