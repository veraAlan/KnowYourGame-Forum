<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $primaryKey = 'idsection';
    protected $fillable = ['idarticle', 'content', 'img'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'idarticle');
    }
}