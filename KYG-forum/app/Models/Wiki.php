<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    use HasFactory;

    protected $table = 'wikis';
    protected $primaryKey = 'wiki_id';
    protected $fillable = ['portal_id', 'title'];

    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal_id');
    }
}