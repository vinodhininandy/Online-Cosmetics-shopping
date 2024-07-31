<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // Display the form to create a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store the new employee details
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Create a new employee
        Employee::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Display a list of all employees
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Display a single employee's details
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    // Display the authenticated user's employee details
    public function showCheckout()
    {
        // Retrieve the authenticated user's employee details
        $userId = Auth::id();
        $employee = Employee::where('user_id', $userId)->firstOrFail();

        return view('checkout', ['employee' => $employee]);
    }
}
