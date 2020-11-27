<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado de productos
    }

    public function create()
    {
        return view('admin.products.create'); //Formulario de registro
    }

    public function store(Request $request)
    {
        // Registrar el nuevo producto en la bd
        // dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save(); // INSERT

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        // return "Mostrar aqui el form de edicion para el producto de id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //Formulario de registro
    }

    public function update(Request $request, $id)
    {
        // Registrar el nuevo producto en la bd
        // dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save(); // UPDATE

        return redirect('/admin/products');
    }
}
