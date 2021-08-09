@extends('layouts.main')

@section('container')

<h1>{{ $employer->name }}</h1>
<p>{{ $employer->no_hp }}</p>
<a href="/employees">back to Employers</a>
@endsection()