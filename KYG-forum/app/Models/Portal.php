<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    use HasFactory;

    protected $table = 'portals';
    protected $primaryKey = 'idportal';
    protected $fillable = ['idgame', 'name', 'description'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'idgame');
    }
}