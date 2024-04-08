<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(auth()->user() && auth()->user()->hasRole('admin'))
                        <a href="{{ route('roles.index') }}" class="p-6 text-gray-900 block text-center">
                            {{ __('Roles') }}
                        </a>
                    @endif
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(auth()->user() && auth()->user()->hasRole('admin'))
                        <a href="{{ route('user.index') }}" class="p-6 text-gray-900 block text-center">
                            {{ __('User') }}
                        </a>
                    @endif
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('recipes.index') }}" class="p-6 text-gray-900 block text-center">
                        {{ __('Recipes') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
