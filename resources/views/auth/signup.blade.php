@extends('layout')
@section('style')
    <link rel="stylesheet"  href="{{ asset('css/forms.css') }}">
@endsection
@section('main')
<main>
    <section class="form-container">
        <h2>Sign Up</h2>
        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('auth.signup') }}" method="POST">
            @csrf
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="password">Password Confirmation:</label>
            <input type="password" id="password" name="password_confirmation" required>
            
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.html">Login</a></p>
    </section>
</main>

@endsection
