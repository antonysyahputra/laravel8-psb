@extends('layouts.main')

@section('container')
    <main class="d-flex justify-content-center">
        <div class="row">
            <h2 class="text-center">Register</h2>
            <div class="col-md">
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                       @error('name')  
                       <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username">
                        @error('username')  
                       <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')  
                       <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password">
                        @error('password')  
                       <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                        <label for="username">Password</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary btn-sm mt-3">Register</button>
                </form>
                <small class="d-block text-center mt-3">Sudah Register! <a href="/login">Login sekarang</a></small>
            </div>
        </div>
    </main>
@endsection