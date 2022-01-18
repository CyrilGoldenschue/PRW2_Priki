<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>
        <form method="POST" action="{{ route('references.store') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="description" value="Description"/>

                <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                         :value="old('description')" required autofocus minlength="10"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="url" value="URL"/>

                <x-input id="url" class="block mt-1 w-full"
                         type="url"
                         pattern="https?://.+"
                         name="url"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    Ajouter
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
