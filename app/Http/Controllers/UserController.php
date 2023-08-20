<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    
    public function register() {
        $cities = City::all();
        $genders = Gender::all();
        return view('user.auth.register', compact('cities', 'genders'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|max:10|min:10',
            'password' => 'required',
            'birth' => 'required',
            'city_id' => 'required',
            'gender_id' => 'required'
        ]);

        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->birth = $request['birth'];
        $user->city_id = $request['city_id'];
        $user->gender_id = $request['gender_id'];
        $user->user_type = 1;
        $user->is_active = 1;
        $user->save();

        return redirect('/');
    }

    public function login() {
        return view('user.auth.login');
    }

    public function check(Request $request) {
        $cred = $request->only('email', 'password');
        if(Auth::attempt($cred)) {
            return redirect('/');
        }
        else {
            return redirect('/login')->with('failed', 'البريد أو كلمة المرور غير صحيحة');
        }
    }

    public function settings() {
        $user = User::find(Auth::user()->id);
        $cities = City::all();
        return view('user.settings.index', compact('user', 'cities'));
    }

    public function storeSettings(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city_id' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->city_id = $request['city_id'];
        if($request['password'] != null) $user->password = bcrypt($request['password']);
        $user->save();

        return redirect('/settings')->with('success', 'تم حفظ الإعددات بنجاح');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
