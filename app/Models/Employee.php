<?php

// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'phone', 'email', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
