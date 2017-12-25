<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dodaj produkt</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            @include('menu')
            <h2>Dodaj produkt</h2><br  />
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif            
            <form method="post" action="{{url('products')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="name">Nazwa:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="description">Opis:</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Dodaj produkt</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>