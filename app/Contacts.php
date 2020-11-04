<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'phone1', 'phone2','user_id', 
    ];
}
