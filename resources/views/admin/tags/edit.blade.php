@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
<div class="card">
    <div class="card-body">
        {!! Form::model($tag, ['route'=> ['admin.tags.update', $tag], 'method'=> 'PUT']) !!}
            
            @include('admin.tags.partials.form')

            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"> </script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);
    </script>
@stop
