<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'tags';
    protected $primaryKey = 'tag_id';
    protected $fillable = ['game_id', 'category'];
}