<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $table = 'discussions';
    protected $primaryKey = 'iddiscussion';
    protected $fillable = ['idforum', 'user_id', 'date', 'title', 'content'];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'idforum');
    }

    //CONSULTAR
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}