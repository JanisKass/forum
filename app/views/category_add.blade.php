@extends('main')
@section('content')
<h3 class="mb0">Add new category</h3>

<div id="form">
{{ Form::open() }}

@foreach($errors->all() as $message)
<p class="error_msg">{{ $message }}</p>
@endforeach

{{ Form::label('category', 'Category name') }}

{{ Form::text('category') }}

{{ Form::submit('Add') }}

{{ Form::close() }}
@stop
</div>