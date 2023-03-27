<x-app-layout>
    <x-slot name="header">
        {{ __('sites.index') }}
    </x-slot>
    <div class="p-6">
        @foreach($sites as $site)
            <p>{{ $site->domaine }}</p>
        @endforeach
    </div>
</x-app-layout>
