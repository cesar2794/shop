@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('body-class', 'profile-page')

@section('styles')
    <style>
        .team .row .col-md-4{
            margin-bottom: 5em;
        }
        .row > [class*='col-']{
            display: flex;
            flex-direction: column;
            margin: auto;
        }
    </style>
@endsection

@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ asset('img/search-fondo.png') }}" alt="Buscando..." class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">Resultados de Búsqueda</h3>
                    </div>
                    <div class="description text-center">
                        <p>
                            Se encontraron <b>{{ $products->count() }}</b> resultados para el término <b>{{ $query }}</b>.
                        </p>
                    </div>
                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
                
            </div>

            <div class="team text-center">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ $product->featured_image_url }}" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                            </h4>
                            <p class="description">{{$product->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection