<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('layouts.project-overview');
        } else {
            redirect('/login');
        }
    }

    public function getAll()
    {
        return DB::table("projects")->get();
    }
}
