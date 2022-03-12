@extends('layouts.app', ['activeMenu' => "index"])
@push('js')
    {{-- JS scripts --}}
@endpush
@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <h4 class="m-0">Product list</h4>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="text-center">Edit</th>
                                <th scope="col" class="text-center">Add to cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} PLN</td>
                                    <td class="text-center"><button type="button" class="btn btn-link p-0"><i
                                                class="fas fa-pen-to-square"></i></button></td>
                                    <td class="text-center"><button type="button" class="btn btn-link p-0"><i
                                                class="fas fa-cart-plus"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('layouts.paginationBar')
    </div>
@endsection
