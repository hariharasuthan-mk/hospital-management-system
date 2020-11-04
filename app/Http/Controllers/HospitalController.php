<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\User;
use App\University;
use App\Hospitals;
use App\Http\Requests\University\FieldRequest;
use App\Http\Requests\University\updateFieldRequest;

class HospitalController extends Controller
{


    public function __construct()
    {

        $this->hospitals = new Hospitals();

        $this->middleware('permission:hospital-list|hospital-create|hospital-edit|hospital-delete', ['only' => ['index','show']]);

        $this->middleware('permission:hospital-create', ['only' => ['create','store']]);

        $this->middleware('permission:hospital-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:hospital-delete', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("hshdshd");
        $user = Auth::user();
        if(Gate::allows('checkrole_Superadmin')){
          //print 'login as superadmin';
          $hospitals = $this->hospitals->getAll_Hospital()->paginate(5);
        }
        else{
          //print 'other user';
          $hospitals = $this->hospitals->getAll_Hospital_bymember($user->id);
        }
        $data = [
            'title' => 'Hospital List' ,
            'hospital_data' => $hospitals ,
        ];
        return view('hospitals.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}

        $data = [ 'title' => 'Add Hospital',
                  'loggedin_userid' => $id];

        return view('hospitals.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate(
                   [
                     'name'       => ["required",'min:3'],
                     'author_id' => ["required"],
                   ],
                    [
                     'name.required' => "You have to choose Name",
                     'name.unique'=> "The Department has already been taken to another University",
                     'name.min'=> "Hospital Should be Minimum of 3 Character",
                   ]
       );
        Hospitals::create($validatedData);//University::create($request->all());

        return redirect()->route('hospitals.index')
                          ->with('success','Hospital created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hospitals $hospital)
    {
        $data = [
            'title' => 'Individual Hospital page',
            'hospitals_data' => $hospital ,
        ];

        return view('hospitals.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospitals $hospital)
    {
        //
        $data = [
            'title' => 'Edit hospital page',
            'hospital_data' => $hospital ,

        ];
        return view('hospitals.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospitals $hospital)
    {
      $validatedData = request()->validate(
                 [
                   'name'       => ["required",'min:3'],
                   'author_id' => ["required"],
                 ],
                  [
                   'name.required' => "You have to choose Name",
                   'name.unique'=> "The Department has already been taken to another University",
                   'name.min'=> "Hospital Should be Minimum of 3 Character",
                 ]
       );
       $hospital->update($validatedData);

       return redirect('hospitals');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $row = Hospitals::find($id);
        $row->delete();
        return redirect('hospitals');

    }
}
