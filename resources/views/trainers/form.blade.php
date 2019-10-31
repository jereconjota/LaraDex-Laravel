{{-- ///////////////////////////////////////////////////////////////////// --}}
{{-- /////////////    LARAVEL COLLECTIVE   /////////////////////////////// --}}
{{-- <div class="form-gorup">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-gorup">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-gorup">
    {!! Form::label('description', 'Descripcion') !!}
    {!! Form::text('description', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-gorup">
    {!! Form::label('avatar', 'avatar') !!}
    {!! Form::file('avatar') !!}
</div> --}}


{{-- ///////////////////////////////////////////////////////////////////// --}}
{{-- /////////     BLADE     ///////////////////////////////////////////// --}}     
<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="name" value="@isset($trainer->name){{$trainer->name}}@endisset" class="form-control">
</div>

<div class="form-group">
    <label for="">Slug</label>
    <input type="text" name="slug" value="@isset($trainer->slug){{$trainer->slug}}@endisset" class="form-control">
</div>

<div class="form-group">
    <label for="">Descripción</label>
    <input type="text" name="description" value="@isset($trainer->description){{$trainer->description}}@endisset" class="form-control">
</div>

<div class="form-group">
    <label for="">Avatar</label>
    <input type="file" name="avatar">
</div>