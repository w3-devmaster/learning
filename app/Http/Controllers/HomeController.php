<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update_user(Request $request,User $user){
        $request->validate([
            'name' => 'required|string|max:50',
            'avatar' => 'sometimes|nullable|image|mimes:png,jpg,webp|max:1024',
        ]);

        $user->name = $request->name;
        $user->save();

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $file_name = $avatar->getClientOriginalName();
            $mime = $avatar->getMimeType();
            $path = $avatar->storeAs('public/avatar/'.$file_name);

            $user->avatar()->create([
                'mimes' => $mime,
                'file_name' => $file_name,
                'path' => $path,
            ]);
        }

        return redirect()->back()->with('message','อัพเดทข้อมูลเสร็จสิ้น');
    }

    public function users() {
        $users = User::paginate(30);

        return view('users.index',compact('users'));
    }

    public function user(User $user){
        return view('users.show',compact('user'));
    }

    public function roles(){
        $roles = Role::all();

        return view('users.roles',compact('roles'));
    }

    public function role(Role $role){
        return view('users.role',compact('role'));
    }
}
