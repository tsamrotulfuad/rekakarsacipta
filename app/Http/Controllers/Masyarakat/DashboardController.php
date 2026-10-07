<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Admin\InovasiMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInovasi = InovasiMasyarakat::where('user_id', Auth::id())->get();

        return view('admin.dashboard.index', compact('totalInovasi'));
    }
}
