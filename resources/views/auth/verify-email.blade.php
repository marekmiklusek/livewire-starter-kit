<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Verify Email - {{ config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-neutral-950">
        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
            <!-- Animated background -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
            </div>

            <div class="relative z-10 max-w-md w-full">
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-6">
                        <div class="w-16 h-16 bg-neutral-800 rounded-2xl flex items-center justify-center border border-neutral-700">
                            <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white">
                        Verify your email
                    </h2>
                </div>

                <div class="bg-neutral-900 p-8 rounded-2xl border border-neutral-800">
                    <p class="text-neutral-300 text-center mb-6">
                        Thanks for signing up! Before getting started, please verify your email address by clicking the link we just sent to you.
                    </p>

                    @if (session('message'))
                        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm text-center">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}" class="space-y-4">
                        @csrf
                        <button
                            type="submit"
                            class="w-full flex justify-center items-center py-3 px-4 rounded-xl text-sm font-semibold text-white bg-amber-600 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-neutral-900 focus:ring-amber-500 transition-all duration-200 hover:scale-[1.02]"
                        >
                            Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button
                            type="submit"
                            class="w-full flex justify-center items-center py-3 px-4 rounded-xl text-sm font-medium text-neutral-400 bg-neutral-800 hover:bg-neutral-700 border border-neutral-700 hover:text-white transition-all"
                        >
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
