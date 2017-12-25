<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edytuj produkt</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            @include('menu')
            <h2>Edytuj produkt</h2><br  />
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{action('ProductController@update', $id)}}">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="name">Nazwa:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name', $product->name)}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="description">Opis:</label>
                        <input type="text" class="form-control" name="description" value="{{old('description', $product->description)}}">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Edytuj produkt</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>