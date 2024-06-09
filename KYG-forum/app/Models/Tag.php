<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'tags';
    protected $primaryKey = 'tag_id';
    protected $fillable = ['game_id', 'category'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}