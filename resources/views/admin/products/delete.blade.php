@extends('admin.layouts.admin')

@section ('content')
    <div class="row row justify-content-md-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Вы подтверждаете удаление товара?</h5>
                    <h6 class="card-subtitle mb-2">
                    <img src="{{ $product->images[0]->name }}"
                    alt="{{ $product->images[0]->alt }}"
                    class="img-thumbnail"
                    width="75px">
                    {{ $product->name }} ({{ $product->price }} грн)
                </h6>
                <a href="{{ route('admin.products.index', $product->id) }}" class="btn btn-secondary">Отменить</a>
                <form
                    action="{{ route('admin.products.destroy', $product->id) }}"
                    method="POST"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection