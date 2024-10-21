<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}*/

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}