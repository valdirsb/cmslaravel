@extends('adminlte::page') 

{{-- Inserir Titulo da Pagina --}}
@section('title','Paginas do Site')


@section('content_header')
    <h1>Paginas do Site</h1>
@endsection

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
        <form action="{{ route('pages.store')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome da Pagina</label>
                <div class="col-sm-4">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                </div>
                <div class="col-sm-2">
                    <input type="submit" value="Criar nova Pagina" class="btn btn-success">
                </div>
            </div>  
        </form>
    </div>
    <!-- /.card-body -->
</div>


<div class="card">
    <div class="card-body">
      <table class="table table-hover datatable">
        <thead>
            <tr>
                <th>Ações</th>
                <th>Nome</th>
                <th>slug</th>
                <th>Conteúdo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>
                        <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-sm btn-info" ><i class="fas fa-pencil-alt"></i> </a>
                        <form method="POST" action="{{ route('pages.destroy', ['page' => $page->id]) }}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> </button>
                        </form>
                    </td>
                    <td>{{$page->name}}</td>
                    <td>{{$page->slug}}</td>
                    <td>
                        <a href="{{asset('/painel/page/'.$page->id.'/pagecontent')}}" class="btn btn-sm btn-success"><i class="far fa-eye"></i> Ver Conteúdo da Pagina</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection


@section('css')

<!-- CSS DataTables -->
<link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/datatables/css/responsive.bootstrap4.min.css')}}">
<!-- / CSS DataTables -->
@stop

@section('js')

<!-- JS DataTables -->
<script type="text/javascript" src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datatables/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datatables/js/script.js')}}"></script>

<!-- / JS DataTables -->
    
@stop