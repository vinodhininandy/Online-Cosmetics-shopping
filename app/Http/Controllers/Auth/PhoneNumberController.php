<?php

namespace App\Http\Controllers;

use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => ['required', new PhoneNumber],
        ]);

        // Process validated data

        return response()->json(['message' => 'Data validated successfully', 'data' => $validatedData]);
    }
}