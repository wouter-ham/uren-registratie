<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function index ()
    {
        if (Auth::check()) {
            return view('layouts.ticket-overview');
        } else {
            redirect('/login');
        }
    }

    public function getAll()
    {
        return DB::table('tickets')->get();
    }

    public function getPersonal ()
    {
        return DB::table('tickets')->where('user_id', '=', Auth::id())->get();
    }

    public function getTicketById ($id)
    {
        return DB::table('tickets')->where('id', '=', $id)->get();
    }

    public function getByProjectId ($id)
    {
        return DB::table('tickets')->where('project_id', '=', $id)->get();
    }

    public function createTicket (Request $request)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $project = $request->input('project');
        $current_timestamp = Carbon::now()->timestamp;

        DB::table('tickets')->insert(
            ['title' => $title, 'desc' => $desc, 'user_id' => Auth::id(), 'project_id' => $project, 'updates' => json_encode([$current_timestamp => 0])]
        );
    }
}
