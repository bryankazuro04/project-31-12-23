<section {{ $attributes->merge(['class' => '']) }}>
    <input type="checkbox" name="theme-toggle" id="theme-toggle" class="theme-toggle sr-only">
    <label for="theme-toggle"
        class="flex justify-center items-center w-8 h-8 p-2 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full cursor-pointer hover:rotate-180 duration-300 transition">
        <i class="fa-solid fa-sun dark:hidden w-4 h-4"></i>
        <i class="fa-solid fa-moon hidden dark:block w-4 h-4"></i>
        <span class="sr-only">Theme Switch</span>
    </label>
</section>
