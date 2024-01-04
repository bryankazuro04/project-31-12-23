<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <h1 class="font-bold text-3xl mt-4 mb-8 mx-6">Edit Traffic</h1>

        <form action="{{ route('traffic.update', [$traffic]) }}" method="POST" class="mx-6 my-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label for="kunjungan_kapal" :value="__('Kunjungan Kapal')" />
                <x-input id="kunjungan_kapal" name="kunjungan_kapal" type="text" class="block w-full mt-3"
                    wire:model.defer="kunjungan_kapal" value="{{ $traffic->kunjungan_kapal }}" />
                <x-input-error for="kunjungan_kapal" />
            </div>

            <div class="mb-4">
                <x-label for="jumlah_bongkar_muat" :value="__('Jumlah Bongkar Muat')" />
                <x-input id="jumlah_bongkar_muat" name="jumlah_bongkar_muat" type="text" class="block w-full mt-3"
                    wire:model.defer="jumlah_bongkar_muat" value="{{ $traffic->jumlah_bongkar_muat }}" />
                <x-input-error for="jumlah_bongkar_muat" />
            </div>

            <div class="mb-4">
                <x-label for="grt" :value="__('GRT')" />
                <x-input id="grt" name="grt" type="text" class="block w-full mt-3" wire:model.defer="grt"
                    value="{{ $traffic->grt }}" />
                <x-input-error for="grt" />
            </div>

            <div class="mb-4">
                <x-label for="loa" :value="__('Rata-rata LOA')" />
                <x-input id="loa" name="loa" type="text" class="block w-full mt-3" wire:model.defer="loa"
                    value="{{ $traffic->loa }}" />
                <x-input-error for="loa" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
