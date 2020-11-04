<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Member extends Model
{
    //
    protected $table = 'member';
    protected $fillable = [
        'name', 'university_id','status', 'user_id',
    ];
    protected $hidden = [
      'author_id',
 	];


 	public function get_Org_Group($id){

        $result = DB::table('member')
                          ->select('hospitals.id as id','hospitals.name as name','hospitals.status as status')
                          ->where('member.status', 'yes')
                          ->where('member.user_id', $id)
                          ->join('hospitals', 'hospitals.id', '=', 'member.user_id')
                          ->orderBy('hospitals.created_at', 'desc')
                          //->toSql();
                          ->get();
        return $result;
	}

  public function get_University_By_User($userid){
        $result = DB::table('member')
                          ->select('member.university_id as univid')
                          ->where('member.status', 'yes')
                          ->where('member.user_id', $userid)
                          ->get();
        return $result;
  }

  public function get_University_SNO($userid){
        $result = DB::table('member')
                          ->select('member.id as id',
                            'member.university_id as univid','member.status as status')
                          ->where('member.status', 'yes')
                          ->where('member.user_id', $userid)
                          ->get();
        return $result;
  }

  public function get_sno_list_byuniversity($unv_id){
         $result = DB::table('member')
                          ->select( 'users.id as id')
                          ->join('users', 'users.id', '=',
                            'member.user_id')
                          ->where('member.status', 'yes')
                          ->where('member.university_id', $unv_id)
                          ->get();
        return $result;
  }

}
