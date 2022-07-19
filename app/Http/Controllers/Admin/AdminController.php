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

    public function updateAdminPassword(Request $request) {
        if($request->isMethod('post')) {
            $data->$request->all();
            //echo "<pre>"; print_r($data); die;
            //chear se senha atual esta correta
            if(Hash::check($data['confirm_password'],Auth::guard('admin')->user()->password)) {
              //checar se nova senha e igual que confirm senha
              if($data['current_password']==$data['new_password']) {
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);

                return redirect()->back()->with('sucess_message', 'senha atualizada com sucesso!');

              } else {

                return redirect()->back()->with('error_message', 'Sua senha com senha confirm não se coincide!');

              }
            } else {
                return redirect()->back()->with('error_message', 'Sua senha esta incorreta!');
            }
        }
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

    public function updateAdminDetails(Request $request) {
        if($request->isMethod('post')) {
            $data = request->all();
            //echo "<pre>"; print_r($data); die;

            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-\]+$/u',
                'admin_mobile' => 'required|numeric',
            ];

            $customMessages = [
                'admin_name.required' => 'por favor preencha o seu nome!',
                'admin_name.regex' => 'nome invalido, preencha novamente!',
                'admin_mobile.required' => 'por favor preencha seu celular!',
                'admin_mobile.numeric' => 'numero de celular invalido!',

            ];

            $this->validate($request, $rules, $customMessages);

            //Atualizar detalhes do admin
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'], 'mobile'=>$data['admin_mobile']]);

            return redirect()->back()->with('success_message');
        }
        return view('admin.settings.updateAdminDetails', 'detalhes admin atualizados com sucesso!');
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
