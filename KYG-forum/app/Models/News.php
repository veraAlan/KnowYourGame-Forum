<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'news_ids';
    protected $fillable = ['portal_id'];

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal_id');
    }
}