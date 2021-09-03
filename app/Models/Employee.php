<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $with = ['unit'];

    protected $table = "employees";

    public function scopeFilter($query, array $filters) {

        // if(isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('username', 'like', '%' . $filters['search'] . '%');
        // };

        $query->when($filters['search'] ?? false, function($query, $search) {
               return $query->where('username', 'like', '%' . $search . '%');
                });

        $query->when($filters['unit'] ?? false, function($query, $unit) {
                return $query->whereHas('unit', function($query) use ($unit) {
                    $query->where('slug', $unit);
                });
        });
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // export import excel
    public function getEmployee()
    {
        $employees = DB::table('employees')->select('name', 'no_hp', 'unit_id')->get()->$request->toArray();
        return $employees;
    }
}
