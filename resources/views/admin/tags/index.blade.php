@extends('adminlte::page')

@section('title', 'Blog')

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/DataTables/DataTables-1.10.25/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/DataTables/DataTables-1.10.25/css/responsive.bootstrap4.min.css')}}">
@endsection

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
            <a class="btn btn-secondary" href="{{route('admin.tags.create')}}">Agregar Etiqueta</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="tags">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('vendor/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/DataTables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/DataTables/DataTables-1.10.25/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/DataTables/DataTables-1.10.25/js/responsive.bootstrap4.min.js')}}"></script>
    <script>    

        $(document).ready(function() {
           $('#tags').DataTable({
               responsive: true,
               autoWidth: false,

               "language": {
                    "lengthMenu": "Mostrar " +
                                    `<select class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="-1">All</option>
                                    </select>` +
                                     " registros por página",
                    "zeroRecords": "Lo sentimos, no existen registros",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
           });
        } );

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);

    </script>
@stop