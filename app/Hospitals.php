<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Hospitals extends Model
{
  //

  /**
   * The attributes that are mass assignable.
   *
   * @var array
  */
  protected $table = 'hospitals';
  protected $fillable = [
      'name', 'author_id','status',
  ];
  protected $hidden = [
    'author_id',
  ];

  public function getAll_Hospital(){

        $result = DB::table('hospitals')
                          ->select('hospitals.id as id','hospitals.name as name','hospitals.status as status', 'users.name as authorby')
                          ->where('status', 'yes')
                          ->join('users', 'hospitals.author_id', '=', 'users.id')
                          ->orderBy('hospitals.created_at', 'desc');

                          //->get();
    	return $result;
	}

  public function getAll_Hospital_bymember($uid){

        $result = DB::table('hospitals')
                          ->select('hospitals.id as id','hospitals.name as name','hospitals.status as status', 'users.name as authorby')
                          ->where('hospitals.status', 'yes')
                          ->where('universitymember.user_id', $uid)
                          ->join('users', 'hospitals.author_id', '=', 'users.id')
                          ->join('universitymember','hospitals.id', '=',
                            'universitymember.university_id')
                          //->groupBy('university.name')
                          ->orderBy('hospitals.created_at', 'desc')
                          ->paginate(5);
                          //->get();
      return $result;
  }

  public function getAll_Hospital_list(){

        $result = DB::table('hospitals')
                          ->select('hospitals.id as id','hospitals.name as name','hospitals.status as status', 'users.name as authorby')
                          ->where('status', 'yes')
                          ->join('users', 'hospitals.author_id', '=', 'users.id')
                          ->orderBy('hospitals.created_at', 'desc')
                          ->get();
      return $result;
  }

}
