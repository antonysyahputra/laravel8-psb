@extends('layouts.main')

@section('container')
    <main class="d-flex justify-content-center">
        <div class="row">
            <h2 class="text-center">Login</h2>
            <div class="col-md">
                
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close"></button>
                </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input class="form-control @error('email')
                            is-invalid
                        @enderror" type="email" name="email" id="email" placeholder="Email" autofocus required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>                            
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        <label for="username">Password</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary btn-sm mt-3">Login</button>
                </form>
                <small class="d-block text-center mt-3">Belum register! <a href="/register">Register sekarang</a></small>
            </div>
        </div>
    </main>
@endsection