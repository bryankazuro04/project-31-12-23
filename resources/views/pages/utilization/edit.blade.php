<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
        <div class="flex justify-between items-center mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Edit Utilization</h1>
    
            <a href="{{ route('utilization.index') }}" class="hover:text-white sm:hidden"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('utilization.update', [$utilization]) }}" method="POST" class="mx-6 my-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label for="bor" :value="__('Berth Occupancy Ratio')" />
                <x-input id="bor" name="bor" type="number" class="block w-full mt-3" wire:model.defer="bor"
                    value="{{ $utilization->bor }}" />
                <x-input-error for="bor" />
            </div>

            <div class="mb-4">
                <x-label for="btp" :value="__('Berth Through Put')" />
                <x-input id="btp" name="btp" type="number" class="block w-full mt-3" wire:model.defer="btp"
                    value="{{ $utilization->btp }}" />
                <x-input-error for="btp" />
            </div>

            <div class="mb-4">
                <x-label for="yor" :value="__('Yard Occupancy Ratio')" />
                <x-input id="yor" name="yor" type="number" class="block w-full mt-3" wire:model.defer="yor"
                    value="{{ $utilization->yor }}" />
                <x-input-error for="yor" />
            </div>

            <div class="mb-4">
                <x-label for="ytp" :value="__('Yard Through Put')" />
                <x-input id="ytp" name="ytp" type="number" class="block w-full mt-3" wire:model.defer="ytp"
                    value="{{ $utilization->ytp }}" />
                <x-input-error for="ytp" />
            </div>

            <div class="mb-4">
                <x-label for="sor" :value="__('Shed Occupancy Ratio')" />
                <x-input id="sor" name="sor" type="number" class="block w-full mt-3" wire:model.defer="sor"
                    value="{{ $utilization->sor }}" />
                <x-input-error for="sor" />
            </div>

            <div class="mb-4">
                <x-label for="stp" :value="__('Shed Through Put')" />
                <x-input id="stp" name="stp" type="number" class="block w-full mt-3" wire:model.defer="stp"
                    value="{{ $utilization->stp }}" />
                <x-input-error for="stp" />
            </div>

            
            <div class="mb-4">
                <x-label for="tanggal" :value="__('Tanggal')" />
                <x-input id="tanggal" name="tanggal" type="date" class="block w-full mt-3" wire:model.defer="tanggal"
                    placeholder="" />
                <x-input-error for="tanggal" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
