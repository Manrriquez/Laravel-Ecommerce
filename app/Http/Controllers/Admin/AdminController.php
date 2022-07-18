<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard() {
        
        return view('admin.dashboard');
    }

    public function updateAdminPassword() {
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.updateAdminPassword')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request) {

        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function login(Request $request) {
        //echo $password = Hash::make('12345678'); die;
 
        if($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>";  print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'E-mail is required!',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required!',
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'status'=>1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
