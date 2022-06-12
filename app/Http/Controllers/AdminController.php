<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /******************
     * logout function
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
