<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>


  <div class="grid grid-cols-12 gap-6 mb-4">
    <x-dashboard.traffic.traffic-kunjungan_kapal-chart />
    <x-dashboard.traffic.traffic-jumlah_bongkar_muat-chart />
    <x-dashboard.traffic.traffic-grt-chart />
    <x-dashboard.traffic.traffic-loa-chart />
    <x-dashboard.service-chart />
    <x-dashboard.utilization.utilization-occupancy_ratio-chart />
    <x-dashboard.utilization.utilization-through_put-chart />
    <x-dashboard.productivity-chart />
  </div>
</x-app-layout>
