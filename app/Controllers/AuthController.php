<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('is_admin')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('auth/login', ['title' => 'Admin Login']);
    }

    public function attemptLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = (new UserModel())->where('email', $this->request->getPost('email'))->first();

        if (! $user || ! password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        session()->regenerate();
        session()->set([
            'admin_id' => $user['id'],
            'admin_name' => $user['name'],
            'is_admin' => true,
        ]);

        return redirect()->to('/admin/dashboard')->with('success', 'Welcome back, ' . $user['name'] . '.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/admin/login')->with('success', 'You have been logged out.');
    }
}
