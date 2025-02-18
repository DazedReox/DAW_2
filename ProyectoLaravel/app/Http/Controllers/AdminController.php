<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::all();
        $speakers = Speaker::all();
        $users = User::all();
        $income = DB::table('payments')->sum('amount');

        return view('admin.dashboard', compact('events', 'speakers', 'users', 'income'));
    }

    public function manageEvents()
    {
        $events = Event::paginate(10);
        return view('admin.manageEvents', compact('events'));
    }

    public function manageSpeakers()
    {
        $speakers = Speaker::paginate(10);
        return view('admin.manageSpeakers', compact('speakers'));
    }

    public function manageUsers()
    {
        $users = User::paginate(10);
        return view('admin.manageUsers', compact('users'));
    }

    public function viewIncome()
    {
        $income = DB::table('payments')->get();
        return view('admin.income', compact('income'));
    }
}
