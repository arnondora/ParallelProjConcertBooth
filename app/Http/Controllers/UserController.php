<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class UserController extends Controller
{
    public function login ()
    {
      return view ('administrator.login');
    }

    public function doLogin (Request $request)
    {
      $username = $request->username;
      $password = $request->password;

      if (Auth::attempt(['username' => $username, 'password' => $password])) return redirect('/dashboard');
      else return redirect ("/login")->withInput()->withError(array('message' => 'Login Username and Password is incorrect. Please Try again'));
    }

    public function doLogout ()
    {
      Auth::logout();
      return redirect('/login')->with("message", "You're Logout");
    }

    public function newUser ()
    {
      return view('user.new');
    }

    public function changePassword ()
    {
      return view ('user.changePassword');
    }

    public function doNewUser (Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'surname' => 'required',
        'username'=>'required|unique:User,username',
        'email'=>'required|email'
      ]);

      $newUser = new User();

      $rawPassword = substr(bcrypt($request->username),0,10);

      $newUser->name = $request->name;
      $newUser->surname = $request->surname;
      $newUser->username = $request->username;
      $newUser->password = bcrypt($rawPassword);
      $newUser->email = $request->email;

      $newUser->save();

      return view('user.confirm',['username' => $request->username, 'password' => $rawPassword]);
    }

    public function doDeleteUser (Request $request)
    {
      $targetUser = User::find($request->id);

      if (count(User::all()) == 1) return redirect('/dashboard/user')->withError('deletingUser', 'Cannot delete this user');

      try {
        $targetUser->delete();
        return redirect('/dashboard/user')->with('success','Delete User Successfully');
      } catch (Exception $e) {
        return redirect('/dashboard/user')->withError('deletingUser','Cannot delete this user');
      }

    }

    public function doChangePassword (Request $request)
    {
      $this->validate($request,[
        'username' => 'required|exists:User,username',
        'oldpassword' => 'required',
        'newpassword'=>'required|confirmed'
      ]);

      //check oldpassword
      if (Auth::attempt(['username' => $request->username, 'password' => $request->oldpassword]))
      {
        //if correct
        $changeUser = User::where('username',$request->username)->get()->first();

        $changeUser->password = bcrypt($request->newpassword);
        $changeUser->save();
        Auth::logout();

        return redirect('/login');
      }
      else {
        //invalid
        return back()->withInput()->withError(['changePassword' => 'Your Old Password is invalid. Please re-check and try again']);
      }
    }
}
