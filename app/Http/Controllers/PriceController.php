<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('name', 'id');
        return view('prices.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = $this->validate(request(), [
          'product_id' => 'required|numeric',            
          'name' => 'required',
          'price' => 'required|regex:/^\d*([\,\.]\d{2})?$/|max:8'
        ]);
        
        $price['price'] = str_replace(',', ".", $price['price']);
        Price::create($price);

        return back()->with('success', 'Cena dodana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::find($id);
        $price -> price = number_format($price -> price, 2, ',', '');
        $products = Product::pluck('name', 'id');
        return view('prices.edit',compact('price','id','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $price = Price::find($id);
        $this->validate(request(), [
          'product_id' => 'required|numeric',            
          'name' => 'required',
          'price' => 'required|regex:/^\d*([\,\.]\d{2})?$/|max:8'
        ]);
        $price->product_id = $request->get('product_id');        
        $price->name = $request->get('name');
        $price->price = str_replace(',', ".", $request->get('price'));
        $price->save();
        return redirect('products')->with('success','Cena został zmieniona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id);
        $price->delete();
        return redirect('products')->with('success','Cena została usunięta');
    }
}
