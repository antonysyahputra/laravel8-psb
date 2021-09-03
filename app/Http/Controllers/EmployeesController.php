<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{
    public function index()
    {

        $title = '';
        if (request('unit')) {
            $unit = Unit::firstWhere('slug', request('unit'));
            $title = $unit->name;
        }

        return view('employees', [
            "title" => "Pegawai ". $title,
            "active" => "pegawai",
            // "employees" => Employee::paginate(10),
            "employees" => Employee::with(['unit'])->latest()->Filter(request(['search', 'unit']))->paginate(10)->withQueryString(),
            "units" => Unit::with('employee')->get(),
        ]);
    }

    public function create()
    {
        return view('employees.create', [
            "title" => "Tambah Data",
            "active" => "pegawai",
            "units" => Unit::with('employee')->get(),
        ]);
    }



    public function importExportView()
    {
       return view('import');
    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function import()
    {
        Excel::import(new EmployeesImport,request()->file('file'));

        return back();
    }

    // public function unit(Unit $unit)
    // {
    //     return view('employees', [
    //     "title" => "Pegawai",
    //     "active" => "pegawai",
    //     "employees" => $unit->employee->load('unit')->paginate(10),
    //     "units" => Unit::first()->get(),
    //     ]);
    // }
}
