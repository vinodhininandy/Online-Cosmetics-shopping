<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
         
    }

    public function create()
    {
        return view('customers.create');
    }
public function store(Request $request)
{
    // dd($request);
    $request->validate([
        'First_Name' => 'required|string|max:255',
        'Last_Name' => 'required|string|max:255',
        'Phone_No' => 'required|string|max:10',
        'Email_Id' => 'required|email|unique:customers,Email_Id',
        'DOB' => 'required|date|max:255',
        'Gender' => 'required|string|max:20',
        'Address' => 'required|string|max:255',
        'Sample_Photo' => 'required|image',
    ]);

    // Create a new Customer instance
    $customer = new Customer();

    // Fill the customer model with validated data
    $customer->First_Name = $request->input('First_Name');
    $customer->Last_Name = $request->input('Last_Name');
    $customer->Phone_No = $request->input('Phone_No');
    $customer->Email_Id = $request->input('Email_Id');
    $customer->DOB = $request->input('DOB');
    $customer->Gender = $request->input('Gender');
    $customer->Address = $request->input('Address');
    $customer->Description = $request->input('Description');

    // Handle Sample_Photo upload
    if ($request->hasFile('Sample_Photo')) {
        $image = $request->file('Sample_Photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $customer->Sample_Photo = $imageName;
    }

    // Save the customer to the database
    $customer->save();

    // Redirect with success message
    return redirect()->route('customers.create')->with('success', 'Customer added successfully.');
}

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request)
{
    // $request->validate([
    //     'First_Name' => 'required|string|max:255',
    //     'Last_Name' => 'required|string|max:255',
    //     'Phone_No' => 'required|string|max:10',
    //     'Email_Id' => 'required|email|unique:customers,Email_Id',
    //     'DOB' => 'required|date|max:255',
    //     'Gender' => 'required|string|max:20',
    //     'Address' => 'required|string|max:255',
    //     'Sample_Photo' => 'required|image',
    // ]);

    $customer = Customer::findOrFail($request->id);
    if ($customer) {
        $customer->update([
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'Phone_No' => $request->Phone_No,
            'Email_Id '=> $request->Email_Id,
            'DOB' => $request->DOB,
            'Gender' => $request->Gender,
             'Address' => $request->Address,
            'Description' => $request->Description,
        ]);

        return response()->json(['message' => 'customer updated successfully'], 200);
    } else {
        return response()->json(['error' => 'customer not found'], 404);
    }
}
public function updateImage(Request $request, $id)
{
    $customer = Customer::findOrFail($id);
    
    if ($request->hasFile('image')) {
        // Handle image upload
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $customer->Sample_Photo = $imageName;
        $customer->save();

        return response()->json(['url' => asset('storage/images/' . $imageName)]);
    }

    return response()->json(['error' => 'Image not provided'], 400);
}
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function print(Customer $customer)
    {
        return view('customers.print', compact('customer'));
    }
    
}

