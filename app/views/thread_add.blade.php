@extends('main')
@section('content')

<div class="pure-menu pure-menu-open pure-menu-horizontal" id="category-menu">
    <a href="{{{ url('threads/category', $category->id) }}}" class="pure-menu-heading">{{{ $category->name }}}</a>

    <ul>
        <li><a href="{{{ url('threads/category', $category->id) }}}">Back</a></li> 
    </ul>
</div>

<h1 class="pure-u-1">Add thread</h1>

{{ Form::open(array('url' => url('threads/new', $category->id), 'files' => true, 'class'=>'pure-form pure-form-aligned pure-u-1'))}}

<fieldset>
 <div class="pure-control-group">   
{{ Form::label('category', 'Category') }}
{{ Form::text('category',$category->name, array('disabled'=>'disabled')) }}
</div>
    
@foreach($errors->get('title') as $message)
<div class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('title', 'Title') }}
{{ Form::text('title') }}
</div>

@foreach($errors->get('comment') as $message)
<div class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('comment', 'Comment') }}
{{ Form::textarea('comment') }}
</div>

@foreach($errors->get('image') as $message)
<div colspan="2" class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('image', 'Picture') }}
{{ Form::file('image', $attributes=array('class'=>'pure-button pure-button-primary')) }}
</div>

<div>
{{ Form::submit('Add thread', $attributes=array('type'=>'submit', 'class'=>'pure-button pure-button-primary'))}}
</div>

 </fieldset>
{{ Form::close() }}






@stop