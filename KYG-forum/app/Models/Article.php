<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $primaryKey = 'article_id';
    protected $fillable = ['wiki_id', 'title'];

    public function wiki()
    {
        return $this->belongsTo(Wiki::class, 'wiki_id');
    }
}