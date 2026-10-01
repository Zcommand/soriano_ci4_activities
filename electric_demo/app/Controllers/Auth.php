<?php

namespace App\Controllers;

use App\Models\UserAccountModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function login(): string|RedirectResponse
    {
        if (session()->get('isLogged') === true) {
            return redirect()->to('/dashboard');
        }

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'username' => 'required|max_length[100]',
                'password' => 'required|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Enter both your username and password.');
            }

            $username = (string) $this->request->getPost('username');
            $password = (string) $this->request->getPost('password');
            $user = (new UserAccountModel())->findByUsername($username);

            if (! $user || ! password_verify($password, $user['password'])) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid username or password.');
            }

            session()->regenerate();
            session()->set([
                'isLogged' => true,
                'user_id' => $user['id'],
                'username' => $user['username'],
            ]);

            return redirect()->to('/dashboard');
        }

        return view('auth/login', [
            'title' => 'Login - Puihaha Electric',
            'page' => 'login',
        ]);
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
