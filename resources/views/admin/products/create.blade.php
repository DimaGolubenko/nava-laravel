@extends('admin.layouts.admin')

@section('content')
    @include('flash-message')
    
    <div class="row">
        <div class="col-md-8 col-lg-6">
            {{ Breadcrumbs::render('admin.products.create') }}
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="name">Название:</label>
                    @error('name')
                        <span class="badge badge-warning">{{ $message }}</span>
                    @enderror
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name">
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
                        id="price">
                </div>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea
                        class="form-control"
                        name="description"
                        id="description"
                        cols="30"
                        rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="sizes">Размер:</label>
                    <select name="sizes[]" id="sizes" class="form-control" multiple>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="colors">Цвет:</label>
                    <select name="colors[]" id="colors" class="form-control" multiple>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="images">Изображения:</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>
                <a href="#" class="btn btn-secondary">Отменить</a>
                <button type="submit" class="btn btn-primary">Сохранить товар</button>
            </form>
        </div>
    </div>
@endsection