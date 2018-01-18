<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;
use App\User;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->data['config'] = ConfigModel::findOrFail(1);
    }

    public function index()
    {
        $data = $this->data;
        if (Auth::Check()){
            return redirect()->route('back.dashboard');
        }

        return view('auth.login', $data);
    }

    public function authenticate(Request $request){

        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        $rules = array(
            'name' => 'required',
            'password' => 'required|min:8'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails() || Auth::Attempt($credentials) == false){
            return redirect()->route('auth.login')->with('message', 'Login Error');
        } else if (!$validator->fails() && Auth::Attempt($credentials) == true){
            return redirect()->route('back.dashboard');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'password' => 'required|min:8',
            'new_password' => 'required|min:8',
        );

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()){
            return redirect()->back()->with('status', 'failed');
        }

        if ($validator->fails()){
            $recent_password = Auth::user()->password;
            if (\Hash::check($request->recent_password, $recent_password)){
                $user = User::findOrFail($id);
                $user->name = $request->name;
                $user->password = \Hash::make($request->new_password);
                if ($user->save()){
                    return redirect()->back()->with('status', 'success');
                }
            } else {
                return redirect()->back()->with('status', 'failed');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('auth.login');
    }

}
