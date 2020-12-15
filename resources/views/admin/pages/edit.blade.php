@extends('adminlte::page') 

{{-- Inserir Titulo da Pagina --}}
@section('title','Editar Pagina')

{{-- Inserir Cabeçalho --}}
@section('content_header')

    <h1>Editar Pagina</h1>

@endsection

{{-- Conteúdo --}}
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        <h5><i class="icon fas fa-ban"></i> Ocorreu um erro</h5>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
<div class="card-body">
    <form action="{{ route('pages.update', ['page'=>$page->id])}}" method="POST" class="form-horizontal">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nome da Pagina</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{$page->name}}" class="form-control @error('name') is-invalid @enderror" >
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" value="Salvar" class="btn btn-success">
            </div>
        </div>   
    </form>
</div>
</div>


@endsection

{{-- Inserir Css personalizado --}}
@section('css')


@endsection

{{-- Inserir JS personalizado --}}
@section('js')

@endsection