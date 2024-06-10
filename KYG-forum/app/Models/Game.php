<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Game extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'games';
    protected $primaryKey = 'game_id';
    protected $fillable = ['title', 'img'];

    public function tags() {
        return $this->hasMany(Tag::class, 'game_id');
    }

    public function portal() {
        return $this->hasOne(Portal::class, 'game_id');
    }
}
