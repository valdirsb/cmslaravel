@extends('adminlte::page') 

{{-- Inserir Titulo da Pagina --}}
@section('title','Paginas')

{{-- Inserir Cabeçalho --}}
@section('content_header')

    <h1>Conteudo da pagina</h1>

@endsection

{{-- Conteúdo --}}
@section('content')

    <h2>{{$page->name}}</h2>
    <h3>{{$customer_name}}</h3>
    
    @foreach($page->pagecontents as $content)
        {{$content->title}} <br>
    @endforeach


@endsection

{{-- Inserir Css personalizado --}}
@section('css')


@endsection

{{-- Inserir JS personalizado --}}
@section('js')

@endsection