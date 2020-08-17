<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adduser extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'phone', 'password', 'age', 'address'];
}
