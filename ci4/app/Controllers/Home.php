<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view(
            'index',
            [
                'title' => 'Halaman Home',
                'content' => 'Ini adalah halaman Home yang menjelaskan tentang isi halaman ini.'
            ]
        );
    }
}
