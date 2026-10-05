<?php

namespace App\Http\Controllers\Admin\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Admin\InovasiMasyarakat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInovasi = InovasiMasyarakat::count();

        return view('admin.dashboard.index', compact('totalInovasi'));
    }
}
