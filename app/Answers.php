<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Answers extends Model
{
    //
    protected $table = 'question_answers';
    protected $fillable = [
        'answered', 'answers','status','question',
    ];
}
