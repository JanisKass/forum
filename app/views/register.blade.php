@extends('main')
@section('content')
<h1 class="pure-u-1">Register</h1>

{{ Form::open(array('url' => 'user/register', 'files' => true, 'class'=>'pure-form pure-form-aligned pure-u-1'))}}

<fieldset>
@foreach($errors->get('username') as $message)
<div class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('username', 'Username') }}
{{ Form::text('username') }}
</div>

@foreach($errors->get('email') as $message)
<div class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('email', 'Email address') }}
{{ Form::email('email') }}
</div>

@foreach($errors->get('password') as $message)
<div colspan="2" class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}
</div>

<div class="pure-control-group">
{{ Form::label('password_confirmation', 'Confirm password') }}
{{ Form::password('password_confirmation') }}
</div>

@foreach($errors->get('image') as $message)
<div colspan="2" class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('image', 'Profile picture') }}
{{ Form::file('image', $attributes=array('class'=>'pure-button pure-button-primary')) }}
</div>

<div>
{{ Form::submit('Register', $attributes=array('type'=>'submit', 'class'=>'pure-button pure-button-primary'))}}
</div>

 </fieldset>
{{ Form::close() }}
@stop
