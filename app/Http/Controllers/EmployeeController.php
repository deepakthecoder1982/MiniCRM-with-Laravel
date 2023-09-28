<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
}
// app/Http/Controllers/EmployeeController.php

public function create()
{
    return view('employees.create');
}

public function store(Request $request)
{
    // Validation goes here
    $validatedData = $request->validate([
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'company_id' => 'required|exists:companies,id',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for profile picture upload
    ]);
    
    Employee::create([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'company_id' => $request->input('company_id'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'profile_picture' => $request->input('profile_picture'),
    ]);

    $path = $request->file('profile_picture')->store('profile_pictures', 'private');

    // Save the $path to the database or associate it with the employee
    // ...

    return redirect()->route('employees.index')
        ->with('success', 'Profile picture uploaded successfully.');

    return redirect()->route('employees.index')
        ->with('success', 'Employee created successfully.');

    $employee = Employee::paginate(10); // Display 10 companies per page

}

public function profilePicture($id)
{
    $employee = Employee::findOrFail($id);

    // Ensure the user is authenticated to access the profile picture
    abort_unless(auth()->check(), 403);

    // Return the profile picture with proper headers
    return response()->file(storage_path('app/private/profile_pictures/' . $employee->profile_picture));
}

public function destroy($id)
{
    // Find the item by ID and delete it
    $item = Company::findOrFail($id);
    $item->delete();

    return redirect()->route('companies.index')
        ->with('success', 'Item deleted successfully.');
}


