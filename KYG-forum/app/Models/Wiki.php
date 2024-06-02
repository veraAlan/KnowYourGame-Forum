<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    use HasFactory;

    protected $table = 'wikis';
    protected $primaryKey = 'idwiki';
    protected $fillable = ['idportal', 'title'];

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'idportal');
    }
}