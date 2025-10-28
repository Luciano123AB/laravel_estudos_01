<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function initMethod(): string {
        return "Hello World!";
    }

    public function viewPage(): View {
        return view("home");
    }
}
