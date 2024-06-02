<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';
    protected $primaryKey = 'idreply';
    protected $fillable = ['iddiscussion', 'username', 'date', 'content'];

    public function discussion()
    {
        return $this->belongsTo(Discussion::class, 'iddiscussion');
    }

    public function user()
    {
        return $this->belongsTo(UsersDb::class, 'username');
    }
}