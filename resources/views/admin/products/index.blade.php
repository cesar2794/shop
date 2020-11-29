@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('body-class', 'product-page')

@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title mb-0">Listado de Productos</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th class="col-md-4">Descripción</th>
                                <th>Categoría</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)    
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                                <td class="text-right">S/. {{ $product->price }}</td>
                                <td class="td-actions text-right">
                                    
                                    <form class="borrar" method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                        {{ csrf_field() }}
                                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                        {{ method_field('DELETE') }}
                                        {{-- <input type="hidden" name="method" value="DELETE"> --}}

                                        <a href="#" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
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

                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2020, hecho con <i class="fa fa-heart heart"></i> por GrupoTesis
        </div>
    </div>
</footer>
@endsection
