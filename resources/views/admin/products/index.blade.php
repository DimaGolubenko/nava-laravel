@extends('admin.layouts.admin')

@section('content')
    {{ Breadcrumbs::render('admin.products.index') }}
    @include('flash-message')

    <div class="d-flex justify-content-between mb-3">
        {{ $products->links() }}
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Добавить товар</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Фото</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>
                        <img src="{{ asset('storage/app/products').'/'.$product->images->first()->name}}"
                            alt="{{ $product->images[0]->alt }}"
                            class="rounded-sm"
                            width="70">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} грн</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" title="Редактировать">
                            <i class="material-icons p-3">create</i>
                        </a>
                        <a href="{{ route('admin.products.delete', $product->id) }}" title="Редактировать">
                            <i class="material-icons">delete_forever </i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>{{ $products->links() }}</div>
@endsection