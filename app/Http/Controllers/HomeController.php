<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LandingPage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function landingPageDashboard()
    {
        $listOfLandingPage = LandingPage::all();
        return view('layouts.website-landing-page.dashboard', compact('listOfLandingPage'));
    }
}
