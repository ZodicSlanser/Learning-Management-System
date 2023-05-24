<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

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

        return view('users.index', ['users' => $user]);

    }

    public function restore_index()
    {
        return view('trash.user_restore', ['users' => User::onlyTrashed()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $increment = self::increment();
        if (isset($_POST['createD'])) {

            $fields = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'academic_number',
                'role' => 'required',
                'department_id' => 'required',
            ]);
            $users = User::get();
            foreach ($users as $user) {
                if ($user->email == $_POST['email']) {
                    return Redirect::route('users.create')->with('status', "Email $user->email Already exists");
                }
            }
            $formFields = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'academic_number' => $increment,
                'role' => $request->role,
                'department_id' => $request->department_id,
                'remember_token' => Str::random(60),
            ]);

            //   dd($fields,$increment);
            return Redirect::route('users.index')->with('status', "Create sucessfuly .");

        }
    }

    public function increment()
    {
        do {
            $increment = random_int(100000, 999999);
        } while (User::where("academic_number", "=", $increment)->first());

        return $increment;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $department = Department::get();
        $user = User::where('role', '>', 1)->get();
        return view('users.create', ['users' => $user, 'departments' => $department]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::where('id', '=', $id)->with('departments')->first();

        return view('users.show', ['users' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $department = Department::get();
        return view('users.edit', ['users' => $user, 'departments' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        if (isset($_POST['edit'])) {
            $fields = $request->validate([
                'name' => 'required',
                'username' => 'required|unique:App\Models\User,username',
                'email' => 'required|email|unique:App\Models\User,email',
                'password' => 'required',
                'academic_number', 'unique:App\Models\User,academic_number',
                'role' => ['required ', new Enum(Role::class)],
                'department_id' => 'required',

            ]);

            $user->update([[Collection::unwrap($fields),
                'remember_token' => Str::random(60)],
            ]);
            return Redirect::route('users.show', $user->id)->with('status', "Updated successfully");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index', $user->id)->with('status', 'Deleted Successfully');
    }

    public function restore()
    {
        $id = Request()->id;
        User::onlyTrashed()->where('id', $id)->first()->restore();
        return Redirect::route('user.restore.index')->with('status', 'Restored Successfully.');
    }

    function loginindex()
    {
        return view('login');
    }

    /**
     * @throws ValidationException
     */
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (!(Auth::attempt($user_data))) {
            return back()->with('error', 'Wrong Login Details');
        }
        if (Auth::user()->role == Role::ADMIN) {
            return redirect('/departments');
        }
        if (Auth::user()->role == Role::PROFESSOR) {
            return redirect('/professorCourses');

        }
        if (Auth::user()->role == Role::STUDENT) {
            return view('student_homepage');
        }
        return redirect('/login');
    }


    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
