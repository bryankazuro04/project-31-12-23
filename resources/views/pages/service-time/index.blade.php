<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Service Time') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg" x-data="{ selectedMonth: '' }">
        {{-- Title --}}
        <div class="flex justify-between mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Service Time</h1>

            <a href="{{ route('service-time.create') }}"
                class="py-2 px-4 rounded-lg bg-[#88AB8E] dark:bg-blue-700 text-slate-800 hover:bg-[#AFC8AD] dark:hover:bg-blue-800">Create
                Service Time</a>
        </div>

        {{-- Filter --}}
        <div class="my-4 mx-6">
            <label for="filteredMonth">Filter by Month:</label>
            <select id="filteredMonth" x-model="selectedMonth" class="rounded-lg dark:bg-slate-800 dark:text-slate-400 ml-2">
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
        
        {{-- Data Table --}}
        <div class="overflow-x-auto my-4 mx-6 rounded-md">

            <table class="table table-xs text-center even:bg-slate-500">
                <thead class="bg-[#EEE7DA] dark:bg-base-300 text-slate-700 dark:text-slate-400 uppercase">
                    <tr class="border-slate-600 ">
                        <th rowspan="2">No.</th>
                        <th colspan="2">Waiting Time</th>
                        <th rowspan="2">Waiting Time Gross</th>
                        <th rowspan="2">Postpone Time</th>
                        <th rowspan="2">Approach Time</th>
                        <th rowspan="2">Tanggal</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th>Pilot</th>
                        <th>Dermaga</th>
                    </tr>
                </thead>
                <tbody class="capitalize">
                    @forelse ($service_times as $service_time)
                        <tr class="border-slate-600 hover" x-show="(selectedMonth === '' || parseInt(selectedMonth) === {{ Carbon\Carbon::parse($service_time->tanggal)->format('m') }})">
                            <th>{{ $service_times->firstItem() + $loop->index }}</th>
                            <td>{{ $service_time->waiting_time_pilot }}</td>
                            <td>{{ $service_time->waiting_time_dermaga }}</td>
                            <td>{{ $service_time->wt_gross }}</td>
                            <td>{{ $service_time->postpone_time }}</td>
                            <td>{{ $service_time->approach_time }}</td>
                            <td>{{ Carbon\Carbon::parse($service_time->tanggal)->format('d-m-Y') }}</td>
                            <td class="flex justify-center gap-2">
                                <a href="{{ route('service-time.edit', [$service_time]) }}"
                                    class="hover:text-yellow-600">
                                    <i class="fa-regular fa-pen-to-square w-6 h-6"></i>
                                </a>
                                <form action="{{ route('service-time.destroy', [$service_time]) }}" method="POST"
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
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-5">
                {{ $service_times->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
