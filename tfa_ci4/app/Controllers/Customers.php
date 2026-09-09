<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Maro Soriano',
                'email' => 'maro@example.com',
                'phone' => '09171234567'
            ],
            [
                'full_name' => 'Mik Gabriel',
                'email' => 'mikmik@example.com',
                'phone' => '09181234567'
            ],
            [
                'full_name' => 'Raili Espiritu',
                'email' => 'zain@example.com',
                'phone' => '09191234567'
            ],
            [
                'full_name' => 'Neo Espiritu',
                'email' => 'Neo@example.com',
                'phone' => '09201234567'
            ],
            [
                'full_name' => 'Jovy Soriano',
                'email' => 'jov@example.com',
                'phone' => '09211234567'
            ]
        ];

        return view('customers/index', ['customers' => $customers]);
    }
}
