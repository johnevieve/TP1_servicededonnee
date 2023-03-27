<x-app-layout>
    <x-slot name="header">
        {{ __('sites.create.domaine') }}
    </x-slot>
    <div class="p-6">
        <form method="POST" action="{{ route('sites.store') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="domaine" :value="__('sites.create.domaineSite')"/>
                <x-text-input id="domaine" name="domaine" type="text" class="mt-1 block w-full" :value="old('domaine')"
                              required/>
                <x-input-error :messages="$errors->get('domaine')" class="mt-2"/>
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('sites.create.enregistrer') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
