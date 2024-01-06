<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Utilization') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg" x-data="{ selectedMonth: '' }">
        {{-- Title --}}
        <div class="flex justify-between mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Utilization</h1>

            <a href="{{ route('utilization.create') }}"
                class="py-2 px-4 rounded-lg bg-[#88AB8E] dark:bg-blue-700 text-slate-800 hover:bg-[#AFC8AD] dark:hover:bg-blue-800">Create
                Utilization</a>
        </div>

        {{-- Filter --}}
        <div class="my-4 mx-6">
            <label for="filteredMonth">Filter by Month:</label>
            <select name="" id="filteredMonth" x-model="selectedMonth" class="rounded-lg dark:bg-slate-800 dark:text-slate-400 ml-2">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                <option value="" selected disabled>{{ "-" }}</option>
            </select>
        </div>
        
        {{-- Data table --}}
        <div class="overflow-x-auto my-4 mx-6 rounded-md">

            <table class="table table-xs text-center even:bg-slate-500">
                <thead class="bg-[#EEE7DA] dark:bg-base-300 text-slate-700 dark:text-slate-400 uppercase">
                    <tr class="border-slate-600 ">
                        <th rowspan="2">No.</th>
                        <th colspan="2">Dermaga</th>
                        <th colspan="2">Lapangan Penumpukan</th>
                        <th colspan="2">Gudang Penumpukan</th>
                        <th rowspan="2">Tanggal</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th><abbr title="Berth Occupancy Ratio">BOR</abbr></th>
                        <th><abbr title="Berth Through Put">BTP</abbr></th>
                        <th><abbr title="Yard Occupancy Ratio">YOR</abbr></th>
                        <th><abbr title="Yard Through Put">YTP</abbr></th>
                        <th><abbr title="Shed Occupancy Ratio">SOR</abbr></th>
                        <th><abbr title="Shed Through Put">STP</abbr></th>
                    </tr>
                </thead>
                <tbody class="capitalize">
                    @forelse ($utilization as $utility)
                        <tr class="border-slate-600 hover" x-show="(selectedMonth === '' || parseInt(selectedMonth) === {{ $utility->created_at->format('m') }})">
                            <th>{{ $utilization->firstItem() + $loop->index }}</th>
                            <td>{{ $utility->bor }}</td>
                            <td>{{ $utility->btp }}</td>
                            <td>{{ $utility->yor }}</td>
                            <td>{{ $utility->ytp }}</td>
                            <td>{{ $utility->sor }}</td>
                            <td>{{ $utility->stp }}</td>
                            <td>{{ $utility->created_at->format('d-m-Y') }}</td>
                            <td class="flex justify-center gap-2">
                                <a href="{{ route('utilization.edit', [$utility]) }}" class="hover:text-yellow-600">
                                    <i class="fa-regular fa-pen-to-square w-6 h-6"></i>
                                </a>
                                <form action="{{ route('utilization.destroy', [$utility]) }}" method="POST"
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
                            <td colspan="9" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-5">
                {{ $utilization->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
