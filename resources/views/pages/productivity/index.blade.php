<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productivity') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex justify-between mt-4 mb-8 mx-6">
            <h1 class="font-bold text-3xl">Productivity</h1>

            <a href="{{ route('productivity.create') }}"
                class="py-2 px-4 rounded-lg bg-[#88AB8E] dark:bg-blue-700 text-slate-800 hover:bg-[#AFC8AD] dark:hover:bg-blue-800">Create
                Productivity</a>
        </div>

        <div class="overflow-x-auto my-4 mx-6 rounded-md">

            <table class="table table-xs text-center even:bg-slate-500">
                <thead class="bg-[#EEE7DA] dark:bg-base-300 text-slate-700 dark:text-slate-400 uppercase">
                    <tr class="border-slate-600 ">
                        <th rowspan="2">No.</th>
                        <th rowspan="2">General Cargo</th>
                        <th rowspan="2">Bag Cargo</th>
                        <th rowspan="2">Unitized</th>
                        <th colspan="2">Curah Cair</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th class="border-x border-slate-600">Truck Lossing</th>
                        <th class="border-x border-slate-600">Pipa Lossing</th>
                    </tr>
                </thead>
                <tbody class="capitalize">
                    @forelse ($productivities as $productivity)
                        <tr class="border-slate-600 hover">
                            <th>{{ $productivities->firstItem() + $loop->index }}</th>
                            <td>{{ $productivity->general_cargo }}</td>
                            <td>{{ $productivity->bag_cargo }}</td>
                            <td>{{ $productivity->unitized }}</td>
                            <td>{{ $productivity->truck_lossing }}</td>
                            <td>{{ $productivity->pipa_lossing }}</td>
                            <td class="flex justify-center gap-2">
                                <a href="{{ route('productivity.edit', [$productivity]) }}"
                                    class="hover:text-yellow-600">
                                    <i class="fa-regular fa-pen-to-square w-6 h-6"></i>
                                </a>
                                <form action="{{ route('productivity.destroy', [$productivity]) }}" method="POST"
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
                {{ $productivities->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
