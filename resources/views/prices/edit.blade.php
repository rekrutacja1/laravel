<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edytuj cenę</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            @include('menu')
            <h2>Edytuj cenę</h2><br  />
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{action('PriceController@update', $id)}}">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="product">Produkt:</label>
                        <select name="product_id" class="form-control">
                            @foreach ($products as $key => $product)
                            <option value="{{ $key }}"
                                    @if ($key == old('product_id', $price->product->id))
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
                        <input type="text" class="form-control" name="name" value="{{old('name', $price->name)}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="description">Cena:</label>
                        <input type="text" class="form-control" name="price" value="{{old('price', $price->price)}}">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Edytuj cenę</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>