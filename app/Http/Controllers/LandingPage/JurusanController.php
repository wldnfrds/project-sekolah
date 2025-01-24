<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function rpl()
    {
        return view('link.jurusan.rekayasa');
    }
    public function tkr()
    {
        return view('link.jurusan.teknik');
    }
    public function bdp()
    {
        return view('link.jurusan.bisnis');
    }
}
