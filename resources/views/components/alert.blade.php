<div class="row py-2 px-1 mx-auto my-3 rounded {{ $class }}" style="min-width: 350px; max-width: 800px;">
    <div class="col col-2  d-flex justify-content-center align-items-center">
        <div class="w-100 d-flex justify-content-center align-content-center" style="font-size: 2em">
            {{ $icon }}
        </div>
    </div>

    <div class="col col-10 bg-ddark d-flex align-items-center">
            {{-- <h3 class="text-center">
                {{ $title }}
            </h3> --}}
            <p class="bg-succdess mb-0 text-start">
                {{ $content }}
            </p>
    </div>
</div>