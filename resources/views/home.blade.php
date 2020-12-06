@extends('layouts.app')

@section('title', 'BioFoods | Dashboard')

@section('body-class', 'product-page')

@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center text-uppercase">Dashboard</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">shopping_cart</i>
                        Carrito de compras
                    </a>
                </li>
                <li>
                    <a href="#tasks" role="tab" data-toggle="tab">
                        <i class="material-icons">view_list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>
            
            <hr>
            @if(auth()->user()->cart->details->count() === 0)
                <p class="text-center">Tu carrito de compras está vacío.</p>
            @elseif(auth()->user()->cart->details->count() === 1)
                <p class="text-center">Tu carrito de compras presenta <span class="badge">1</span> producto.</p>
            @else
                <p class="text-center">Tu carrito de compras presenta <span class="badge">{{ auth()->user()->cart->details->count() }}</span> productos.</p>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(auth()->user()->cart->details as $detail)   
                    <tr>
                        <td class="text-center">
                            <img src="{{ $detail->product->featured_image_url }}" height="50px">
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                        </td>
                        <td>S/. {{ $detail->product->price }}</td>

                        <td>{{ $detail->quantity }}</td>
                        <td>S/. {{ $detail->quantity * $detail->product->price }}</td>

                        <td class="td-actions">
                            
                            <form class="borrar" method="post" action="{{ url('/cart') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                </a>

                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Realizar Pedido
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection