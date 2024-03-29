<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'comment_id',
        'name',
        'reply',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
