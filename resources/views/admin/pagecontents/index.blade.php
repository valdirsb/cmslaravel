@extends('adminlte::page') 

{{-- Inserir Titulo da Pagina --}}
@section('title','Conteúdo da Pagina')

{{-- Inserir Cabeçalho --}}
@section('content_header')
@if ($page ?? '')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Conteúdo da Pagina "{{$page->name}}"</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{asset('painel/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{asset('painel/pages')}}">Paginas</a></li>
                <li class="breadcrumb-item">{{$page->name}}</li>
            </ol>
        </div>
    </div>
    
@endif
    

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
@if ($page ?? '')

<div class="card">
    <div class="card-header">
        <a href="{{ route('pagecontent.create', ['pageid' => $page->id]) }}" class="btn btn-sm btn-info" > Adicionar Conteúdo</a>
    </div>
</div>
@foreach ($contents as $content)
    
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2"><strong> Titulo: </strong></div>
            <div class="col-sm-10"> {{$content->title}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><strong> Sub-Titulo: </strong></div>
            <div class="col-sm-10"> {{$content->subtitle}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><strong> Icone: </strong></div>
            <div class="col-sm-10">{{$content->icon}}</div>
        </div>
        @if ($content->image)
            <div class="row">
                <div class="col-sm-2"><strong> Imagem: </strong></div>
                
                    <div class="col-sm-10"> <img src="{{$content->image}}" alt=""  style="width:200px; height:100px; object-fit:cover ; border:1px solid #535353"></div>
                
            </div>
        @endif
        <div class="row">
            <div class="col-sm-2"><strong> Conteúdo: </strong></div>
            <div class="col-sm-10">
                <p>{{$content->content}}</p>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('pagecontent.edit', ['pageid' => $page->id, 'pagecontent' => $content->id]) }}" class="btn btn-sm btn-info" ><i class="fas fa-pencil-alt"></i> Editar </a>
                        <form method="POST" action="{{ route('pagecontent.destroy', ['pageid' => $page->id,'pagecontent' => $content->id]) }}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Excluir </button>
                        </form>
        </div>
    </div>
</div>
@endforeach

@else
    <p>Pagina não encontrada</p>
@endif
@endsection

{{-- Inserir Css personalizado --}}
@section('css')


@endsection

{{-- Inserir JS personalizado --}}
@section('js')

@endsection