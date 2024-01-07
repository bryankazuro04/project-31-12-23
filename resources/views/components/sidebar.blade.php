<aside class="w-3/12 px-4 transition-all duration-200 hidden sm:block" x-data="{ sidebarFull: false }"
    :class="{ 'w-3/12': sidebarFull, 'w-28': !sidebarFull }" x-init="sidebarFull = localStorage.getItem('sidebarFull') === 'true'"
    x-on:resize.window="if (window.innerWidth > 1024) { sidebarFull = true }">
    <div class="bg-white  dark:bg-gray-800 text-gray-900 p-5 dark:text-white rounded-lg flex flex-col gap-2 h-[calc(100vh-7rem)] transition-all duration-200 "
        :class="{ 'items-center': !sidebarFull }">
        <x-side-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <i class="fa-solid fa-gauge py-3 w-10"></i>
            <span
                :class="{ 'absolute left-full ml-3 px-3 py-1 rounded-md bg-white border': !sidebarFull }">{{ __('Dashboard') }}</span>
        </x-side-link>

        <x-side-link href="{{ route('traffic.index') }}" :active="in_array(Request::segment(2), ['traffic'])">
            <i class="fa-solid fa-traffic-light py-3 w-10"></i>
            <span
                :class="{ 'absolute left-full ml-3 px-3 py-1 rounded-md bg-white border': !sidebarFull }">{{ __('Traffic') }}</span>
        </x-side-link>

        <x-side-link href="{{ route('service-time.index') }}" :active="in_array(Request::segment(2), ['service-time'])">
            <i class="fa-solid fa-screwdriver-wrench py-3 w-10"></i>
            <span
                :class="{ 'absolute left-full ml-3 px-3 py-1 rounded-md bg-white border': !sidebarFull }">{{ __('Service Time') }}</span>
        </x-side-link>

        <x-side-link href="{{ route('utilization.index') }}" :active="in_array(Request::segment(2), ['utilization'])">
            <i class="fa-solid fa-wrench py-3 w-10"></i>
            <span
                :class="{ 'absolute left-full ml-3 px-3 py-1 rounded-md bg-white border': !sidebarFull }">{{ __('Utilization') }}</span>
        </x-side-link>

        <x-side-link href="{{ route('productivity.index') }}" :active="in_array(Request::segment(2), ['productivity'])">
            <i class="fa-solid fa-users-gear py-3 w-10"></i>
            <span
                :class="{ 'absolute left-full ml-3 px-3 py-1 rounded-md bg-white border': !sidebarFull }">{{ __('Productivity') }}</span>
        </x-side-link>

        <div class="mt-auto hover:bg-slate-200 hover:text-gray-800 ml-auto rounded-full p-2 grid place-items-center cursor-pointer w-10 h-10" tabindex="0"
            @click="sidebarFull = !sidebarFull; localStorage.setItem('sidebarFull', sidebarFull)">
            <i class="fa-solid " :class="{ 'fa-chevron-left': sidebarFull, 'fa-bars': !sidebarFull }"></i>
        </div>
    </div>
</aside>
