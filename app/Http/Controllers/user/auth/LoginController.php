<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('user.login');
    }

    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'document' => 'required',
            'password' => 'required'
        ]);

        //store
        if (!auth()->attempt($request->only('document', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Tus credenciales estan incorrectas');
        } else {
            $user = auth()->user();
            $type = $user->type;
            //dd($type);
            if ($type->name == 'ADMIN') {
                return redirect()->route('instructor.course.index');
            } else {
                return redirect()->route('dashboard.index');
            }
        }
    }

    public  function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
