<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where([
            'name' => $request->name,
            'password' => $request->password
        ])->first();

        if ($admin) {
            Session::put('admin', $admin);
            return redirect('dashboard');
        } else {
            $validation = $request->validate([
                'user' => 'required',
            ], [
                'user.required' => 'User does not exist!'
            ]);
        }
    }

    function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin', ['admin' => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }
}
