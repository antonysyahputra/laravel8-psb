@extends('layouts.main')

@section('container')

<h1>{{ $employer->name }}</h1>
<p>{{ $employer->no_hp }}</p>
<a href="/employees?unit={{ $employer->unit->slug }}">back to Employees</a>
@endsection()