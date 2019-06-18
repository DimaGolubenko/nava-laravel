@extends('admin.layouts.admin')

@section ('content')
  <div class="product">
    <div class="container">
      {{ Breadcrumbs::render('admin.products.show', $product) }}
      <h4 class="product-title">{{ $product->name }}</h4>
      <h5 class="product-price text-primary">
        {{ $product->price }} грн.
      </h5>
      <div class="colors">
        <span>Цвета:</span>
        @foreach ($product->colors as $color)
          <span class="badge badge-secondary">{{ $color->name }}</span>
        @endforeach
      </div>
      <div class="colors">
        <span>Размеры:</span>
        @foreach ($product->sizes as $size)
          <span class="badge badge-secondary">{{ $size->name }}</span>
        @endforeach
      </div>
      <p class="product-description lead pt-3">{{ $product->description }}</p>
      <div class="mb-4">
          <a href="{{ route('admin.products.index') }}" class="btn btn-success mr-3">В каталог товаров</a>
          <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary">Редактировать</a>
      </div>
      <h5>Фотограффии:</h5>
      <div class="row">
        @foreach ($product->images as $image)
          <div class="col-md-2">
            <div class="product-image">
              <img src="{{ asset('storage/app/products').'/'.$image->name}}"
                alt="{{ asset('storage/app/products').'/'.$image->alt}}"
                class="img-fluid pb-4">
            </div>
          </div>
        @endforeach
      </div>
      <div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-success mr-3">В каталог товаров</a>
        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary">Редактировать</a>
      </div>
    </div>
  </div>
@endsection