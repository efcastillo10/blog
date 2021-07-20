@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Mostrar listado de etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success alert-dismissible fade show">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.tags.create')}}">Agregar etiqueta</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit',$tag)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>         
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);

    </script>
@stop