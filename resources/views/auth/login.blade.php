{{-- Este codigo se genero al hacer composer require laravel/ui y php artisan ui bootstrap --auth
pero lo cambie a diseño Tailwind --}}
@extends('layouts.master')

@section('content')
<div class="flex flex-col justify-center items-center mt-10">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 font-bold text-gray-700 text-lg">
            Login {{-- usa {{ __('Login') }} por si quiero el la config multiidioma 
                        e igual con los demas textos --}}
        </div>

        <div class="p-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        Email Address
                    </label>
                    <input id="email" type="email" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        Password
                    </label>
                    <input id="password" type="password" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror" 
                           name="password" required autocomplete="current-password">

                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div class="mb-6 flex items-center">
                    <input class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                           type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 block text-sm text-gray-700" for="remember">
                        Remember Me
                    </label>
                </div>

                <div class="flex flex-col items-center space-y-4">
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Login
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:text-blue-700 transition duration-300" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
