<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'user_id', 'post_type'];

    protected $guarded = ['id'];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function createComment($data)
    {
        return Comment::create($data);
    }

    public function post()
    {
        return $this->morphTo();
    }
}
