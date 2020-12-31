@extends('adminlte::page') 

{{-- Inserir Titulo da Pagina --}}
@section('title','Adicionar novo Conteúdo')

{{-- Inserir Cabeçalho --}}
@section('content_header')

    <h1>Adicionar novo Conteúdo na Pagina "{{$page->name}}"</h1>

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
    <form action="{{ route('pagecontent.store', ['pageid'=>$page->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sub-Titulo</label>
            <div class="col-sm-10">
                <input type="text" name="subtitle" value="{{old('subtitle')}}" class="form-control @error('subtitle') is-invalid @enderror">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">icone</label>
            <div class="col-sm-10">
                <input type="text" name="icon" value="{{old('icon')}}" class="form-control @error('icon') is-invalid @enderror">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagem</label>
            <div class="custom-file col-sm-6">
                <input type="file" name="file" id="customFile" class="custom-file-input @error('file') is-invalid @enderror" >
                <label class="custom-file-label" for="customFile">Eescolha uma imagem</label>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img src="" id="category-img-tag" style="" />
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Conteúdo</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">{{old('content')}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-2">
                <select name="type" class="form-control">
                    <option value=1>Tipo 1</option>
                    <option value=2>Tipo 2</option>
                    <option value=3>Tipo 3</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" value="Cadastrar" class="btn btn-success">
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

<script>

    $(function(){
    
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('#category-img-tag').attr('src', e.target.result);
                }
                $('#category-img-tag').attr('style',"width:200px; height:100px; object-fit:cover");
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $("#customFile").change(function(){
            readURL(this);
        });
    
    });
</script>

@endsection