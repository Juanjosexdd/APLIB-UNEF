<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Models\Seguridad\Login;
use Illuminate\Http\Request;

class LoginLogController extends Controller
{
    public function index()
    {
        $logs = Login::with('user')->get();
        return view('login.index', compact('logs'));
    }
}
