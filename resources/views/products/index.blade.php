<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista produktów</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            @include('menu')         
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa</th>
                            <th>Opis</th>
                            <th colspan="2">Cena</th>
                            <th colspan="2">Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product['id']}}</td>
                            <td>{{$product['name']}}</td>
                            <td>{{$product['description']}}</td>
                            <td></td>
                            <td></td>
                            <td><a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-warning">Edytuj produkt</a></td>
                            <td>
                                <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Usuń produkt</button>
                                </form>
                            </td>
                            @foreach($product['prices'] as $price)
                        <tr>
                            <td colspan="3"></td>
                            <td>{{$price['name']}}</td>
                            <td>{{number_format($price['price'], 2, ',', '.')}}</td>
                            <td><a href="{{action('PriceController@edit', $price['id'])}}" class="btn btn-warning">Edytuj cenę</a></td>
                            <td>
                                <form action="{{action('PriceController@destroy', $price['id'])}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Usuń cenę</button>
                                </form>
                            </td>                        
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>