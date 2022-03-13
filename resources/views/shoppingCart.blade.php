@extends('layouts.app', ['activeMenu' => "shoppingCart",'productIdsInShoppingCart' => $productIdsInShoppingCart])
@push('js')
    {{-- JS scripts --}}
@endpush
@section('content')
    <div class="container">
        @include('layouts.alert')
        <div class="row my-4">
            <div class="col-12">
                <h4 class="m-0">Shopping cart</h4>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                @if ($productsInShoppingCart->isEmpty())
                    Your cart is empty
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-center">Delete from cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsInShoppingCart as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }} PLN</td>
                                        <form method="POST"
                                            action="{{ route('deleteProductFromShoppingCart', $product) }}">
                                            @csrf
                                            @method('delete')
                                            <td class="text-center"><button type="submit" class="btn btn-link p-0"><i
                                                        class="fas fa-circle-minus"></i></button></td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="mt-2">Amount to pay: {{ $productsInShoppingCart->sum('price') }} PLN</p>
                @endif

            </div>
        </div>
    </div>
@endsection
