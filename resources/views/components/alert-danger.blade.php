 <x-alert>
     <x-slot:icon><i class="bi bi-exclamation-diamond-fill"></i></i></x-slot>
     <x-slot:class>text-light bg-warning</x-slot>
     {{-- 
        Sobre a cor amarela: apesar de não ser o adequado para esse tipo de aviso tomei por usa-la devido a principal cor em destaque do projeto ser a vermelha, então por questão de padronização será o amarelo mesmo.
    --}}
     {{-- <x-slot:title>Alerta</x-slot> --}}
     <x-slot:content>{{ $slot }}</x-slot>
 </x-alert>
