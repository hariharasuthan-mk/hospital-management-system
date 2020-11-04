<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Questionsubmission;
use DB;
use Hash;
use Gate;
use App\User;




class QuestionsubmissionController extends Controller
{


  function __construct()
  {


      $this->middleware('permission:question-list|question-create|question-edit|question-delete', ['only' => ['index','show']]);

      $this->middleware('permission:question-create', ['only' => ['create','store']]);

      $this->middleware('permission:question-edit', ['only' => ['edit','update']]);

      $this->middleware('permission:question-delete', ['only' => ['destroy']]);

      $this->questionsubmission   = new Questionsubmission();

  }

    function __destruct() {
        print "Destroying " . __CLASS__ . "\n";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$last_row=DB::table('question_submission')->orderBy('id', 'DESC')->first();
        //dd($last_row);
        //$data = DB::table('question_submission')->orderBy('id', 'DESC');

        //$data = Questionsubmission::latest()->first();


        /**/
        $data = DB::table('question_submission')->orderBy('id', 'DESC')->paginate(50);
        //$data = User::orderBy('id','DESC')->paginate(50);
        $data = [
            'title' => 'Question List' ,
            'question_data' => $data ,
        ];
        return view('questions.index', $data)->with('i', ($request->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        print 'Create hello';


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $title     = 'Individual Questions';
        $question_data  = Questionsubmission::findorfail($id);
        //$user_organization = $this->member->get_Org_Group($id);

        //$phones = Contacts::where('user_id', $id)->get()->first();//->firstOrFail();

        //$phone1 = $phones['phone1'];
        //$phone2 = $phones['phone2'];

        //$all_queruser_organization = $this->questionsubmission->get_All_Question();


    return view('questions.show',compact('question_data', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
