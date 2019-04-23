<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function getAll()
    {

    }

    public function getPersonal ()
    {
        return DB::table('tickets')->where('user_id', '=', Auth::user()->id)->get() | null;
    }

    public function getByProjectId ($id)
    {

    }
}
