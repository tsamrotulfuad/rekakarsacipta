<?php

namespace App\Http\Controllers\Admin\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\InovasiMasyarakat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInovasi = InovasiMasyarakat::count();
        $totalMasyarat = User::role('masyarakat')->count();

        return view('admin.dashboard.index', compact('totalInovasi', 'totalMasyarat'));
    }
}
