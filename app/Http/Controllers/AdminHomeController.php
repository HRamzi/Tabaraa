<?php

namespace App\Http\Controllers;

class AdminHomeController extends Controller
{
    public function index()
    {
        // Retourne la vue 'admin.home' enveloppée dans la mise en page 'layouts.admin'
        return view('layouts.admin', ['content' => 'admin.home']);
    }
}
