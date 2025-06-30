 <x-alert>
    <x-slot:icon><i class="bi bi-info-circle"></i></i></x-slot>
    <x-slot:class>text-light bg-primary</x-slot>
    {{-- <x-slot:title>Aviso</x-slot> --}}
    <x-slot:content>{{ $slot }}</x-slot>
</x-alert>