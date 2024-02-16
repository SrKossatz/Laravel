<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){

        $IsAdmin = Auth::user()->user_type == User::TYPE_ADMIN ? true : false;

        if($IsAdmin){
            $message = 'Olá, administrador';
        }



        return view('layouts.dashboard.dashboardHome', compact('message'));
    }

}
