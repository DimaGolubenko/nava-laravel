<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="form">
            <form action="products" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- {{ csrf_field() }} --}}
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description">
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price">
                </div>

                <div>
                    <label for="images">Images:</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>

                <div>
                    <label for="sizes">Sizes:</label>
                    <input type="checkbox" name="sizes[]" id="sizes" value="1">
                    <input type="checkbox" name="sizes[]" id="sizes" value="2">
                    <input type="checkbox" name="sizes[]" id="sizes" value="3">
                </div>

                <div>
                    <label for="colors">Colors:</label>
                    <input type="checkbox" name="colors[]" id="colors" value="1">
                    <input type="checkbox" name="colors[]" id="colors" value="2">
                    <input type="checkbox" name="colors[]" id="colors" value="3">
                </div>

                <div>
                    <label for="categories">Categories:</label>
                    <input type="checkbox" name="categories[]" id="categories" value="1">
                    <input type="checkbox" name="categories[]" id="categories" value="2">
                    <input type="checkbox" name="categories[]" id="categories" value="3">
                </div>

                <div>
                    <button type="submit">Submit</button>
                </div>

            </form>
        </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
