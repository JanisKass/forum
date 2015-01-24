@extends('main')
@section('content')

<div class="pure-menu pure-menu-open pure-menu-horizontal">
    <a href="{{{ url('threads/category', $category->id) }}}" class="pure-menu-heading">{{{ $category->name }}}</a>

    <ul>
        <li><a href="{{{ url('threads/category', $category->id) }}}">Back</a></li> 
    </ul>
</div>

@stop