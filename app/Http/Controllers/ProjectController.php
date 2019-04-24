<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function createProject (Request $request)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $current_timestamp = Carbon::now()->timestamp;

        DB::table('projects')->insert(
            ['title' => $title, 'desc' => $desc, 'created_at' => $current_timestamp]
        );
    }
}
