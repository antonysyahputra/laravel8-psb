<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function employer()
    // {
    //     return $this->hasMany(Employee::class);
    // }
    
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
