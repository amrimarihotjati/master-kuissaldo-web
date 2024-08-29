<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class LandingPageController extends Controller
{
    public function getDTLandingPage(Request $request)
    {
        $query = LandingPage::query()->orderBy('created_at', 'desc');
        return Datatables::eloquent($query)->toJson();
    }
}
