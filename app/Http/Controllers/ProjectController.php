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

    public function detail ($id)
    {
        if (Auth::check()) {

            $project = DB::table('projects')->where('id', '=', $id)->get();

            $tickets = DB::table('tickets')->where('project_id', '=', $project[0]->id)->get();

            return view('layouts.project-detail', ['project' => $project, 'tickets' => $tickets]);
        } else {
            redirect('/login');
        }
    }

    public function getAll()
    {
        $projects = DB::table("projects")->get();

        foreach ($projects as $project) {
            $project->tickets = DB::table("tickets")->where('project_id', '=', $project->id)->limit(4)->get();
        }

        return $projects;
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

    public function deleteProject ()
    {

    }
}
