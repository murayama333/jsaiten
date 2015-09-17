<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Presen;
use App\User;

class ReportsController extends Controller
{

    public function fests(){
        // TODO
    }

    public function fest($festId){
        // TODO
    }

    public function presens(){
        if (\Auth::user() == null) {
            abort(403);
        }
        $presens = Presen::all();
        return view('reports/presens', compact(['presens']));
    }

    public function presen($presenId){
        if (\Auth::user() == null) {
            abort(403);
        }
        $presen = Presen::findOrFail($presenId);
        return view('reports/presen', compact(['presen']));
    }

    public function users(){
        if (\Auth::user() == null) {
            abort(403);
        }
        $users = User::all();
        return view('reports/users', compact(['users']));
    }

    public function user($userId){
        if (\Auth::user() == null) {
            abort(403);
        }
        $user = User::findOrFail($userId);
        return view('reports/user', compact(['user']));
    }
}
