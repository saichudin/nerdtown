@extends('front-base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(!$products->isEmpty())
                    <div class="card card-default">
                        <div class="card-header">All Nerds Items</div>

                        <div class="card-body">
                            <div class="row">

                                @foreach($products as $product)
                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        @include('components.product-card', ['product' => $product])
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
