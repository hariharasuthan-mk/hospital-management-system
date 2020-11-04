<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\User\FieldRequest;
use App\Http\Requests\User\updateFieldRequest;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Gate;
use App\University;
use App\Hospitals;
use App\Member;
use App\Contacts;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        /**/
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

        $user = auth()->user();

        $this->member   = new Member();
        $this->contacts = new Contacts();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'List Users1';
        
       
        /*
        if($request->all()){
            dd($request->all()['role']);       
            $role = $request->all()['role'];
            $data = User::orderBy('id','DESC')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                        ->where('model_type', '=', 'App\\User')
                        ->where('roles.name', '=', $role);


        }
        
        else{
            $data = User::orderBy('id','DESC')->paginate(50);
        return view('users.index',compact('data','title',))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        } 
        */
                           
        $data = User::orderBy('id','DESC')->paginate(50);
        return view('users.index',compact('data','title',))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        

      //return view('custom.index', compact(['title',]))->withData(json_encode($books));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add User';
        $roles = Role::pluck('name','name')->all();
        $hospital = Hospitals::where('status', 'yes')->pluck('name','id')->toArray();

        return view('users.create',compact('roles','hospital','title'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $validatedData = $request->validated();


        $phone1 = $request->input('phone1');
        $phone2 = $request->input('phone2');

        $user = User::create($validatedData);
        $lastInsertedId = $user->id;

        $this->add_contacts($request->input('phone1'),$request->input('phone2'),$lastInsertedId);
        $this->add_membership($request->input('organizations'),$lastInsertedId);
        $user->assignRole($request->input('roles'));




        return redirect()->route('users.index')
                        ->with('success','User created successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Gate::allows('isSuperadmin');
        $title = 'Show User';
        $user = User::find($id);
        $user_organization = $this->member->get_Org_Group($id);
        
        /*
        dd($id);
        DB::enableQueryLog();
        dd(DB::getQueryLog());
        */


        $phones = Contacts::where('user_id', $id)->get()->first();//->firstOrFail();

        $phone1 = $phones['phone1'];
        $phone2 = $phones['phone2'];


    return view('users.show',compact('user','user_organization','phone1','phone2','title'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $title = 'Edit User';
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        $hospital = Hospitals::where('status', 'yes')->pluck('name','id')->toArray();

        $selected_hospital = Member::where('status', 'yes')
                                        ->where('user_id', $id)
                                        ->pluck('user_id')->toArray();

        $phones = Contacts::where('user_id', $id)->get()->first();//->firstOrFail();

        $phone1 = $phones['phone1'];
        $phone2 = $phones['phone2'];

        return view('users.edit',compact('user','roles','userRole','hospital','selected_hospital','phone1','phone2','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateFieldRequest $request, $id)
    {
        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);

        $contacts = Contacts::where('user_id',$id)->get()->first();

        //dd($input['phone1'].'=>'.$input['phone2'].'=>'.$contacts['id']);

        $this->update_contacts($input['phone1'],$input['phone2'],$contacts['id']);
        $this->get_membershipdetail($request->input('organizations'),$id);
        $validatedData = $request->validated();

        $user->update($validatedData);

        //$contacts = Contacts::find($id);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        //$this->add_contacts($request->input('phone1'),$request->input('phone2'),$id);

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }

    public function get_membershipdetail($request,$uid){

    $univ_mem = Member::where('user_id', $uid)
                        ->pluck('id')->toArray();

        if(!empty($univ_mem)){
            DB::table('Member')->wherein('id',$univ_mem)->delete();
            //print ('deleted');
        }
        if($request){
           $input['organizations']    = $request;

           foreach($input['organizations'] as $value){
            $univ_mem = new Member;
            $univ_mem->university_id = $value;
            $univ_mem->user_id       = $uid;
            $univ_mem->status        = 'yes';
            $univ_mem->save();
           }
        }
    }

    public function add_contacts($phone1,$phone2,$uid){

        if($phone1){

                $contacts = new Contacts;
                $contacts->phone1  = $phone1;
                $contacts->phone2  = $phone2;
                $contacts->user_id = $uid;
                $contacts->save();

        }
    }

    public function update_contacts($phone1,$phone2,$id){

        if($id){

                $contacts = Contacts::find($id);
                $contacts->phone1  = $phone1;
                $contacts->phone2  = $phone2;
                $contacts->save();

        }
    }

    public function add_membership($request,$uid){

        if($request){
           $input['organizations']    = $request;

            foreach($input['organizations'] as $value){
                $univ_mem = new Member;
                $univ_mem->university_id = $value;
                $univ_mem->user_id       = $uid;
                $univ_mem->status        = 'yes';
                $univ_mem->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::where('user_id', '=', $id)->delete();
        Contacts::where('user_id', '=', $id)->delete();
        User::find($id)->delete();



        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function getSNO($univid) {

        $all_snousers = User::role('SNO')->pluck('id')->toArray();
        $sno_member_list = $this->Member->get_sno_list_byuniversity($univid);
        $univ_members = array();
        foreach($sno_member_list  as  $value){
            $univ_members[] = $value->id;
        }
        $result_sno_member =array_intersect($all_snousers,$univ_members);
        $all_snousers = User::whereIn('id', $result_sno_member)
                        ->pluck('name','id')->toArray();
        return json_encode($all_snousers);
    }

}
