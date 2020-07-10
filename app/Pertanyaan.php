<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //
    protected $table = "pertanyaan";

    // blacklist
    protected $guarded = [];

    // reationship many-to-one ke table user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //relationship one-to-many ke table jawaban
    public function jawaban()
    {
        return $this->hasMany('App\Models\JawabanModel', 'pertanyaan_id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Like', 'like_tag');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'item_tag', 'pertanyaan_id', 'tag_id');
    }
}
