<?php

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\{Layout, Validate};

new
#[Layout('layouts.app-sidebar')]
class extends Component
{
    public string $name = '';
    public string $email = '';

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfile(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        Auth::user()->update($validated);

        $this->dispatch('profile-updated');
    }

    public function updatePassword(): void
    {
        $validated = $this->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ]);

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'The provided password does not match your current password.',
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset(['current_password', 'password', 'password_confirmation']);
        $this->dispatch('password-updated');
    }

    public function deleteAccount(): void
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/');
    }
};
?>

<div class="p-6 lg:p-8 max-w-4xl">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white">Profile Settings</h1>
        <p class="text-gray-400 mt-1">Manage your account settings and preferences</p>
    </div>

    <!-- Profile Information -->
    <div class="backdrop-blur-xl bg-white/5 rounded-2xl p-6 ring-1 ring-white/10 mb-6">
        <h2 class="text-lg font-semibold text-white mb-1">Profile Information</h2>
        <p class="text-sm text-gray-400 mb-6">Update your account's profile information and email address.</p>

        <form wire:submit="updateProfile" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                <input
                    wire:model="name"
                    id="name"
                    type="text"
                    class="block w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                />
                @error('name')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input
                    wire:model="email"
                    id="email"
                    type="email"
                    class="block w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                />
                @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-teal-600 hover:from-blue-500 hover:to-teal-500 transition-all shadow-lg shadow-blue-500/25"
                >
                    <svg wire:loading wire:target="updateProfile" class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Save Changes
                </button>

                <div
                    x-data="{ show: false }"
                    x-on:profile-updated.window="show = true; setTimeout(() => show = false, 2000)"
                    x-show="show"
                    x-transition
                    class="text-sm text-green-400"
                >
                    Saved!
                </div>
            </div>
        </form>
    </div>

    <!-- Update Password -->
    <div class="backdrop-blur-xl bg-white/5 rounded-2xl p-6 ring-1 ring-white/10 mb-6">
        <h2 class="text-lg font-semibold text-white mb-1">Update Password</h2>
        <p class="text-sm text-gray-400 mb-6">Ensure your account is using a long, random password to stay secure.</p>

        <form wire:submit="updatePassword" class="space-y-4">
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Current Password</label>
                <input
                    wire:model="current_password"
                    id="current_password"
                    type="password"
                    class="block w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                />
                @error('current_password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">New Password</label>
                <input
                    wire:model="password"
                    id="password"
                    type="password"
                    class="block w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                />
                @error('password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                <input
                    wire:model="password_confirmation"
                    id="password_confirmation"
                    type="password"
                    class="block w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                />
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-teal-600 hover:from-blue-500 hover:to-teal-500 transition-all shadow-lg shadow-blue-500/25"
                >
                    <svg wire:loading wire:target="updatePassword" class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Update Password
                </button>

                <div
                    x-data="{ show: false }"
                    x-on:password-updated.window="show = true; setTimeout(() => show = false, 2000)"
                    x-show="show"
                    x-transition
                    class="text-sm text-green-400"
                >
                    Password updated!
                </div>
            </div>
        </form>
    </div>

    <!-- Delete Account -->
    <div class="backdrop-blur-xl bg-white/5 rounded-2xl p-6 ring-1 ring-red-500/20">
        <h2 class="text-lg font-semibold text-white mb-1">Delete Account</h2>
        <p class="text-sm text-gray-400 mb-6">Once your account is deleted, all of its resources and data will be permanently deleted.</p>

        <div x-data="{ confirmDelete: false }">
            <button
                x-show="!confirmDelete"
                @click="confirmDelete = true"
                type="button"
                class="px-4 py-2.5 rounded-xl text-sm font-semibold text-red-400 bg-red-500/10 hover:bg-red-500/20 ring-1 ring-red-500/20 transition-all"
            >
                Delete Account
            </button>

            <div x-show="confirmDelete" x-transition class="flex items-center gap-3">
                <span class="text-sm text-gray-400">Are you sure?</span>
                <button
                    wire:click="deleteAccount"
                    type="button"
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-red-600 hover:bg-red-500 transition-all"
                >
                    Yes, delete my account
                </button>
                <button
                    @click="confirmDelete = false"
                    type="button"
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-400 bg-white/5 hover:bg-white/10 transition-all"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
