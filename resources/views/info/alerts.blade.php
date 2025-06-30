@extends('layout.main_layout')

@section('content')
    <div class="row mx-auto">
        <x-alert-danger>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, quae aliquid modi blanditiis magnam quas, ratione accusamus nam temporibus deleniti distinctio, facere dolorem inventore nemo sapiente saepe accusantium animi ducimus?
        </x-alert-danger>
        <x-alert-info>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, dicta facilis consequatur voluptatum dignissimos eligendi tempora exercitationem et accusamus rem porro alias, voluptates excepturi natus necessitatibus nihil vel ipsum nostrum.
        </x-alert-info>
        <x-alert>
            <x-slot:icon><i class="bi bi-app" style="font-size: 3rem"></i></x-slot>
            <x-slot:class>{{-- bootsrap rules --}}</x-slot>
            <x-slot:title>Alert Type</x-slot>
            <x-slot:content>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab minima nesciunt necessitatibus ut quam sequi porro quae nisi quos illo veritatis velit, pariatur perferendis totam et deserunt soluta quas amet?</x-slot>
        </x-alert>
    </div>  
@endsection

