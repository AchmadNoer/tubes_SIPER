<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'akun';
    public $timestamps = false;
}