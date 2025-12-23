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
        <h1 class="text-2xl font-bold text-white">Sample Page</h1>
        <p class="text-gray-400 mt-1">This is an example page to demonstrate the sidebar layout</p>
    </div>

    <!-- Content Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="backdrop-blur-xl bg-white/5 rounded-2xl p-6 ring-1 ring-white/10">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-linear-br from-blue-500 to-teal-500 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white">Feature One</h3>
            </div>
            <p class="text-gray-400">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </div>

        <div class="backdrop-blur-xl bg-white/5 rounded-2xl p-6 ring-1 ring-white/10">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-linear-br from-cyan-500 to-blue-500 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white">Feature Two</h3>
            </div>
            <p class="text-gray-400">
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>

    <!-- Table Example -->
    <div class="backdrop-blur-xl bg-white/5 rounded-2xl ring-1 ring-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/5">
            <h3 class="text-lg font-semibold text-white">Sample Data</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/5">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Name</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Date</th>
                        <th class="text-right px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-linear-br from-blue-500 to-teal-500 flex items-center justify-center text-white text-xs font-semibold">J</div>
                                <span class="text-sm text-white">John Doe</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-400">Dec 23, 2025</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-sm text-blue-400 hover:text-blue-300 transition-colors">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-linear-br from-cyan-500 to-blue-500 flex items-center justify-center text-white text-xs font-semibold">A</div>
                                <span class="text-sm text-white">Alice Smith</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">Pending</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-400">Dec 22, 2025</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-sm text-blue-400 hover:text-blue-300 transition-colors">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-linear-br from-amber-500 to-orange-500 flex items-center justify-center text-white text-xs font-semibold">B</div>
                                <span class="text-sm text-white">Bob Wilson</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-400">Inactive</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-400">Dec 21, 2025</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-sm text-blue-400 hover:text-blue-300 transition-colors">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
