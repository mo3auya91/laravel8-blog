<x-jet-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <x-jet-label value="Team Owner"/>

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full" src="{{ $team->owner->profile_photo_url }}"
                     alt="{{ $team->owner->name }}">

                <div class="ml-4 leading-tight">
                    <div>{{ $team->owner->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        @foreach(LOCALS() as $key => $locale)
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name[{{$key}}]" value="{{ __('app.team_name') . ' (' . $key . ')' }}"/>

                <x-jet-input id="name[{{$key}}]"
                             name="name[{{$key}}]"
                             type="text"
                             class="mt-1 block w-full"
                              wire:model.defer="state.name.{{$key}}"
{{--                             wire:model.defer="{{$team->getTranslation('name',$key)}}"--}}
{{--                             wire:model.defer="team.name"--}}
                              value="{{$team->getTranslation('name',$key)}}"
                             :disabled="! Gate::check('update', $team)"/>

                <x-jet-input-error for="name[{{$key}}]" class="mt-2"/>
            </div>
        @endforeach
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>
