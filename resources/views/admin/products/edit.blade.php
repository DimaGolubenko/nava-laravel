@extends('admin.layouts.admin')

@section('content')
    @include('flash-message')
    
    <div class="row">
        <div class="col-md-8 col-lg-6">
            {{ Breadcrumbs::render('admin.products.edit', $product) }}
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Название:</label>
                    @error('name')
                        <span class="badge badge-warning">{{ $message }}</span>
                    @enderror
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        value="{{ $product->name }}"
                    >
                </div>
                <div class="form-group">
                    <label for="price">Цена:</label>
                    @error('price')
                        <span class="badge badge-warning">{{ $message }}</span>
                    @enderror 
                    <input
                        type="text"
                        class="form-control"
                        name="price"
                        id="price"
                        value="{{ $product->price }}"
                    >
                </div>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea
                        class="form-control"
                        name="description"
                        id="description"
                        cols="30"
                        rows="5"
                    >{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="sizes">Размер:</label>
                    <select name="sizes[]" id="sizes" class="form-control" multiple>
                        @foreach ($sizes as $size)
                            <option
                                value="{{ $size->id }}"
                                @if (in_array($size->id, $productSizes))
                                    selected
                                @endif
                            >{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="colors">Цвет:</label>
                    <select name="colors[]" id="colors" class="form-control" multiple>
                        @foreach ($colors as $color)
                            <option
                                value="{{ $color->id }}"
                                @if (in_array($color->id, $productColors))
                                    selected
                                @endif
                            >{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="images">Добавить изображение:</label>
                    <input
                        type="file"
                        name="images[]"
                        id="images"
                        multiple
                    >
                </div>
                <h4>Изображения:</h4>
                <div class="row">
                    @foreach ($product->images as $image)
                        <div class="col-6 p-2">
                            <img
                                src="{{ asset('storage/app/products').'/'.$image->name}}"
                                alt="{{ $image->alt }}"
                                class="img-fluid"
                            >
                            <button class="btn btn-danger btn-sm mt-2">Удалить</button>
                        </div>
                    @endforeach
                </div>
                <a href="#" class="btn btn-secondary">Отменить</a>
                <button type="submit" class="btn btn-primary">Сохранить товар</button>
            </form>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function ready() {
        console.log('jQuery', $('#images')[0].files);
        var files = document.getElementById('images').files;
        console.log(files);
    };

    document.addEventListener("DOMContentLoaded", ready);
</script>
