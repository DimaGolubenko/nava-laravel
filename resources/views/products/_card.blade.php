<div class="col-sm-6 col-md-6 my-4">
  <div class="card">
    <img src="{{ asset('storage/app/products').'/'.$product->images->first()->name}}"
      alt="{{ $product->images[0]->alt }}"
      class="card-img-top">
    <div class="card-body">
    <h5 class="card-title">{{ $product->name }}</h5>
    <p class="card-text">{{ $product->description }}</p>
    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Детальнее</a>
    </div>
  </div>
</div>