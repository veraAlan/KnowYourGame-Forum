<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';
    protected $primaryKey = 'idpublications';
    protected $fillable = ['idnews','idportal', 'idgame', 'title', 'content', 'date', 'img'];

    public function news()
    {
        return $this->belongsTo(News::class, 'idnews');
    }

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'idportal');
    }

    // CONSULTAR
    // public function game()
    // {
    //     return $this->belongsTo(Game::class, 'idgame');
    // }
}