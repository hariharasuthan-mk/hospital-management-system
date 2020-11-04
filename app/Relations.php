<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Relations extends Model
{
    protected $table = 'relations';
    protected $fillable = [
        'name', 'email','phone', 'user_id', 
    ];
}
