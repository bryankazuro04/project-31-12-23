<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <h1 class="font-bold text-3xl mt-4 mb-8 mx-6">Edit Service Time</h1>

        <form action="{{ route('service-time.update', [$service_time]) }}" method="POST" class="mx-6 my-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label for="waiting_time" :value="__('Waiting Time')" />
                <x-input id="waiting_time" name="waiting_time" type="text" class="block w-full mt-3"
                    wire:model.defer="waiting_time" value="{{ $service_time->waiting_time }}" />
                <x-input-error for="waiting_time" />
            </div>

            <div class="mb-4">
                <x-label for="wt_gross" :value="__('Waiting Time Gross')" />
                <x-input id="wt_gross" name="wt_gross" type="text" class="block w-full mt-3"
                    wire:model.defer="wt_gross" value="{{ $service_time->wt_gross }}" />
                <x-input-error for="wt_gross" />
            </div>

            <div class="mb-4">
                <x-label for="postpone_time" :value="__('Postpone Time')" />
                <x-input id="postpone_time" name="postpone_time" type="text" class="block w-full mt-3"
                    wire:model.defer="postpone_time" value="{{ $service_time->postpone_time }}" />
                <x-input-error for="postpone_time" />
            </div>

            <div class="mb-4">
                <x-label for="approach_time" :value="__('Approach Time')" />
                <x-input id="approach_time" name="approach_time" type="text" class="block w-full mt-3"
                    wire:model.defer="approach_time" value="{{ $service_time->approach_time }}" />
                <x-input-error for="approach_time" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
