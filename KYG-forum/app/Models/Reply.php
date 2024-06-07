<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';
    protected $primaryKey = 'reply_id';
    protected $fillable = ['discussion_id', 'user_id', 'date', 'content'];

    public function discussion()
    {
        return $this->belongsTo(Discussion::class, 'discussion_id');
    }

    //CONSULTAR
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}