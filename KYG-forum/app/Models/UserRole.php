<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'userroles';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['username', 'idrole'];

    public function user()
    {
        return $this->belongsTo(UsersDb::class, 'username');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole');
    }
}