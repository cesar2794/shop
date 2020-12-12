@extends('layouts.app')

@section('title', 'Bienvenido a BioFoods')

@section('body-class', 'product-page')

@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar categoría "{{$category->name}}"</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label for="" class="control-label">Nombre de la Categoría</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Imagen de la Categoría</label>
                        <input type="file" name="image">
                        @if($category->image)
                            <p class="help-block">Subir solo si desea reemplazar la imagen actual</p>
                        @endif
                    </div>
                </div>

                @if($category->image)
                    <p class="help-block"><b>Imagen actual:</b></p>
                    <img src="{{ asset('/images/categories/' . $category->image) }}" alt="Imagen de la Categoría" height="150">
                @endif

                <textarea class="form-control" placeholder="Descripción de la Categoría" name="description" cols="30" rows="5">{{ old('description', $category->description) }}</textarea>

                <button class="btn btn-primary">Guardar Categoría</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
