<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    use HasFactory;

    protected $table = 'portals';
    protected $primaryKey = 'portal_id';
    protected $fillable = ['game_id', 'name', 'description'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function wiki()
    {
        return $this->hasOne(Wiki::class, 'portal_id');
    }

    public function news()
    {
        return $this->hasOne(News::class, 'portal_id');
    }

    public function forum()
    {
        return $this->hasOne(Forum::class, 'portal_id');
    }
}