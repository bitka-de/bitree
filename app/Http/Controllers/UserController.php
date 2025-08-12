<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        
        // Nur Master-User dürfen diese Seite sehen
        if (Auth::user()->role !== 'master') {
            abort(403, 'Kein Zugriff');
        }

        $users = User::all();
        return view('users.index', compact('users'));
    }
}
