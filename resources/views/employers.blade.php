@extends('layouts.main')

@section('container')

<h1>Daftar {{ $title }}</h1>
{{-- @dd($units) --}}
@foreach ($units as $unit)
<a href="/employers/{{ $unit->slug }}" class="btn btn-primary mb-3 badge">{{ $unit->name }}</a>
@endforeach
<a href="/employers" class="btn btn-secondary mb-3 badge">REFRESH...</a>
{{-- <a href="/units/ra" class="btn btn-primary mb-3 badge">RA</a> --}}
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
        @php
            $i = 1;
        @endphp
        @foreach ($employers as $employer)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $employer->name }}</td>
            <td>{{ $employer->no_hp }}</td>
            <td>{{ $employer->unit->name }}</td>
            <td class="text-center">
                <a href="" class="btn btn-info badge mx-3">Detail</a>
                <a href="" class="btn btn-danger badge mx-3">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()