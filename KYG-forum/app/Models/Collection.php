<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';
    protected $primaryKey = 'idcollection';
    protected $fillable = ['idgame', 'category'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'idgame');
    }
}