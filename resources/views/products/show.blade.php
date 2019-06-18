@extends('layouts/app')

@section ('content')
  <div class="product">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="product-image">
            <img src="{{ asset('storage/app/products').'/'.$product->images->first()->name}}"
              alt="{{ $product->images[0]->alt }}"
              class="img-fluid pb-4">
          </div>
        </div>
        <div class="col-md-6">
          <h4 class="product-title">{{ $product->name }}</h4>
          <h3 class="product-price text-primary">
            {{ $product->price }} грн.
            <a href="#" class="btn btn-primary ml-3">Купить</a>
          </h3>
          <p class="product-description lead pt-3">{{ $product->description }}</p>
        </div>
      </div>
      <div class="row">
        @foreach ($product->images as $image)
          @if ($image != $product->images->first())
            <div class="col-sm-12 col-md-6">
              <div class="product-image">
                <img src="{{ asset('storage/app/products').'/'.$image->name}}"
                  alt="{{ $image->alt }}"
                  class="img-fluid pb-4">
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection