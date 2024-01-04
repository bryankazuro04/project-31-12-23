<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
        <h1 class="font-bold text-3xl mt-4 mb-8 mx-6">Tambah Service Time</h1>

        <form action="{{ route('service-time.store') }}" method="POST" class="mx-6 my-4">
            @csrf

            <div class="mb-4">
                <x-label for="waiting_time" :value="__('Waiting Time')" />
                <x-input id="waiting_time" name="waiting_time" type="text" class="block w-full mt-3"
                    wire:model.defer="waiting_time" />
                <x-input-error for="waiting_time" />
            </div>

            <div class="mb-4">
                <x-label for="wt_gross" :value="__('Waiting Time Gross')" />
                <x-input id="wt_gross" name="wt_gross" type="text" class="block w-full mt-3"
                    wire:model.defer="wt_gross" />
                <x-input-error for="wt_gross" />
            </div>

            <div class="mb-4">
                <x-label for="postpone_time" :value="__('Postpone Time')" />
                <x-input id="postpone_time" name="postpone_time" type="text" class="block w-full mt-3"
                    wire:model.defer="postpone_time" />
                <x-input-error for="postpone_time" />
            </div>

            <div class="mb-4">
                <x-label for="approach_time" :value="__('Approach Time')" />
                <x-input id="approach_time" name="approach_time" type="text" class="block w-full mt-3"
                    wire:model.defer="approach_time" />
                <x-input-error for="approach_time" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
