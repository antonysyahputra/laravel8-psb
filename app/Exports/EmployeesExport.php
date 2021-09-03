<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class EmployeesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Name',
            'No HP',
            'Unit-Id'
        ];
    }

    public function collection()
    {
        $test = [
            ['nama'=> 'Antony', 'suku' => 'jawa'],
            ['nama'=> 'Edu', 'suku' => 'padang']
        ];
        // return Employee::all();
        // return collect(Employee::getEmployee());
        // return Employee::first()->getEmployee();
        $employees = Employee::select('name', 'no_hp', 'unit_id')->where('id', 1)->get();
        

        dd(collect($test)->all());
        // return collect($test->all());

    }
}
