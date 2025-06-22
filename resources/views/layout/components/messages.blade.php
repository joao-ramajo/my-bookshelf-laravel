        <div class="w-75 mx-auto my-5">
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('exception_error'))
                <div class="alert alert-warning text-center">
                    {{ session('exception_error') }}
                </div>
            @endif
        </div>