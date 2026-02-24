<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function store(Request $request)
    {
        if($request->user()->company) {
            return response()->json([
                'message' => 'User already has a company profile.'
            ], 400);
        }

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'industry_type' => 'required|string|max:255',
            'website_url' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'company_description' => 'required|string',
        ]);

        $company = $request->user()->company()->create($validated);

        return response()->json([
            'message' => 'Company profile created successfully',
            'company' => $company,
        ], 201);
    }


    public function myCompany() 
    {
        $company = $request->user()->company;

        if(!$company) {
            return response()->json([
                'message' => 'No Company profile found for this user.'
            ], 404);
        }

        return response()->json($company);
    }
}
