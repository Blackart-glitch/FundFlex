<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="d-flex min-vh-100 flex-column justify-content-center px-4 py-5 lg:px-5">
        <div class="mx-auto w-full max-w-sm">
            <img class="mx-auto mb-4" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company" height="40">
            <h2 class="mt-6 text-center text-2xl font-bold leading-9 text-gray-900">{{ __('Sign in to your Account') }}
            </h2>
        </div>

        <div class="mt-8 mx-auto w-full max-w-sm">
            <form class="space-y-4" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-900">{{ __('Email Address') }}</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="form-control py-2.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <label for="password" class="block text-sm font-medium text-gray-900">{{ __('Password') }}</label>
                    <div class="text-sm">
                        <a href="#"
                            class="font-weight-semibold text-indigo-600 hover:text-indigo-500">{{ __('Forgot Password?') }}</a>
                    </div>
                </div>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="form-control py-2.5 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="btn btn-indigo btn-block py-2.5 font-semibold">{{ __('Sign in') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
