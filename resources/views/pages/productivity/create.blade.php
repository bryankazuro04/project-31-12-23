<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
        <div class="flex justify-between items-center mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Tambah Productivity</h1>

            <a href="{{ route('productivity.index') }}" class="hover:text-white sm:hidden"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('productivity.store') }}" method="POST" class="mx-6 my-4">
            @csrf

            <div class="mb-4">
                <x-label for="general_cargo" :value="__('General Cargo')" />
                <x-input id="general_cargo" name="general_cargo" type="text" class="block w-full mt-3"
                    wire:model.defer="general_cargo" />
                <x-input-error for="general_cargo" />
            </div>

            <div class="mb-4">
                <x-label for="bag_cargo" :value="__('Bag Cargo')" />
                <x-input id="bag_cargo" name="bag_cargo" type="text" class="block w-full mt-3"
                    wire:model.defer="bag_cargo" />
                <x-input-error for="bag_cargo" />
            </div>

            <div class="mb-4">
                <x-label for="unitized" :value="__('Unitized')" />
                <x-input id="unitized" name="unitized" type="text" class="block w-full mt-3"
                    wire:model.defer="unitized" />
                <x-input-error for="unitized" />
            </div>

            <div class="mb-4">
                <x-label for="truck_lossing" :value="__('Truck Lossing')" />
                <x-input id="truck_lossing" name="truck_lossing" type="text" class="block w-full mt-3"
                    wire:model.defer="truck_lossing" />
                <x-input-error for="truck_lossing" />
            </div>

            <div class="mb-4">
                <x-label for="pipa_lossing" :value="__('Pipa Lossing')" />
                <x-input id="pipa_lossing" name="pipa_lossing" type="text" class="block w-full mt-3"
                    wire:model.defer="pipa_lossing" />
                <x-input-error for="pipa_lossing" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
