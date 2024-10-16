<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

{{-- 
@extends('layouts.app')
@section('content')
<div class="container"> --}}
        <!-- <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div> -->
        {{-- <div class="containerd">
            <div class="login-boxx">
                <div class="login-contentt">
                    <h2>Login to your account</h2>
                    <form>
                        <div class="input-groupd">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email">
                        </div>
                        <div class="input-groupd">
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn">Login in</button>
                    </form>
                    <p class="sign-up-text">Don’t have an account? <a href="#">Sign Up!</a></p>
                    <!-- <div class="faq-section">
                        <p><span class="faq-icon">?</span> Can you change your plan?</p>
                        <p class="small-text">Whenever you want. Fluid will also change with you according to your needs.</p>
                        <a href="#" class="contact-link">Contact Us</a>
                    </div> -->
                </div>
            </div>
            <div class="video-box">
                <video autoplay muted loop>
                    <source src="assets/img/04.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    @endsection --}}
