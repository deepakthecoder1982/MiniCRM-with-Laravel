<?php


// app/Http/Controllers/CompanyController.php
namespace App\Http\Controllers;

class CompanyController extends Controller
{
    //
}

public function create()
{
    return view('companies.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'nullable|email',
        'website' => 'nullable|url',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for logo upload
    ]);

    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('public/logos');
        $validatedData['logo'] = str_replace('public/', '', $logoPath);
    }
    
    // Create the company using validated data
    Company::create($validatedData);
    
    return redirect()->route('companies.index')
        ->with('success', 'Company created successfully.');
    }
    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('private/profile_pictures');
        $validatedData['profile_picture'] = str_replace('private/', '', $profilePicturePath);
    }
    
    
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'nullable|email',
        'website' => 'nullable|url',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for logo upload
    ]);
    if ($request->hasFile('logo')) {
    // Delete the old logo if it exists
    if ($company->logo) {
        Storage::delete('public/' . $company->logo);
    }

    if ($request->hasFile('profile_picture')) {
        // Delete the old profile picture if it exists
        if ($employee->profile_picture) {
            Storage::disk('private')->delete('profile_pictures/' . $employee->profile_picture);
        }
    
        $profilePicturePath = $request->file('profile_picture')->store('private/profile_pictures');
        $validatedData['profile_picture'] = str_replace('private/', '', $profilePicturePath);
    }
    
    
    $logoPath = $request->file('logo')->store('public/logos');
    $validatedData['logo'] = str_replace('public/', '', $logoPath);
}

    // Find the company by ID
    $company = Company::findOrFail($id);

    // Update the company using validated data
    $company->update($validatedData);
    
    return redirect()->route('companies.index')
    ->with('success', 'Company updated successfully.');

    return redirect()->route('companies.index')
    ->withErrors(['error' => 'Something went wrong.']);

    $companies = Company::paginate(10); // Display 10 companies per page
}

public function destroy($id)
{
    // Find the item by ID and delete it
    $item = Company::findOrFail($id);
    $item->delete();

    return redirect()->route('companies.index')
        ->with('success', 'Item deleted successfully.');
}
