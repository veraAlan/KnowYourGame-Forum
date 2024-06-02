<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'idnews';
    protected $fillable = ['idportal'];

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'idportal');
    }
}