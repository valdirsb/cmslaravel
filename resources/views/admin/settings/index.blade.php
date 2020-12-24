@extends('adminlte::page') 

{{-- Inserir Titulo da Pagina --}}
@section('title','Titulo da Pagina')

{{-- Inserir Cabeçalho --}}
@section('content_header')

    <h1>Configurações</h1>

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

    @if (session('warning'))
        <div class="alert alert-success">
            {{session('warning')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('settings.save')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Titulo do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$settings['title']}}" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub-titulo do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="{{$settings['subtitle']}}" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$settings['email']}}" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="{{$settings['address']}}" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="text" name="fone" value="{{$settings['fone']}}" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do Fundo</label>
                    <div class="col-sm-10">
                        <input type="color" name="bgcolor" value="{{$settings['bgcolor']}}" class="form-control" style="width:70px" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do Texto</label>
                    <div class="col-sm-10">
                        <input type="color" name="textcolor" value="{{$settings['textcolor']}}" class="form-control" style="width:70px" >
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
                        <img src="{{$settings['image']}}" id="category-img-tag" style="width:200px; height:100px; object-fit:cover" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit"  value="Salvar" class="btn btn-success" >
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