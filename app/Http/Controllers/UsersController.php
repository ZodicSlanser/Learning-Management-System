<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        //
       /* $users = DB::table('users')->where('role', '>', 1)->get();*/

        $user = User::where('role', '>', 1)->paginate(4);
       
        return view('users.index',['users'=>$user]);     

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $department = Department::get();
        $user = User::where('role', '>', 1)->get();
        return view('users.create',['users' =>$user,'departments'=>$department]);
    }

    public function increment()
    {
        do {
            $increment = random_int(100000, 999999);
        } while (User::where("academic_number", "=", $increment)->first());
    
        return $increment;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $increment = self::increment();
        if(isset($_POST['createD'])){
          
            $fields = $request -> validate([
                'name'=>'required',
                'username'=>'required',
                'email'=>'required',
                'password'=>'required',
                'academic_number',
                'role'=>'required',
                'department_id'=>'required',
            ]);    
           $users = User::get();
            foreach ($users as $user) {
               if($user->email==$_POST['email']){
                   return Redirect::route('users.create')->with('statu',"Email $user->email Aredy exist .");
                   break;
            }}
         $formFields =User::create([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'academic_number'=>$increment,
                'role'=>$request->role,
                'department_id'=>$request->department_id,
                'remember_token'=>Str::random(60), 
                ]);
            
         //   dd($fields,$increment);
                return Redirect::route('users.index')->with('status',"Create sucessfuly .");

           }

           

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $user = User::where('id','=',$id)->with('departments')->first();

        return view( 'users.show' , [ 'users' => $user ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $department = Department::get();
   return view('users.edit',['users'=>$user,'departments'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        if(isset($_POST['edit'])){
            $fields = $request -> validate([
                'name'=>'required',
                'username'=>'required',
                'email'=>'required',
                'password'=>'required',
                'academic_number',
                'role'=>'required',
                'department_id'=>'required',
            
                ]); 

            $user->update([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'academic_number'=>$request->academic_number,
                'role'=>$request->role,
                'department_id'=>$request->department_id,
                'remember_token'=>Str::random(60), 
                ]);
        
                return Redirect::route('users.show',$user->id)->with('status',"Update sucessfuly .");

           }



           }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $user)
    {
        //
        $check = DB::table('enrollments')->where('student_id',$user->id)->first(); 
        if($check!=""){
            return Redirect::route('users.index',$user->id)->with('warning','Warning can not Deleted .');

        }
        $user ->delete();
        return Redirect::route('users.index',$user->id)->with('status','Deleted Sucessfuly .');
    }
}