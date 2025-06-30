@extends('layout')
@section('style')
    <link rel="stylesheet"  href="{{ asset('css/forms.css') }}">
@endsection
@section('main')
<main>
    <section class="form-container">
        <h2>Login</h2>
        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('auth.login')}}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
    </section>
</main>
@endsection
