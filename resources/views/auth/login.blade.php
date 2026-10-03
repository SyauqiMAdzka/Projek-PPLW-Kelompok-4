@extends('layouts.guest')

@section('title', 'Login - Office Inventory')

@section('content')

<div class="auth-page">

    <div class="auth-card">

        <div class="auth-header">

            <h1>Login</h1>

            <p>
                Access inventory & procurement
            </p>

        </div>


        <div class="auth-form">

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="username@mail.com"
                >

            </div>


            <div class="form-group">

                <label for="login-password">
                    Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="login-password"
                        name="password"
                        placeholder="Password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        id="toggleLoginPassword"
                    >
                        Show
                    </button>

                </div>

            </div>


            <div class="login-options">

                <label>
                    <input
                        type="checkbox"
                        name="remember"
                    >

                    Remember me
                </label>

                <a href="#">
                    Forgot password?
                </a>

            </div>


            <button
                type="submit"
                class="btn-primary"
            >
                Login
            </button>

        </div>


        <div class="auth-footer">

            <p>
                Don't have an account?
                <a href="/register">
                    Sign up
                </a>
            </p>

        </div>

    </div>

</div>

@endsection
