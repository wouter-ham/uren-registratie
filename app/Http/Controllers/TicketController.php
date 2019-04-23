<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
}
