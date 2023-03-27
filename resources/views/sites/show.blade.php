<x-app-layout>
    <x-slot name="header">
        {{ __('sites.show.domaine') }}
    </x-slot>
    <div class="p-6">
        <p>{{ $site->domaine }}</p>
    </div>
</x-app-layout>
