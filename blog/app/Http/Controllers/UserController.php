<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->isLogin();
        $this->isAdmin();

        $users = User::all();
        return view('user/user', ['users' => $users]);
    }

    public function isLogin()
    {
        if (session('is_login') == null) {
            dd('Anda belum login');
        }
    }

    public function isAdmin()
    {
        if (session('level') != 1) {
            dd('Anda bukan admin');
        }
    }

    public function profile($id)
    {
        $this->isLogin();
        $user = User::find($id);
        return view('user/profile', ['user' => $user]);
    }

    public function login()
    {
         //CEK LOGIN
        if (session('is_login') != null) {
            dd("Anda sudah login");
        }

        return view('user/login');
    }

    public function vallog(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $password = md5($request->password);

        $query = User::where('username', $request->username)->first();
        if (isset($query)) {
            if ($request->username == $query->username && $password == $query->password) {
                session([
                  'user_id' => $query->id,
                  'fname'   => $query->fname,
                  'level'   => $query->level,
                  'is_login' => 1
                ]);

                return redirect('/');
            } else {
                dd('Password/Email yang Anda masukkan salah');
            }
        }else{
            dd('Akun yang Anda cari tidak ditemukan');
        }

    }

    public function register()
    {
        return view('user/register');
    }

    public function valreg(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:tbl_users,email',
            'username' => 'required|min:8|unique:tbl_users,username',
            'password' => 'required',
            'cpassword' => 'required|same:password'
        ]);

        $password = md5($request->password);
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $password,
            'level' => false
        ]);

        return view('/user/login', ['succes_msg' => 'Akun berhasil dibuat, silahkan login']);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function edit($id)
    {
        $this->isLogin();
        if ($id != session('user_id')) {
            $this->isAdmin();
        }

        $users = User::find($id);
        return view('user/edit', ['users' => $users]);
    }

    public function editval(Request $request, $id)
    {
        $this->isLogin();
        if ($id != session('user_id')) {
            $this->isAdmin();
        }

        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => [
                          'required',
                          'email',
                          Rule::unique('tbl_users')->ignore($id),
                       ],
            'username' => [
                              'required',
                              'min:8',
                              Rule::unique('tbl_users')->ignore($id)
                          ],
            'level' => 'required'
        ]);

        User::find($id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'username' => $request->username,
            'level' => $request->level
        ]);

        if ($id != session('user_id')) {
            return redirect('/user');
        } else {
            return redirect('/user/edit/'.$id);
        }
    }

    public function upass($id)
    {
        $this->isLogin();
        if ($id != session('user_id')) {
            $this->isAdmin();
        }

        $users = User::find($id);
        return view('user/upass', ['users' => $users]);
    }

    public function upassval(Request $request, $id)
    {
        $this->isLogin();
        if ($id != session('user_id')) {
            $this->isAdmin();
        }

        $this->validate($request, [
            'passwordlama' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password'
        ]);

        $users = User::find($id);
        $passwordlama = md5($request->passwordlama);

        if($passwordlama == $users->password){
            $password = md5($request->password);

            $users->update([
                'password' => $password
            ]);
        }else{
            dd('password lama salah');
        }

        return redirect('/user/edit/'.$id);
    }

    public function delete($id)
    {
        $this->isLogin();
        $this->isAdmin();

        $user = User::find($id)->delete();
        return redirect('/user');
    }
}
