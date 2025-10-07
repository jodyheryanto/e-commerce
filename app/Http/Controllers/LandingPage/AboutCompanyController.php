<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function show($id)
    {
        $aboutCompany = AboutCompany::findOrFail($id);
        return view('cms.about-company.show', compact('aboutCompany'));
    }

    public function update(Request $request, $id)
    {
        $aboutCompany = AboutCompany::findOrFail($id);

        $request->validate([
            'company_name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'privacy_policy' => 'nullable|mimes:pdf',
            'terms_and_conditions' => 'nullable|mimes:pdf',
            'sales_and_refund' => 'nullable|mimes:pdf',
        ]);

        if($request->hasFile('privacy_policy')) {
            $privacyPath = $request->file('privacy_policy')->store('about-companies', 'public');
        } else {
            $privacyPath = $aboutCompany->privacy_policy;
        }

        if($request->hasFile('terms_and_conditions')) {
            $termsPath = $request->file('terms_and_conditions')->store('about-companies', 'public');
        } else {
            $termsPath = $aboutCompany->terms_and_conditions;
        }

        if($request->hasFile('sales_and_refund')) {
            $refundPath = $request->file('sales_and_refund')->store('about-companies', 'public');
        } else {
            $refundPath = $aboutCompany->sales_and_refund;
        }

        $aboutCompany->update([
            'company_name' => $request->company_name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'privacy_policy' => $privacyPath,
            'terms_and_conditions' => $termsPath,
            'sales_and_refund' => $refundPath
        ]);

        return redirect()->route('cms.about-company.show', $id)->with('success', 'About Company updated successfully.');
    }
}
