<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Questionsubmission extends Model
{
    //
    protected $table = 'question_submission';
    protected $fillable = [
        'phone1', 'phone2','user_id',
    ];


    public function __call($method, $args) {

        if ($method === 'findSum') {
            echo 'Sum is calculated to ' . $this->_getSum($args);
        } else {
            echo "Called method $method";
        }
    }

    private function _getSum($args) {
        $sum = 0;
        foreach ($args as $arg) {
            $sum += $arg;
        }
        return $sum;
    }


    /*
    public function get_All_Question(){

          $result = DB::table('question_submission')
                            ->select('university.id as id','university.name as name','university.status as status')
                            ->where('member.status', 'yes')
                            ->where('member.user_id', $id)
                            ->join('university', 'university.id', '=', 'member.university_id')
                            ->orderBy('university.created_at', 'desc')
                            ->get();
          return $result;
  	}
    */

    public function get_All_Question($uid){

          $result = DB::table('question_submission')
                            ->select('question_submission.id as id','question_submission.name as name','question_submission.status as status')
                            ->where('question_submission.id', $uid)
                            ->join('question_answers', 'question_answers.answers', '=', 'question_submission.id')
                            ->get();
          return $result;
  	}



}
