<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees', [
            "title" => "Pegawai",
            "active" => "pegawai",
            // "employees" => Employee::paginate(10),
            "employees" => Employee::with(['unit'])->latest()->Filter(request(['search', 'unit']))->paginate(10)->withQueryString(),
            "units" => Unit::with('employee')->get(),
        ]);
    }

    public function unit(Unit $unit)
    {
        // dd(Employee::first()->unit('name')->paginate(10));
        return view('employees', [
        "title" => "Pegawai",
        "active" => "pegawai",
        // "employees" => $unit->employee()->paginate(10),
        "employees" => $unit->employee->load('unit')->paginate(10),
        "units" => Unit::first()->get(),
        // "units" => $unit->employee,
        ]);
    }
}
