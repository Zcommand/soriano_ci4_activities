<?php

namespace App\Controllers;

use App\Models\UserAccountModel;
use CodeIgniter\HTTP\RedirectResponse;

class Register extends BaseController
{
    protected UserAccountModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserAccountModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Register - Puihaha Electric',
            'page' => 'register',
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
            'validation' => session()->getFlashdata('validation'),
        ];

        return view('register', $data);
    }

    public function create(): RedirectResponse
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|is_unique[user_accounts.username]',
            'phone' => 'required|min_length[10]|max_length[20]',
            'address' => 'required|min_length[5]|max_length[255]',
            'city' => 'required|min_length[2]|max_length[100]',
            'state' => 'required|min_length[2]|max_length[50]',
            'zip_code' => 'required|min_length[5]|max_length[10]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]',
            'terms' => 'required',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            session()->setFlashdata('validation', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $userData = [
            'username' => $this->request->getPost('email'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        try {
            $userId = $this->userModel->insert($userData);

            if ($userId) {
                session()->setFlashdata('success', 'Account created successfully. Use your registered email address as the username when logging in.');
                return redirect()->to(base_url('register'));
            }

            session()->setFlashdata('error', 'Registration failed. Please try again.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Registration failed: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
