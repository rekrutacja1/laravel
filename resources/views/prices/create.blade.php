<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dodaj cene</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            @include('menu')
            <h2>Dodaj cenę</h2><br  />
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
            <form method="post" action="{{url('prices')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="product">Produkt:</label>
                        <select name="product_id" class="form-control">
                            @foreach ($products as $key => $product)
                            <option value="{{ $key }}"
                                    @if ($key == old('product_id'))
                                    selected="selected"
                                    @endif                                    
                                    >{{ $product }}</option>                        
                            @endforeach
                        </select>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="name">Nazwa ceny:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="price">Cena:</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Dodaj cenę</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>