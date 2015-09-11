<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'slug', 'body', 'member'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
