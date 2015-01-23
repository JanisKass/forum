@extends('main')
@section('content')

<h1 class="pure-u-1">Login</h1>


{{ Form::open(array('url' => 'user/login', 'class'=>'pure form pure-form-stacked pure-u-1 ')) }}

<!-- semantically not the best way to put form into tables -->
    
@foreach($errors->all() as $message)
<p class="error_msg">{{ $message }}</p>
@endforeach


<fieldset">
{{ Form::email('email','', array('placeholder'=>'Email')) }}

{{ Form::password('password', array('placeholder'=>'Password')) }}

{{ Form::checkbox('remember') }}
{{ Form::label('remember', 'Remember me') }}

<tr><td colspan="2">
{{ Form::submit('Login', array('class'=>'pure-button pure-button-primary')) }}
</td></tr>


</fieldset>
{{ Form::close() }}
@stop