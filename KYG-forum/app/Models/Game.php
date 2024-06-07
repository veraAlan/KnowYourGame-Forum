<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'games';
    protected $primaryKey = 'idgame';
    protected $fillable = ['title', 'img'];
}
