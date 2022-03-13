@if (isset($httpError) || session('success') || session('error') || session('info'))
    <div class="row my-4" id="alertMessage">
        <div class="col-12">
            @if (isset($httpError))
                <div class="alert alert-danger mb-0">
                    {{ $httpError }}
                </div>
            @elseif (session()->has('success'))
                <div class="alert alert-success mb-0">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger mb-0">
                    {{ session()->get('error') }}
                </div>
            @elseif (session()->has('info'))
                <div class="alert alert-primary mb-0">
                    {{ session()->get('info') }}
                </div>
            @endif
        </div>
    </div>

@endif
