<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
        <div class="flex justify-between items-center mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Edit Service Time</h1>

            <a href="{{ route('service-time.index') }}" class="hover:text-white sm:hidden"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('service-time.update', [$service_time]) }}" method="POST" class="mx-6 my-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label for="waiting_time_pilot" :value="__('Waiting Time Pilot')" />
                <x-input id="waiting_time_pilot" name="waiting_time_pilot" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="waiting_time_pilot" value="{{ $service_time->waiting_time_pilot }}" />
                <x-input-error for="waiting_time_pilot" />
            </div>

            <div class="mb-4">
                <x-label for="waiting_time_dermaga" :value="__('Waiting Time Dermaga')" />
                <x-input id="waiting_time_dermaga" name="waiting_time_dermaga" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="waiting_time_dermaga" value="{{ $service_time->waiting_time_dermaga }}" />
                <x-input-error for="waiting_time_dermaga" />
            </div>

            <div class="mb-4">
                <x-label for="wt_gross" :value="__('Waiting Time Gross')" />
                <x-input id="wt_gross" name="wt_gross" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="wt_gross" value="{{ $service_time->wt_gross }}" />
                <x-input-error for="wt_gross" />
            </div>

            <div class="mb-4">
                <x-label for="postpone_time" :value="__('Postpone Time')" />
                <x-input id="postpone_time" name="postpone_time" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="postpone_time" value="{{ $service_time->postpone_time }}" />
                <x-input-error for="postpone_time" />
            </div>

            <div class="mb-4">
                <x-label for="approach_time" :value="__('Approach Time')" />
                <x-input id="approach_time" name="approach_time" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="approach_time" value="{{ $service_time->approach_time }}" />
                <x-input-error for="approach_time" />
            </div>
            
            <div class="mb-4">
                <x-label for="created_at" :value="__('Tanggal')" />
                <x-input id="created_at" name="created_at" type="date" class="block w-full mt-3" wire:model.defer="created_at"
                    placeholder="" />
                <x-input-error for="created_at" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
