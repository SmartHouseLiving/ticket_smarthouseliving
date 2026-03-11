<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Filament\Schemas\Components\View;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::first();



        return view('welcome', compact('header'));
    }
}
