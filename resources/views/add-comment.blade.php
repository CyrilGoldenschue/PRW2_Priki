<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>
        <form method="POST" action="{{ route('opinion.store') }}">
        @csrf

        <!-- Comment -->
            <div>
                <x-label for="comment" value="{{__('auth.Comment')}}"/>

                <textarea id="comment" class="block mt-1 w-full" name="comment"
                         :value="old('comment')" required autofocus maxlength="1000">
                </textarea>

            </div>

            <!-- Points -->
            <div class="mt-4">
                <x-input type="radio" name="points" id="points_like" value="1"/>
                <x-label for="points_like">{{ __('auth.Like') }}</x-label>

                <x-input type="radio" name="points" id="points_nolike" value="0"/>
                <x-label for="points_nolike">{{ __('auth.Nolike') }}</x-label>

                <x-input type="radio" name="points" id="points_dislike" value="-1"/>
                <x-label for="points_dislike">{{ __('auth.Dislike') }}</x-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    Ajouter
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
