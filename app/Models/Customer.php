<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'password',
        'draft_order'
    ];
}
