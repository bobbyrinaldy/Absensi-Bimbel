<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $data['user'] = User::where('status','admin')->get();

      return view('/user/index',$data);
    }

    public function create()
    {
      return view('/user/create');
    }

    public function save(Request $req)
    {
      $this->validate($req, [
        'nama' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
      ]);

      $user = new user;

      $user->name = $req->nama;
      $user->username = $req->username;
      $user->password = bcrypt($req->password);
      $user->status = 'admin';
      $user->save();

      return redirect('/admin/user');
    }

    public function edit($id)
    {
      $u = User::find($id);

      return view('user/edit',['u'=>$u]);
    }

    public function update(Request $req,$id)
    {
      $user = User::find($id);
      
      $user->name = $req->nama;
      $user->username = $req->username;
      if ($req->password) {
          $user->password = bcrypt($req->password);
      }
      $user->save();

      return redirect('/admin/user');

    }

    public function delete($id)
    {
      $u = User::find($id);

      $u->delete();

      return back();
    }

   
}
