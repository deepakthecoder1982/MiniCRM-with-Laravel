<?php

use Illuminate\Support\Facades\Route; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes/web.php

Route::resource('companies', 'CompanyController');
// routes/web.php

Route::resource('employees', 'EmployeeController');

Route::get('employee/{id}/profile-picture', 'EmployeeController@profilePicture')->name('employee.profile_picture');

Route::get('profile-pictures/{filename}', 'ProfilePictureController@show')->name('profile-pictures.show');

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
