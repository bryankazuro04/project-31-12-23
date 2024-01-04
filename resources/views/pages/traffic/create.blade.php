<x-app-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
        <div class="flex justify-between items-center mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Tambah Traffic</h1>

            <a href="{{ route('traffic.index') }}" class="hover:text-white sm:hidden"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('traffic.store') }}" method="POST" class="mx-6 my-4">
            @csrf

            <div class="mb-4">
                <x-label for="kunjungan_kapal" :value="__('Kunjungan Kapal')" />
                <x-input id="kunjungan_kapal" name="kunjungan_kapal" type="text" class="block w-full mt-3"
                    wire:model.defer="kunjungan_kapal" placeholder="" />
                <x-input-error for="kunjungan_kapal" />
            </div>

            <div class="mb-4">
                <x-label for="jumlah_bongkar_muat" :value="__('Jumlah Bongkar Muat')" />
                <x-input id="jumlah_bongkar_muat" name="jumlah_bongkar_muat" type="text" class="block w-full mt-3"
                    wire:model.defer="jumlah_bongkar_muat" placeholder="" />
                <x-input-error for="jumlah_bongkar_muat" />
            </div>

            <div class="mb-4">
                <x-label for="grt" :value="__('GRT')" />
                <x-input id="grt" name="grt" type="text" class="block w-full mt-3" wire:model.defer="grt"
                    placeholder="" />
                <x-input-error for="grt" />
            </div>

            <div class="mb-4">
                <x-label for="loa" :value="__('Rata-rata LOA')" />
                <x-input id="loa" name="loa" type="text" class="block w-full mt-3" wire:model.defer="loa"
                    placeholder="" />
                <x-input-error for="loa" />
            </div>

            <x-button>{{ __('Submit') }}</x-button>
        </form>
    </div>
</x-app-layout>
