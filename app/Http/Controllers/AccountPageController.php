<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\View\View;

class AccountPageController extends Controller
{
    public function index(): View
    {
        $header = Header::where('is_active', 1)->first() ?? Header::first();

        return view('account.settings', compact('header'));
    }
}
