<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SearchTrait;

class Post extends Model
{
    use SearchTrait;

    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'slug', 'body', 'member'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
