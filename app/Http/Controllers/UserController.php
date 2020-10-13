<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function admin()
    {
        $checkUser = auth()->user();
        //dd();
        if ($checkUser->isAdmin !== 0){
            $users = User::all();
            if ($users->count() > 0){
                return view('user.admin', compact('users'));
            } else{
                dd('no admin set');
            }
        } else{
            dd('you are not admin');
        }

    }

    public function loginEmail()
    {
        return view('user.login');
    }

    public function loginPass()
    {
        return view('user.login-password');
    }

    public function checkEmail(Request $request, CheckEmailRequest $checkEmailRequest)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user !== null){
            return view('user.login-password', compact('email'))->with('success', 'Email exist');
        }
        return redirect()->back()->with('error', 'email doesnt exist');
    }

    public function checkPassword(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if (Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id);
            return view('user.profile', compact('user'));
        }
        return view('user.login-password', compact('email'));

    }

    public function avatar(Request $request)
    {
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

        }
        return redirect()->back()->with('success', 'You have updated your avatar successfully!');
    }

    public function destroy($id){

        User::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function edit()
    {
        $user = User::find(auth()->user())->first();

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
      // dd($id);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $roles = $request->roles;
        foreach ($roles as $role){
            $user->isAdmin = $role;
        }
        $user->avatar = 'default.jpg';
        $user->save();
        return redirect()->route('admin')->with('success', 'User was updated');
    }
}
