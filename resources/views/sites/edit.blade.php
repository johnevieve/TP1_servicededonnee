<x-app-layout>
    <x-slot name="header">
        {{ __('sites.edit.domaine') }}
    </x-slot>
    <x-content>
        <form method="POST" action="{{ route('sites.update', $site->id) }}" class="mt-6 space-y-6">
            @method('PUT')
            @csrf
            <div>
                <x-input-label for="domaine" :value="__('sites.edit.domaineSite')"/>
                <x-text-input id="domaine" name="domaine" type="text" class="mt-1 block w-full"
                              :value="old('domaine', $site->domaine)" required/>
                <x-input-error :messages="$errors->get('titre')" class="mt-2"/>
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('sites.edit.enregistrer') }}</x-primary-button>
                @if (session('status') === 'site-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('sites.edit.enregistree') }}
                    </p>
                @endif
            </div>
        </form>
    </x-content>
</x-app-layout>
