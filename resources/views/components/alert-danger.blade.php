 <x-alert>
    <x-slot:icon><i class="bi bi-exclamation-diamond-fill"></i></i></x-slot>
    <x-slot:class>text-light bg-warning</x-slot>
    {{-- <x-slot:title>Alerta</x-slot> --}}
    <x-slot:content>{{ $slot }}</x-slot>
</x-alert>