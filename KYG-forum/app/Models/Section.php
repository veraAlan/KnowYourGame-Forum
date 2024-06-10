<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $primaryKey = 'section_id';
    protected $fillable = ['article_id', 'title', 'content', 'img'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}