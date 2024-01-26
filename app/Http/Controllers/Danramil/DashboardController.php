<?php

namespace App\Http\Controllers\Danramil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->id_jabatan !=1){
            return abort(403, 'anda bukan babinsa');
        }

        $data['title'] = 'Dashboard Danramil';

        return view('dashboard_danramil', $data);
    }
}