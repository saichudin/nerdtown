<article class="card shadow-sm">
    <a href="{{route('product.detail', ['product' => $product])}}">
        <img class="card-img-top"
             @if($product->hasImage())
             src="{{ $product->getThumbnailUrl() }}"
             @else
             src="http://placehold.it/700x400"
             @endif
             alt="{{ $product->name }}" />
    </a>

    <div class="card-body">
        <h5><a href="{{route('product.detail', ['product' => $product])}}">{{ $product->name }}</a></h5>
        <p class="card-text">${{ $product->price }}</p>
    </div>
</article>
