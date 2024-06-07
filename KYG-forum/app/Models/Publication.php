<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';
    protected $primaryKey = 'publication_id';
    protected $fillable = ['news_id','portal_id', 'game_id', 'title', 'content', 'date', 'img'];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal_id');
    }

    // CONSULTAR
    // public function game()
    // {
    //     return $this->belongsTo(Game::class, 'game_id');
    // }
}