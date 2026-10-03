@extends('layouts.guest')

@section('title', 'Register - Office Inventory')

@section('content')

<div class="auth-page">

    <div class="auth-card">

        <!-- Header -->
        <div class="auth-header">

            <h1>Register</h1>

            <p>Create new account</p>

        </div>


        <!-- Register Form -->
        <div class="auth-form">

            <form action="{{ route('register.proses') }}" method="POST">
                @csrf

            <!-- Full Name -->
            <div class="form-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Full Name"
                    autocomplete="name"
                >

            </div>


            <!-- Email -->
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="username@mail.com"
                    autocomplete="email"
                >

            </div>


            <!-- Password -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        id="togglePassword"
                    >
                        Show
                    </button>

                </div>

            </div>


            <!-- Submit -->
            <button
                type="submit"
                class="btn-primary"
            >
                Register
            </button>

        </div>


        <!-- Login Link -->
        <div class="auth-footer">

            <p>
                Already have an account?
                <a href="/login">
                    Sign in
                </a>
            </p>

        </div>

    </div>

</div>

@endsection
