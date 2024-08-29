<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

use Yajra\DataTables\Facades\DataTables;

class LandingPageController extends Controller
{
    public function createNewLandingPage(Request $request)
    {
        $request->validate([
            'name_landing_page' => 'required|string|max:255',
            'domain_landing_page' => 'required|url|max:255',
        ]);
    
        $newLandingPage = LandingPage::create([
            'name' => $request->input('name_landing_page'),
            'domain' => $request->input('domain_landing_page'),
        ]);
    
        if ($newLandingPage) {
            return response()->json([
                'success' => true,
                'message' => 'Landing page created successfully!',
                'data' => $newLandingPage,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Landing page created failed!',
                'data' => null,
            ]);
        }
    }

    public function deleteLandingPage(Request $request, $id) {
        try {
            $mLandingPage = LandingPage::findOrFail($id);
            $mLandingPage->delete();
            return redirect()->route('landingPageDashboard');
        } catch (Exception $e) {
            Log::error('Failed to delete landing page: ' . $e->getMessage());
        }
    }

    public function getDTLandingPage(Request $request)
    {
        $query = LandingPage::query()->orderBy('created_at', 'desc');
        return Datatables::eloquent($query)->toJson();
    }

    public function detailLandingPage($id)
    {
        $mLandingPage = LandingPage::findOrFail($id);
        return view('layouts.website-landing-page.detail.detail-landing-page', compact('mLandingPage'));
    }
}
