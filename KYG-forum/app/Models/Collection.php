<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'collections';
    protected $primaryKey = 'collection_id';
    protected $fillable = ['game_id', 'category'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}