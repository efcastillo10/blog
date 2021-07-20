<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>'Ingrese el nombre del post']) !!}
    
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' =>'Ingrese el slug del post', 'readonly']) !!}
    
    @error('slug')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
                   
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach

    @error('tags')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
                   
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>    
    
    <label class="mr-2">
        {!! Form::radio('status', 2) !!}
        Publicado
    </label> 

    @error('status')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
                                   
</div>

<div class="row mb-3">
    <div class="col">
       <div class="image-wrapper">
        @isset ($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">            
        @else
            <img id="picture" src="https://cdn.pixabay.com/photo/2021/07/13/11/34/cat-6463284_960_720.jpg" alt="">
        @endisset
       </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen del post') !!}
            {!! Form::file('file', ['class'=>'form-control-file', 'accept'=>'image/*']) !!}

            @error('file')                            
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}     
    
    @error('extract')
        <span class="text-danger">{{$message}}</span>
    @enderror
                                   
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}           
    
    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror
                                   
</div>