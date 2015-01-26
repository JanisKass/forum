@extends('main')
@section('content')

@foreach($errors->all() as $message)
<p class="error_msg">{{ $message }}</p>
@endforeach     

<h3 class="pure-u-1">Add new category</h3>

<table class="pure-table pure-table-horizontal">
    <tr>   
        <td>{{ Form::open(array('url' => url('category/add'), 'class'=>'pure-form pure-form-aligned pure-u-1')) }}

<div class="pure-control-group">
{{ Form::label('category', 'Category name') }}
{{ Form::text('category') }}
</div>
</td>
<td>
{{ Form::submit('Add', $attributes=array('type'=>'submit', 'class'=>'pure-button', 'id'=>'admin-button')) }}

{{ Form::close() }}
</td>
</tr>
</table>

<h3 class="pure-u-1">Delete category</h3>

<table class="pure-table pure-table-horizontal">
    <tr>
        <td>
            {{ Form::open(array('url' => url('category/delete'), 'class'=>'pure-form pure-form-aligned pure-u-1')) }}
       
        
    <div class="pure-control-group">
{{ Form::label('category', 'Category name') }}
        <select id="category">
            @foreach(Category::all() as $category)
            <option>{{{$category->name}}}</option>
            @endforeach
        </select>
    </div>
        </td>
        <td></td>
    <tr>
    <tr>
        <td>
        {{ Form::submit('Delete', $attributes=array('type'=>'submit', 'class'=>'pure-button', 'id'=>'admin-button')) }}
        {{ Form::close() }}
        </td>
        <td></td>
</tr>

</table>
@stop