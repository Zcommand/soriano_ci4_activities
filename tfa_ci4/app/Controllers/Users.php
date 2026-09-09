<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'Tony Stark',
                'role' => 'admin'
            ],
            [
                'username' => 'admin02',
                'full_name' => 'Peter Parker',
                'role' => 'admin'
            ],
            [
                'username' => 'admin03',
                'full_name' => 'Loki Odin',
                'role' => 'moderator'
            ],
            [
                'username' => 'admin04',
                'full_name' => 'Thor Odin',
                'role' => 'moderator'
            ],
            [
                'username' => 'admin05',
                'full_name' => 'Dr.Strange',
                'role' => 'staff'
            ]
        ];

        return view('users/index', ['users' => $users]);
    }
}
