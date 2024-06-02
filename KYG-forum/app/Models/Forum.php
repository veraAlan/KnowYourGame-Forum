<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forums';
    protected $primaryKey = 'idforum';
    protected $fillable = ['idportal', 'title', 'img'];

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'idportal');
    }
}