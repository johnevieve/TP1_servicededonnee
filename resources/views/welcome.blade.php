<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('welcome.welcome') }}
        </h2>
    </x-slot>
    <div class="p-6">
        <div>
            <form method="POST" action="{{ route('search') }}" class="mt-6 space-y-6">
                @csrf
                <x-input-label for="url" :value="__('welcome.label')"/>
                <x-text-input id="url" name="url" class="mt-1 block w-full" type="text" value="{{ $url ?? '' }}"
                              pattern="^(https?\/\/)?(www\\.)?[a-Z0-9-\\.]+\\.[a-z]{2,3}(\\S+)+$" required/>
                <x-primary-button>{{ __('welcome.search') }}</x-primary-button>
            </form>
        </div>
        @if(isset($url))
            <form method="GET" action="{{ route('sites.create', ['url' => 'patate']) }}">
                <x-primary-button>{{ __('welcome.create') }}</x-primary-button>
            </form>
        @endif

        @if(isset($liste))
            <div class="py-6">
                @foreach($liste as $site)
                    <div class="py-6">
                        <h2 class="text-xl">{{ $site->domaine }}</h2>
                        <p>{{ $site->description }}</p>
                        <p>{{ $site->nbVotes }} {{ __('welcome.vote') }} |
                            {{ $site->nbCommentaires }} {{ __('welcome.comment') }}</p>
                        <p>{{ __('welcome.user') }} {{ $site->user->name ?? 'Anonyme' }},
                            {{ __('welcome.date') }} {{ $site->created_at->isoFormat('LLLL') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
