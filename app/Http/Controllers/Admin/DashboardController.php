<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $suratmasuk = SuratMasukModel::count();
        $suratkeluar = SuratKeluarModel::count();
        $users = User::count();

        return view('Admin.Dashboard', compact('suratmasuk', 'suratkeluar', 'users'));
    }
}
