<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forums';
    protected $primaryKey = 'forum_id';
    protected $fillable = ['portal_id', 'title'];

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal_id');
    }
}