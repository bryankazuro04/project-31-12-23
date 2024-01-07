<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
        <div class="flex justify-between items-center mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Edit Productivity</h1>

            <a href="{{ route('productivity.index') }}" class="hover:text-white sm:hidden"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('productivity.update', [$productivity]) }}" method="POST" class="mx-6 my-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label for="general_cargo" :value="__('General Cargo')" />
                <x-input id="general_cargo" name="general_cargo" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="general_cargo" value="{{ $productivity->general_cargo }}" />
                <x-input-error for="general_cargo" />
            </div>

            <div class="mb-4">
                <x-label for="bag_cargo" :value="__('Bag Cargo')" />
                <x-input id="bag_cargo" name="bag_cargo" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="bag_cargo" value="{{ $productivity->bag_cargo }}" />
                <x-input-error for="bag_cargo" />
            </div>

            <div class="mb-4">
                <x-label for="unitized" :value="__('Unitized')" />
                <x-input id="unitized" name="unitized" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="unitized" value="{{ $productivity->unitized }}" />
                <x-input-error for="unitized" />
            </div>

            <div class="mb-4">
                <x-label for="truck_lossing" :value="__('Truck Lossing')" />
                <x-input id="truck_lossing" name="truck_lossing" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="truck_lossing" value="{{ $productivity->truck_lossing }}" />
                <x-input-error for="truck_lossing" />
            </div>

            <div class="mb-4">
                <x-label for="pipa_lossing" :value="__('Pipa Lossing')" />
                <x-input id="pipa_lossing" name="pipa_lossing" type="number" step="0.01" class="block w-full mt-3"
                    wire:model.defer="pipa_lossing" value="{{ $productivity->pipa_lossing }}" />
                <x-input-error for="pipa_lossing" />
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
