@props(['active'])

@php
    $classes = $active ?? false ? 'text-slate-700 dark:text-gray-900 bg-[#8ADAB2] dark:bg-white' : 'text-slate-100 bg-[#AFC8AD] dark:bg-indigo-500';
@endphp

<a {{ $attributes->merge(['class' => "$classes rounded-md transition-all duration-200 relative overflow-hidden transition-all duration-200 flex items-center"]) }}
    :class="{ 'w-10 h-10 hover:ml-4 sidebar-link': !sidebarFull, 'hover:pl-4': sidebarFull }">
    {{ $slot }}
</a>
