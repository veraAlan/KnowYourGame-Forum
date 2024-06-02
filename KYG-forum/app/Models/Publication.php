<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';
    protected $primaryKey = 'idnews';
    protected $fillable = ['idportal', 'idgame', 'title', 'content', 'date'];

    public function news()
    {
        return $this->belongsTo(News::class, 'idnews');
    }

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'idportal');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'idgame');
    }
}