<?php

use Livewire\Component;
use Livewire\Attributes\{Layout};

new
#[Layout('layouts.app-sidebar')]
class extends Component
{
    //
};
?>

<div class="p-6 lg:p-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white">Dashboard</h1>
        <p class="text-gray-400 mt-1">Welcome back, {{ auth()->user()->name }}!</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-neutral-900 rounded-2xl p-6 border border-neutral-800 hover:border-neutral-700 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-neutral-800 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m9 5.197v1" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-400 bg-green-500/10 px-2 py-1 rounded-full">+12%</span>
            </div>
            <p class="text-2xl font-bold text-white">1,234</p>
            <p class="text-sm text-neutral-500">Total Users</p>
        </div>

        <div class="bg-neutral-900 rounded-2xl p-6 border border-neutral-800 hover:border-neutral-700 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-neutral-800 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-400 bg-green-500/10 px-2 py-1 rounded-full">+8%</span>
            </div>
            <p class="text-2xl font-bold text-white">$12,543</p>
            <p class="text-sm text-neutral-500">Revenue</p>
        </div>

        <div class="bg-neutral-900 rounded-2xl p-6 border border-neutral-800 hover:border-neutral-700 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-neutral-800 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-400 bg-green-500/10 px-2 py-1 rounded-full">+23%</span>
            </div>
            <p class="text-2xl font-bold text-white">98.5%</p>
            <p class="text-sm text-neutral-500">Success Rate</p>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-neutral-900 rounded-2xl p-6 border border-neutral-800">
        <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
        <div class="space-y-4">
            <div class="flex items-center gap-4 p-3 rounded-xl bg-neutral-800/50">
                <div class="w-10 h-10 rounded-full bg-neutral-800 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-white">Account created successfully</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-3 rounded-xl bg-neutral-800/50">
                <div class="w-10 h-10 rounded-full bg-neutral-800 flex items-center justify-center">
                    <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-white">Logged in</p>
                    <p class="text-xs text-neutral-500">Just now</p>
                </div>
            </div>
        </div>
    </div>
</div>
