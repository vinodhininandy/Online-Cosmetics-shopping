<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'First_Name', 'Last_Name', 'Phone_No', 'Email_Id', 'DOB', 'Gender', 'Address', 'Sample_Photo', 'Description',
    ];
}
