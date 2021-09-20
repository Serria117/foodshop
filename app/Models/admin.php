<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatalble;

class admin extends Authenticatalble
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'admins';
}
