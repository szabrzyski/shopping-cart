@extends('layouts.app', ['activeMenu' => "index"])
@section('content')
    <div class="container">
        @include('layouts.alert')
        <div class="row my-4 d-flex align-items-center">
            <div class="col-12">
                <h4 class="m-0">Edit product</h4>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <form action="{{ route('updateProductInCatalog',$product) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required
                            maxlength="255">
                        @if ($errors->has('name'))
                            <p class="text-danger mt-2">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price',$product->price) }}"
                            step=".01" min="0.01" required>
                        @if ($errors->has('price'))
                            <p class="text-danger mt-2">{{ $errors->first('price') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
