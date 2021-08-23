@extends('layouts.main')

@section('container')
<h2>Daftar {{ $title }}</h2>
<div class="row">
    <div class="col-md-8">
            {{-- <div class="position-relative mt-2">
            @foreach ($units as $unit)
                <a href="/employees?unit={{ $unit->slug }}" class="btn btn-primary mb-3 badge">{{ $unit->name }}</a>
            @endforeach
                <a href="/employees" class="btn btn-secondary mb-3 badge">REFRESH...</a>
                <a href="/employees" class="btn btn-primary mb-3 badge">Tambah Data</a>
            </div> --}}
            <div class="position-relative mt-2">

                <div class="dropdown d-inline">
                    <a class="btn btn-primary dropdown-toggle badge" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Unit
                    </a>
                  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($units as $unit)
                        <li><a class="dropdown-item" href="/employees?unit={{ $unit->slug }}">{{ $unit->name }}</a></li>
                        @endforeach
                      
                    </ul>
                  </div>
                    <a href="/employees" class="btn btn-secondary mb-3 badge">REFRESH...</a>
                    <a href="/employees/create" class="btn btn-primary mb-3 badge">Tambah Data</a>
            </div>
    </div>
    <div class="col-md-4">
            <form action="/employees">

                @if (request('unit'))
                    <input type="hidden" name="unit" value="{{ request('unit') }}">
                @endif

                <div class="input-group mb-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}" >
                    <button class="btn btn-danger" type="submit" id="button-addon2">Cari</button>
                    </div>
            </form>
    </div>
</div>
    




        @if ($employees->isNotEmpty()) 
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($employees) --}}
                @php
                    $currentPage = $employees->currentPage();
                    $perPage = $employees->perPage();
                    $i = $currentPage * $perPage -9;
                @endphp
            @foreach ($employees as $employee)
        <tr>
            {{-- @dd($employee) --}}
            <td>
                {{ $i++ }}
            </td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->no_hp }}</td>
            <td>{{ $employee->unit->name }}</td>
            <td class="text-center">
                <a href="/employee/{{ $employee->username }}" class="btn btn-info badge mx-3">Detail</a>
                <a href="" class="btn btn-danger badge mx-3">Delete</a>
            </td>
        </tr>
        @endforeach
         @else
            <tr>
                <h4 class="text-danger">Data tidak ditemukan...!</h4>
            </tr>
        @endif

        
    </tbody>
</table>
<div class="Page navigation">
    {{ $employees->links() }}
</div
@endsection()