<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Traffic') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex justify-between mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Traffic</h1>

            <a href="{{ route('traffic.create') }}"
                class="py-2 px-4 rounded-lg bg-[#88AB8E] dark:bg-blue-700 text-slate-800 hover:bg-[#AFC8AD] dark:hover:bg-blue-800">Create
                Traffic</a>
        </div>

        <div class="overflow-x-auto my-4 mx-6 rounded-md">

            <table class="table table-xs text-center">
                <thead class="bg-[#EEE7DA] dark:bg-base-300 text-slate-700 dark:text-slate-400 uppercase">
                    <tr class="border-slate-600 ">
                        <th>No.</th>
                        <th>Kunjungan Kapal</th>
                        <th>Jumlah Bongkar Muat</th>
                        <th>GRT</th>
                        <th>Rata-rata LOA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="capitalize">
                    @forelse ($traffics as $traffic)
                        <tr class="border-slate-600 hover">
                            <th>{{ $traffics->firstItem() + $loop->index }}</th>
                            <td>{{ $traffic->kunjungan_kapal }}</td>
                            <td>{{ $traffic->jumlah_bongkar_muat }}</td>
                            <td>{{ $traffic->grt }}</td>
                            <td>{{ $traffic->loa }}</td>
                            <td class="flex justify-center gap-2">
                                <a href="{{ route('traffic.edit', [$traffic]) }}" class="hover:text-yellow-600">
                                    <i class="fa-regular fa-pen-to-square w-6 h-6"></i>
                                </a>
                                <form action="{{ route('traffic.destroy', [$traffic]) }}" method="post"
                                    class="hover:text-red-700">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data kapal?')">
                                        <i class="fa-regular fa-trash-can w-6 h-6"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-5">
                {{ $traffics->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
