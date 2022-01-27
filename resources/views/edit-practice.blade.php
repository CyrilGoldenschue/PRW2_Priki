<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>
        <form method="POST" action="{{ route('practice.update') }}">
        @csrf
            <input type="hidden" value="{{ $practice->id }}" name="practice_id">
        <!-- Email Address -->
            <div>
                <x-label for="title" value="Titre"/>

                <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                         value="{{ $practice->title }}" required autofocus minlength="3" maxlenght="40"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="reason" value="Raison"/>

                <x-input id="reason" class="block mt-1 w-full"
                         type="text"
                         name="reason"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    Modifier
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
