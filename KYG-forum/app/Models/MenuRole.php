<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    use HasFactory;

    protected $table = 'menuroles';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['idmenu', 'idrole'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'idmenu');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole');
    }
}