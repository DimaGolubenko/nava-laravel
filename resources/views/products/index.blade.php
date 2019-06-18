@extends('layouts/app')

@section ('content')
  <div class="container">
    <h2 class="products-title">Товары</h2>
    <div class="row">
      <div class="col md-3">Left</div>
      <div class="col-md-9">
        <div class="product-list">
          <div class="row">
            @each('products._card', $products, 'product', 'К сожалению товары отсутствуют.')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection