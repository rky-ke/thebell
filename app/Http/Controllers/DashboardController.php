<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bell;
use App\Models\User;




class DashboardController extends Controller
{
    public function index()
    {
        $bells = Bell::whereBelongsTo(Auth::user())->latest()->paginate(5);

        return view('users.dashboard' , ['bells' => $bells]);
    }

    public function userBells(User $user )
    {
        $userBells = $user->bells()->latest()->paginate(5);

        return view('users.bells', [
            'bells' => $userBells,
            'user' => $user
        ]);
    }
}
