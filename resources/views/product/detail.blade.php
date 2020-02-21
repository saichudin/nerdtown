@extends('front-base')

@section('content')
    <style>
        .thumbnail-container {
            overflow-x: scroll;
        }
        .thumbnail {
            width: 64px;
            height: auto;
            display: block;
            float: left;
        }
        .thumbnail img {
            cursor: pointer;
        }
    </style>
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <?php $img = $product->getMedia()->first() ? $product->getMedia()->first()->getUrl('thumbnail') : '/images/product-medium.jpg' ?>
                    <img src="{{ $img  }}" id="product-image" />
                </div>

                <div class="thumbnail-container">
                    @foreach($product->getMedia() as $media)
                        <div class="thumbnail mr-1">
                            <img class="mw-100" src="{{ $media->getUrl('thumbnail') }}"
                                 onclick="document.getElementById('product-image').setAttribute('src', '{{ $media->getUrl("thumbnail") }}')"
                            />
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <form action="{{ route('cart.add', $product) }}" method="post" class="mb-4">
                    {{ csrf_field() }}

                    <span class="mr-2 font-weight-bold text-primary btn-lg">${{ $product->price }}</span>
                    <button type="submit" class="btn btn-success btn-lg" @if(!$product->price) disabled @endif>Add to cart</button>
                </form>

                <hr>
                <div class="row">
                    <div class="col-sm-5 col-md-5 col-5">
                        <label style="font-weight:bold;">Seller : <a href="{{Route ('user.profile', $seller->id)}}" class="btn-sm btn-warning">{{$seller->first_name}} {{$seller->last_name}}</a></label>
                    </div>
                </div>
                <hr />

                @unless(empty($product->description))
                    <hr>
                    <p class="text-secondary">{!!  nl2br($product->description) !!}</p>
                    <hr>
                @endunless

            </div>
        </div>
    </div>
@endsection
